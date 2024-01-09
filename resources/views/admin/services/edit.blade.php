@extends('layouts.layout')

@section('content')


<div class="container shadow rounded ">
    <h4 class="pt-3 px-3">Cadastrar novo serviço</h4>
    <hr>
<form class="mb-3 py-3 px-3" action="{{ route ('services.update', $service->id) }}" method="post">  
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
        <button type="submit" class="btn btn-primary mb-3">Salvar</button>
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