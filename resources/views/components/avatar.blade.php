@props([
    'name' => '',
    'email' => '',
])

@php
    $nameArr   = explode(' ', $name);

    $firstName = $nameArr[0];
    $firstLetter = substr($firstName, 0, 1);

    if(count($nameArr) > 1) {
        $lastName   = $nameArr[count($nameArr) - 1];
        $lastLetter = substr($lastName, 0, 1);
    }
@endphp

<div class="flex gap-3 items-center">
    <div class="inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
        {{ $firstLetter.($lastLetter??'') }}
    </div>

    <div>
        <p class="text-sm font-medium">{{ $name }}</p>
        <p class="text-xs">{{ $email }}</p>
    </div>

</div>
