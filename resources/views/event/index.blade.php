@extends('layouts.app')

@section('template')
    <div>
        <x-bradcrumb :lists="[
            [
                'label' => 'Events',
                'url' => route('events.index'),
            ],
        ]" />

        <div class="flex items-center lg:justify-between mb-3">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    Upcomings Events
                </h2>
            </div>

            <span class="sm:ml-3">
                <a href="{{route('events.create')}}"
                    title="New Event"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-1.5 py-1 md:px-3 md:py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 gap-1">

                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <span class="hidden md:block">New Event</span>
                </a>
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($events as $event)
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{Str::limit($event->name, 40, ' ...')}}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{Str::limit($event->description, 90, ' ...')}}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
