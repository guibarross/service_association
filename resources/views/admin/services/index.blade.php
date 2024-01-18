@extends('layouts.layout')

@section('content')
<div>

    <div>
        <img class="img-fluid" src="{{ asset('images/banner.jpg') }}" alt="">
    </div>
    
    <div class="mx-5 my-5 border-0 rounded shadow-lg">
            <div class="card-header shadow pb-4">
            <h3 class="mr-3 mx-2 pb-2">Serviços</h3>
            <div class="d-flex justify-content-between mx-2">
                <form action="{{ route('services.search') }}" method="get" class="form-inline">
                    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                </form>
                @if (auth()->check() && auth()->user()->is_admin === 1)
                    <a class="btn btn-outline-primary my-2 mx-2 my-sm-0" href="{{ route('services.create') }}">Adicionar Serviço</a>
                @endif
            </div>
        </div>

        <div class="card-body">
            @if ($services->isEmpty())
                <p>Nenhum resultado encontrado.</p>
                @else
            <div class="d-flex flex-wrap mt-3 mb-4 row">
                @foreach ($services as $service)
                <div class="col-md-4 col-sm-12 d-flex">
                    <div class="card mt-4 mb-3 mx-2 shadow border-0 roundeed" style="max-width: 23rem;">
                        <div class="card-header">
                            <h5 class="card-title mb-0 text-center">{{ $service->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ Str::limit($service->description, '40') }}</p>
                        </div>
                        <hr class="m-0">
                        <div class="card-body pb-0">
                            <p class="card-text"><i class="bi bi-geo-alt"></i> {{ $service->local }}</p>
                        </div>

                        <a href="{{ route('services.show', $service->id) }}" class="d-flex justify-content-end px-3 pb-3"
                            data-bs-toggle="tooltip" title="Visualizar">
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            <hr>
            <div class="row d-flex justify-content-end pt-3 pr-5">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
