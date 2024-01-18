@extends('layouts.layout')

@section('content')
    <div>
        {{-- <div>
        <img class="img-fluid shadow" src="{{ asset('images/banner.jpg') }}" alt="Banner de serviços">
    </div>  --}}

        <div class="px-sm-5 my-5 mx-sm-5 border-0 rounded shadow-lg">
            <div class="card-header bg-transparent pb-4 pt-4">
                <div class="d-flex justify-content-between">
                    <h3 class="mr-3">Serviços</h3>
                    <div class="d-flex">
                        @if (auth()->check() && auth()->user()->is_admin === 1)
                            <a class="btn btn-outline-primary my-2 my-sm-0" href="{{ route('services.create') }}"><i
                                    class="bi bi-plus-square"></i> </i>Adicionar
                                Serviço</a>
                        @endif
                    </div>
                </div>

                <div class="mt-4 mt-sm-3 d-flex d-sm-block justify-content-center row">
                    <form action="{{ route('services.search') }}" method="get" class="">
                        <div class="d-flex col-sm-4">
                            <input class="form-control mr-2" type="search" name="query"
                                placeholder="Pesquisar serviço..." aria-label="Pesquisar">
                            <button class="btn btn-outline-primary my-sm-0" type="submit"><i
                                    class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body">
                @if ($services->isEmpty())
                    <p>Nenhum resultado encontrado.</p>
                @else
                    <div class="d-flex mt-3 mb-4 row">
                        @foreach ($services as $service)
                            <div class="col-sm-4 d-flex justify-content-center">
                                <div class="card mt-4 mb-3 shadow border-0 roundeed" style="max-width: 20rem;">
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

                                    <a href="{{ route('services.show', $service->id) }}"
                                        class="d-flex justify-content-end px-3 pb-3" data-bs-toggle="tooltip"
                                        title="Visualizar">
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
