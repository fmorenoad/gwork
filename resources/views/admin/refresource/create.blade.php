@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Recurso') }}
                <a href="{{ route('refresources.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
                    
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
                    <form action="{{ route('refresources.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Tipo de Recurso</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type" id="type" wire:model="type">
                                    <option value="equipment">Equipos y Maquinas</option>
                                    <option value="material">Materiales</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resource" class="col-sm-2 col-form-label">Recurso</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="resource" id="resource" value="{{ old('resource') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit" class="col-sm-2 col-form-label">Unidad de Medida</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="unit" id="unit" value="{{ old('unit') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observation" class="col-sm-2 col-form-label">Observación</label>
                            <div class="col-sm-10">
                              <textarea name="observation" id="observation" class="form-control" rows="3">{{ old('observation') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                              <button type="submit" class="btn btn-primary float-right">Crear</button>
                        </div>
                
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
 
@stop

@section('js')
@stop