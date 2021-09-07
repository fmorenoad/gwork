@extends('adminlte::page')

@section('title', 'Editar Recurso')

@section('content_header')
    <h1>Recursos</h1>
@stop

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Editar Recurso') }}
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

                    <form action="{{ route('resources.update', ['work' => $work, 'resource' => $resource]) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="type" id="type" value="{{ old('type', $resource->type) }}" readonly>
                            </div>
                          </div>
                        
                        <div class="form-group row">
                          <label for="resource" class="col-sm-2 col-form-label">Recurso</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="resource" id="resource">
                                <option value="{{ old('resource', $resource->refresource->resource) }}" selected>{{ old('resource', $resource->refresource->resource) }}</option>
                                @foreach($refresources as $refresource)
                                  <option value="{{ $refresource->resource }}">{{ $refresource->resource }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit" class="col-sm-2 col-form-label">Unidad de medida</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control-plaintext" name="unit" id="unit" value="{{ old('unit', $resource->unit) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-sm-2 col-form-label">Cantidad</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="quantity" id="quantity" value="{{ old('quantity', $resource->quantity) }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="observation" class="col-sm-2 col-form-label">Observación</label>
                            <div class="col-sm-10">
                             <textarea name="observation" id="observation" rows="3" class="form-control">{{ old('observation', $resource->observation) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Actualizar</button>
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