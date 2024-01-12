@extends('layouts.layout')

@section('content')
    <div class="d-flex justify-content-center my-5 mx-3">
        <div>
            <div class="card border-0 shadow rounded  mb-3" style="max-width: 30rem;">
                <div class="card-header text-center">
                    <h5 class="card-title mb-0">{{ $service->title }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $service->description }}</p>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <p class="card-text"><strong>Local: </strong>{{ $service->local }}</p>
                </div>
            </div>

            @if (auth()->check() && auth()->user()->is_admin != 1)
            <div>
                <button class="btn btn-outline-primary py-0 mt-2">Me associar a este serviço</button>
            </div>
            @endif

            <div class="d-flex">
                <form action="{{ route('services.destroy', $service->id) }}" method="post">
                    @csrf
                    @method('delete')
                    @if (auth()->check() && auth()->user()->is_admin === 1)
                    <button type="submit" class="btn btn-outline-primary py-0 mt-2 mr-2">Excluir serviço</button>
                    @endif
                </form>
                @if (auth()->check() && auth()->user()->is_admin === 1)
                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-outline-primary py-0 mt-2 mr-2">Editar serviço</a>
                <a href="" class="btn btn-outline-primary py-0 mt-2 mr-2">Usuários associados</a>
                @endif
            </div>
            
        </div>
    </div>
@endsection
