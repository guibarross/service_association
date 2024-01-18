@extends('layouts.layout')

@section('content')

    <div class="container my-5 rounded shadow-lg px-0">
        <div class="card-header shadow border-0">
            <h3>Serviços Associados</h3>
        </div>

        <div class="py-5 mx-4">
            @if ($services->isEmpty())
                <p>Você não está associado a nenhum serviço no momento, acesse <a href="{{ route('services.index') }}">aqui</a> os serviços disoiníveis.</p>
            @else
                <table class="table border">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Serviço</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Local</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    @foreach ($user->associatedServices as $service)
                        <tbody>
                            <tr>
                                <td><a href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a></td>
                                <td>{{ Str::limit($service->description, '40') }}</td>
                                <td>{{ $service->local }}</td>
                                <form action="{{ route('services.disassociation', ['id' => $service->id]) }}" method="post">
                                    @csrf
                                <td><button type="submit" class="btn btn-danger delete-btn"><i class="bi bi-trash3"></i> Desassociar</button></td>
                                </form>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
