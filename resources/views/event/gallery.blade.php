@extends('layouts.app')

@section('template')
    <div>
        <x-bradcrumb :lists="[
            [
                'label' => 'Events',
                'url' => route('events.index'),
            ],
            [
                'label' => Str::limit($event->name, 10, ' ...'),
                'url' => route('events.show',$event),
            ],
            [
                'label' => 'Gallery',
                'url' => route('events.gallery',$event),
            ],
        ]" />

    <h2 class="text-2xl font-bold text-gray-900 flex flex-col sm:flex-row gap-2">
        <span>Event Gallery -</span>
        <span>({{$event->name}})</span>
    </h2>

    <div id="gallery">
        @forelse ($photos as $photo)
            <img src="{{ $photo->asset_photo_url }}" alt="{{ $photo->photo_url }}" />
        @empty
            <p class="text-gray-500 ">
            There is no photo yet.
            </p>
        @endforelse
    </div>
        </div>
    @endsection

@section('css')
<style>
    #gallery {
        columns: 4;
        gap: 1.25rem;
        padding-top: 1.25rem;
    }

    #gallery img {
        display: block;
        width: 100%;
        border-radius: 5px;
        margin-bottom: 1.25rem;
    }

    @media (max-width: 80rem) {
        #gallery {
            columns: 3;
        }
    }

    @media (max-width: 68rem) {
        #gallery {
            columns: 2;
        }
    }

    @media (max-width: 32rem) {
        #gallery {
            columns: 1;
        }
    }
</style>
@endsection
