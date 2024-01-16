@extends('layouts.layout')

@section('content')
    <div class="container shadow rounded my-5 px-0">
        <div class="card-header shadow border-0">
            <h3>Detalhes do Serviço</h3>
        </div>
        <div class="d-flex justify-content-center my-5 mx-3">
            <div class="mt-4 mb-5">
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
                    <form action="{{ route('services.associate', ['id' => $service->id]) }}" method="post">
                        @csrf
                        <div>
                            <button type="submit" class="btn btn-outline-primary py-0 mt-2">Me associar a este
                                serviço</button>
                        </div>
                    </form>
                @endif

                <div class="d-flex">
                    <form action="{{ route('services.destroy', $service->id) }}" method="post">
                        @csrf
                        @method('delete')
                        @if (auth()->check() && auth()->user()->is_admin === 1)
                            <button type="button" class="btn btn-outline-primary py-0 mt-2 mr-2"
                                onclick="confirmDelete()">Excluir serviço</button>

                            <!-- Modal de confirmação -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                                aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel">Confirmação de exclusão</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza de que deseja excluir este serviço?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary"
                                                onclick="submitDeleteForm()">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </form>

                    @if (auth()->check() && auth()->user()->is_admin === 1)
                        <a href="{{ route('services.edit', $service->id) }}"
                            class="btn btn-outline-primary py-0 mt-2 mr-2">Editar serviço</a>
                            <a href="{{ route('user.associated', ['serviceId' => $service->id]) }}" class="btn btn-outline-primary py-0 mt-2 mr-2">Usuários associados</a>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!-- Script do modal confirmar exclusão -->
    <script>
        function confirmDelete() {
            $('#confirmationModal').modal('show');
        }

        function submitDeleteForm() {
            $('#delete-form').submit();
        }
    </script>
@endsection
