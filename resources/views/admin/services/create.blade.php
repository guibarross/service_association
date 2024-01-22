@extends('layouts.layout')

@section('content')

<div class="container shadow rounded px-0 mt-5 mb-5 col-md-6">
  <div class="card-header bg-transparent shadow-sm border-0"> <h4 class="mb-0 py-2">Cadastrar novo serviço</h4>
  </div>
    
<form class="mb-3 py-4 px-4" action="{{ route ('services.store') }}" method="post">  
    @csrf
        <div class="form-group">
          <label for="">Tipo de Serviço</label>
          <input type="text" class="form-control" name="title"  value="{{ old ('title') }}" >
        </div>
        <div class="form-group">
          <label for="">Local do Serviço</label>
          <input type="text" class="form-control" name="local"  value="{{ old ('local') }}" >
        </div>
        <div class="form-group">
          <label for="">Descrição do Serviço</label>
          <textarea class="form-control" name="description" rows="3">{{ old ('description') }}</textarea>
        </div>
        <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary mb-3">Cadastrar</button></div>
       
        <div>
        @if ($errors->any())
        @foreach ($errors->all() as $error )
            {{ $error }}
        @endforeach   
        @endif
        </div>
      </form>
    </div>

@endsection