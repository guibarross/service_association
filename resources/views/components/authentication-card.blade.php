@extends('layouts.layout')

@section('content')

<div class="d-flex sm:justify-center items-center mt-3 mb-5">
    <div class="w-full sm:max-w-md px-6 py-4 my-5 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>

@endsection

