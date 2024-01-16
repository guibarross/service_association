@extends('layouts.layout')


@section('content')
    <h1>Usuários Associados a {{ $service->title }}</h1>

    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @endforeach
    </ul>
@endsection