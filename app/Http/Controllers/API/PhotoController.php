<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function myPhotos(Event $event, Request $request)
    {
        $photos = Photo::where([
            'user_id'  => $request->user()->id,
            'event_id' => $event->id
        ])->orderByDesc('created_at')->get();

        return response()->json([
            'photos' => PhotoResource::collection($photos)
        ], 200);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return response()->json([],204);
    }
}
