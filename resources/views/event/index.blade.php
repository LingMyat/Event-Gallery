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
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                Upcomings Events
            </h2>

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

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            @foreach ($events as $event)
                <a href="{{ route('events.show', $event) }}" class="p-5 relative bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                    <svg class="w-6 h-6 dark:text-white absolute right-2 top-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                    </svg>

                    <p class="font-normal mb-2 text-gray-700 dark:text-gray-300">
                        {{ $event->date }} ({{ $event->format_time }})
                    </p>

                    <h5 class="mb-3 text-xl md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{Str::limit($event->name, 40, ' ...')}}
                    </h5>

                    <p class="font-normal text-gray-700 dark:text-gray-300">
                        {{Str::limit($event->description, 90, ' ...')}}
                    </p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
