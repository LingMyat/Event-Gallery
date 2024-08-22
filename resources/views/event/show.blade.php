@extends('layouts.app')

@section('template')
    <div>
        <x-bradcrumb :lists="[
            [
                'label' => 'Events',
                'url' => route('events.index'),
            ],
            [
                'label' => 'Show',
                'url' => route('events.show',$event),
            ],
        ]" />
    </div>
@endsection
