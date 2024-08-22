<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

    public function edit(Event $event)
    {
        return view('event.edit',[
            'event' => $event
        ]);
    }

    public function update(Event $event, Request $request)
    {
        $event->update($request->all());

        return to_route('events.index')->with('success', 'Successfully updated!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return to_route('events.index')->with('success', 'Successfully deleted!');
    }
}
