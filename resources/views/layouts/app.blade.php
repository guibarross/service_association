<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

@extends('layouts.layout')

@section('content')

<div class="my-5 mx-sm-5 border-0 rounded shadow-lg">
    <div class="card-header bg-transparent shadow-sm border-0 py-3">
            <!-- Profile Content -->
            <h4 class="m-0 py-2">Perfil do Usuário</h4>
        </div>

        <div class="card-body">
            {{ $slot }}
        </div>

        @stack('modals')  
    </div>

    @livewireScripts
@endsection

</html>
