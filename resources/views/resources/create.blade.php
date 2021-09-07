@extends('adminlte::page')

@section('title', 'Crear Recurso')

@section('content_header')
    <h1>Recursos</h1>
@stop

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Recurso') }}
                    <a href="{{ route('works.show', ['work' => $work]) }}" class="btn btn-sm btn-secondary float-right">Volver</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('resources.store', ['work' => $work]) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" class="form-control" name="type" id="type" value="Equipos o Maquinaria">
                        </div>

                        @livewire('resource-create-component')

                        <div class="form-group row">
                            <label for="quantity" class="col-sm-2 col-form-label">Cantidad</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="quantity" id="quantity">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="observation" class="col-sm-2 col-form-label">Observación</label>
                            <div class="col-sm-10">
                             <textarea name="observation" id="observation" rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Agregar Recurso</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
  @livewireStyles
@stop

@section('js')
  @livewireScripts
@stop