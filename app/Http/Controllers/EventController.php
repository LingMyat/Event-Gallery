<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('event.index', [
            'events' => Event::orderByDesc('created_at')->get(),
        ]);
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        Event::create($request->all());

        return to_route('events.index')->with('success', 'Successfully created!');
    }

    public function show(Event $event)
    {
        return view('event.show', [
            'event'  => $event,
            'photos' => Photo::where([
                'event_id' => $event->id,
                'status'   => 'pending'
            ])->with('user')->orderByDesc('created_at')->paginate(15)
        ]);
    }

    public function edit(Event $event)
    {
        return view('event.edit',[
            'event' => $event
        ]);
    }

    public function update(Event $event, Request $request)
    {
        $event->update($request->all());

        return to_route('events.show', $event)->with('success', 'Successfully updated!');
    }

    public function destroy(Event $event)
    {

        if($event->photos->count()) {
            $event->photos()->delete();
        }

        $event->delete();

        return to_route('events.index')->with('success', 'Successfully deleted!');
    }

    public function gallery(Event $event)
    {
        return view('event.gallery', [
            'photos' => Photo::where([
                            'event_id' => $event->id,
                            'status'   => 'approved'
                        ])->orderByDesc('created_at')->with('user')->get(),
            'event'  => $event
        ]);
    }
}
