@extends('layouts.layout')

@section('content')
    <div>
        <div class="px-sm-5 my-5 mx-sm-5 border-0 rounded shadow-lg">
            <div class="card-header bg-transparent pb-4 pt-4">
                <div class="d-flex justify-content-between">
                    <h3 class="mr-3">Serviços</h3>

                    <!-- Button modal adicionar novo serviço-->
                    <div class="d-flex">
                        @if (auth()->check() && auth()->user()->is_admin === 1)
                            <button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal"
                                data-target="#adicionarServico">
                                <i class="bi bi-plus-square"></i> </i>Adicionar
                                Serviço
                            </button>
                        @endif
                    </div>

                    <!-- Modal acicionar novo serviço-->
                    <div class="modal fade" id="adicionarServico" data-backdrop="static" data-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Adicionar novo serviço</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body px-0">
                                    <form class="mb-3 py-4" action="{{ route('services.store') }}" method="post">
                                        @csrf
                                        <div class="px-4 pb-4">
                                            <div class="form-group">
                                                <label for="">Tipo de Serviço</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ old('title') }}" @required(true)>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Local do Serviço</label>
                                                <input type="text" class="form-control" name="local"
                                                    value="{{ old('local') }}" @required(true)>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Descrição do Serviço</label>
                                                <textarea class="form-control" name="description" rows="3" @required(true)>{{ old('description') }}</textarea>
                                            </div>
                                            <div>
                                                @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-end mx-4">
                                            <button type="button" class="btn btn-secondary mr-3"
                                                data-dismiss="modal">Fechar</button>
                                            <div class="d-flex justify-content-end"><button type="submit"
                                                    class="btn btn-primary ">Cadastrar</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal acicionar novo serviço-->
                </div>

                <div class="mt-4 mt-sm-3 d-flex d-sm-block justify-content-center row">
                    <form action="{{ route('services.search') }}" method="get">
                        <div class="d-flex col-sm-4">
                            <input class="form-control mr-2" type="search" name="query"
                                placeholder="Pesquisar serviço..." aria-label="Pesquisar" value="{{ $query ?? '' }}">
                            <button class="btn btn-outline-primary my-sm-0" type="submit"><i
                                    class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body">
                @if (isset($query))
                    <p>Resultados da busca para <strong> "{{ $query }}":</strong></p>
                @endif

                @if ($services->isEmpty() && empty($query))
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

                                    <!-- Button modal adicionar novo serviço-->
                                    <a class="d-flex justify-content-end px-3 pb-3" type="button" data-toggle="modal"
                                        data-target="#verDetalhes_{{ $service->id }}"data-bs-toggle="tooltip"
                                        title="Visualizar">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                                <!-- Modal ver detalhes do serviço-->
                                <div class="modal fade shadow rounded" id="verDetalhes_{{ $service->id }}"
                                    data-backdrop="static" data-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="">Detalhes do serviço</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-center my-4 mx-3">
                                                    <div class="my-3 ">
                                                        <div class="card border-0 shadow rounded mb-3"
                                                            style="max-width: 40rem;">
                                                            <div class="card-header text-center py-3">
                                                                <h5 class="card-title mb-0">{{ $service->title }}</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="card-text">{{ $service->description }}</p>
                                                            </div>
                                                            <hr class="m-0">
                                                            <div class="card-body bg-light">
                                                                <p class="card-text"><i class="bi bi-geo-alt"></i>
                                                                    {{ $service->local }}</p>
                                                            </div>
                                                        </div>

                                                        @if (auth()->check() && auth()->user()->is_admin != 1)
                                                            <form
                                                                action="{{ route('services.associate', ['id' => $service->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <div>
                                                                    <button type="submit"
                                                                        class="btn btn-outline-primary py-0 mt-2">Me
                                                                        associar a este
                                                                        serviço</button>
                                                                </div>
                                                            </form>
                                                        @endif

                                                        <div class="d-md-flex justify-content-right">
                                                            @if (auth()->check() && auth()->user()->is_admin === 1)
                                                                <div class="mr-md-2">
                                                                    <a href="{{ route('user.associated', ['serviceId' => $service->id]) }}"
                                                                        class="btn btn-outline-primary btn-block py-0 mt-2 mr-2">Usuários
                                                                        associados</a>
                                                                </div>
                                                                <div class="mr-md-2">
                                                                    <a href="{{ route('services.edit', $service->id) }}"
                                                                        class="btn btn-outline-primary btn-block py-0 mt-2 mr-2">Editar
                                                                        serviço</a>
                                                                </div>
                                                            @endif
                                                            <form action="{{ route('services.destroy', $service->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                @if (auth()->check() && auth()->user()->is_admin === 1)
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger btn-block py-0 mt-2 mr-2"
                                                                        data-toggle="modal"
                                                                        data-target="#confirmationDeleteModal">Excluir
                                                                        serviço</button>
                                                                @endif
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal ver detalhes do serviço-->
                            </div>
                        @endforeach
                        <!-- Modal de confirmação exclusão-->
                        <form action="{{ route('services.destroy', $service->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="modal fade mt-5" id="confirmationDeleteModal" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-body font-weigth-bold text-white">
                                            Tem certeza de que deseja excluir
                                            este serviço?
                                        </div>
                                        <div class="text-center mb-4">
                                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"
                                                aria-label="Close">Cancelar</button>

                                            <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Sim,
                                                excluir!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end Modal de confirmação exclusão-->
                    </div>
                @endif
                <hr>
                @if ($services instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="row d-flex justify-content-end pt-3 pr-5">
                        {{ $services->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#confirmationDeleteModal').on('shown.bs.modal', function() {
                $('#confirmDeleteButton').click(function() {
                    $('#delete-form').submit();
                });
            });
        });
    </script>

@endsection
