@extends('layouts.layout')

@section('content')
    <div class="container my-5 rounded shadow-lg px-0">
        <div class="card-header bg-transparent shadow-sm border-0 py-3">
            <h3>Usuários Associados:</h3>
            <h5><a href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a></h5>
        </div>

        <div class="py-5 mx-4">
            <table class="table border">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            </form>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
