@extends('layouts.layout')

@section('content')


<div class="container shadow rounded px-0 my-5">
  <div class="card-header bg-transparent shadow-sm mb-2">
    <h4 class="pt-3 ">Cadastrar novo serviço</h4>
  </div>
<form class="mb-3 py-4 px-4" action="{{ route ('services.update', $service->id) }}" method="post">  
    @csrf
    @method('put')
        <div class="form-group">
          <label for="">Tipo de Serviço</label>
          <input type="text" class="form-control" name="title" value="{{ $service->title }}">
        </div>
        <div class="form-group">
          <label for="">Local do Serviço</label>
          <input type="text" class="form-control" name="local" value="{{ $service->local }}">
        </div>
        <div class="form-group">
          <label for="">Descrição do Serviço</label>
          <textarea class="form-control" name="description" rows="3">{{ $service->description }}</textarea>
        </div>
        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mb-3">Salvar</button>
      </div>
        <div>
          @if ($errors->any())
          @foreach ($errors->all() as $error)
              {{ $error }}
          @endforeach   
          @endif
        </div>
      </form>
    </div>

@endsection