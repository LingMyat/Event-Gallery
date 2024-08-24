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
            <img class="cursor-pointer" data-modal-target="default-modal-{{ $photo->id }}" data-modal-toggle="default-modal-{{ $photo->id }}" src="{{ $photo->asset_photo_url }}" alt="{{ $photo->photo_url }}" />

            <div id="default-modal-{{ $photo->id }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <div class="flex items-center gap-2">
                                <form method="POST" class="w-full"
                                    action="{{ route('photos.changeStatus', $photo) }}">

                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" name="status" value="rejected">

                                    <button type="submit"
                                        class="px-4 py-2 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dark:text-gray-200 flex gap-1 items-center">

                                        <svg class="w-6 h-6 text-red-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>

                                        Reject
                                    </button>
                                </form>

                                <form method="POST" class="w-full"
                                    action="{{ route('photos.changeStatus', $photo) }}">

                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" name="status" value="delete">

                                    <button type="submit"
                                        class="px-4 py-2 w-full hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 flex gap-1 items-center">

                                        <svg class="w-6 h-6 text-red-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>

                                        Delete
                                    </button>
                                </form>
                            </div>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal-{{ $photo->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <div class="p-4 flex justify-center md:p-5 space-y-4">
                            <img src="{{ $photo->asset_photo_url }}" alt="{{ $photo->photo_url }}">
                        </div>
                    </div>
                </div>
            </div>
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
