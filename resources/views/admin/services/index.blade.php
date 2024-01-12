@extends('layouts.layout')

@section('content')
    <div class="card mx-5 my-5 border-0 rounded shadow-lg">
        <div class="card-body">
            <h4 class="text-secondary mr-3 mx-2">Serviços</h4>
            <div class="d-flex justify-content-between mx-2">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
                @if (auth()->check() && auth()->user()->is_admin === 1)
                <a class="btn btn-primary my-2 mx-2 my-sm-0" href="{{ route('services.create') }}">Adicionar Serviço</a>
            </div>
            @endif

            <hr>

            <div class="d-flex flex-wrap justify-content-start mt-5">
                @foreach ($services as $service)
                    <div class="card mb-3 mx-2 shadow" style="max-width: 18rem;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $service->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $service->description }}</p>
                        </div>
                        <hr class="m-0">
                        <div class="card-body pb-0">
                            <p class="card-text"><strong>Local: </strong>{{ $service->local }}</p>
                        </div>
                        
                        <a href="{{ route('services.show', $service->id) }}" class="d-flex justify-content-end px-3 py-3" data-bs-toggle="tooltip"
                            title="Visualizar">
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
