@extends('layouts.app')

@section('template')
    <div>
        {{ auth()->user()->name }}
    </div>
@endsection
