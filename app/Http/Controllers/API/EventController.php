<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventGalleryResource;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Photo;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderByDesc('created_at')->get();

        return response()->json([
            'events'  => EventResource::collection($events),
        ],200);
    }

    public function show(Event $event)
    {
        return response()->json([
            'event'  => new EventResource($event),
        ],200);
    }

    public function eventGallery(Event $event)
    {
        $photos = Photo::where([
            'event_id' => $event->id,
            'status'   => 'approved'
        ])->orderByDesc('created_at')->get();

        return response()->json([
            'photos' => EventGalleryResource::collection($photos),
            'event'  => new EventResource($event),
        ],200);
    }

    public function uploadPhoto(Request $request, Event $event)
    {
        $photo_url = uniqid().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public',$photo_url);

        Photo::create([
            'user_id'   => $request->user()->id,
            'event_id'  => $event->id,
            'photo_url' => $photo_url
        ]);

        return response()->json([
            'message' => 'Photo uploaded successfully',
        ], 201);
    }
}
