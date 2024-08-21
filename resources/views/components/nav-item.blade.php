@props([
    'url'    => '',
    'label'  => '',
    'active' => false
])

@php
    $conditionalClasses = $active ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700';
@endphp

<a
  href="{{ $url }}"
  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group {{  $conditionalClasses }}">
    <svg
      class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
      viewBox="0 0 22 21">
        {{ $slot }}
    </svg>

    <span class="ms-3">{{ $label }}</span>
</a>
