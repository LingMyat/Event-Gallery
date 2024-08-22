<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
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

    public function uploadPhoto(Request $request, Event $event)
    {

    }
}
