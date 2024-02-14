@extends('layouts.layout')

@section('content')

<div class="my-5 mx-md-5 border-0 rounded shadow-lg">
        <div class="card-header bg-transparent shadow-sm border-0 py-3">
            <h4 class="mb-0 py-2">Serviços Associados</h4>
        </div>

        <div class="py-5">
            @if ($services->isEmpty())
                <p>Você não está associado a nenhum serviço no momento, acesse <a href="{{ route('services.index') }}">aqui</a> os serviços disoiníveis.</p>
            @else
            
            <div class="container col-sm-6 pt-3">
                <table class="table border">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Serviço</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    @foreach ($user->associatedServices as $service)
                        <tbody>
                            <tr>
                                <td><a href="{{ route('services.index', $service->id) }}">{{ $service->title }}</a></td>
                                <td>
                                <form action="{{ route('services.disassociation', ['id' => $service->id]) }}" method="post">
                                    @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Desassociar</button>
                                </form>
                            </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                </div>
            @endif
        </div>
    </div>
@endsection
