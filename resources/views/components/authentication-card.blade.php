@extends('layouts.layout')

@section('content')

<div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0">
    <div>
       <h4 class="text-secondary">Login</h4>
    </div>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>

@endsection

