@extends('layouts.app')

@section('template')
    <div>
        <x-bradcrumb />

        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-3">
            Photo Submissions
        </h2>

        <div class="relative min-h-[400px] overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Photo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Submitted By
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Event
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="p-3 text-center">
                                <img class="w-[80px]" src="{{ $photo->asset_photo_url }}" />
                            </td>
                            <td class="px-6 min-w-[180px] py-4">
                                {{ $photo->user->name }}
                            </td>
                            <td class="px-6 min-w-[180px] py-4">
                                <a class="text-blue-500 underline" href="{{ route('events.show', $photo->event->id) }}">
                                    {{ $photo->event->name }}
                                </a>
                            </td>
                            <td class="px-6 min-w-[180px] py-4">
                                {{ $photo->created_at->diffForHumans() }}
                            </td>
                            <td class="px-2 w-fit">
                                <div class="flex items-center gap-3">
                                    <button type="button" data-modal-target="default-modal-{{ $photo->id }}" data-modal-toggle="default-modal-{{ $photo->id }}" title="Photo Detail"
                                        class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-2 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">
                                        <svg class="w-5 h-5 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>

                                    <button id="dropdownDefaultButton-{{ $photo->id }}"
                                        data-dropdown-toggle="dropdown-{{ $photo->id }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-2 py-1 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700"
                                        type="button">

                                        status
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Dropdown menu -->
                                <div id="dropdown-{{ $photo->id }}"
                                    class="z-10 fixed hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <form method="POST" class="w-full"
                                                action="{{ route('photos.changeStatus', $photo) }}">

                                                @csrf
                                                @method('PATCH')

                                                <input type="hidden" name="status" value="approved">

                                                <button type="submit"
                                                    class="px-4 py-2 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex gap-1 items-center">

                                                    <svg class="w-6 h-6 text-green-500" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    Approve
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method="POST" class="w-full"
                                                action="{{ route('photos.changeStatus', $photo) }}">

                                                @csrf
                                                @method('PATCH')

                                                <input type="hidden" name="status" value="rejected">

                                                <button type="submit"
                                                    class="px-4 py-2 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex gap-1 items-center">

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
                                        </li>
                                        <li>
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
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>

                        <div id="default-modal-{{ $photo->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
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
                    @endforeach
                </tbody>
            </table>

            @if ($photos->count() == 0)
            <h3 class="text-xl font-medium mt-4">There is no photo submission.</h3>
            @endif
        </div>

    </div>
@endsection
