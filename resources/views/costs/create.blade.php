@extends('adminlte::page')

@section('title', 'Crear Costo')

@section('content_header')
    <h1>Administración de Costos</h1>
@stop

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Agregar Costo') }}
                    <a href="{{ route('costs.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
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

                    <form action="{{ route('costs.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="refresource_id" class="col-sm-2 col-form-label">Recurso</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="refresource_id" id="refresource_id" required>
                                @foreach($refresources as $refresource)
                                  @if($refresource ==  old('refresource_id'))
                                  <option value="{{ $refresource->id }}" selected>{{ $refresource->resource }}</option>
                                  @endif  
                                  <option value="{{ $refresource->id }}">{{ $refresource->resource }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="unit_of_money" class="col-sm-2 col-form-label">Moneda</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="unit_of_money" id="unit_of_money">
                              <option value="CLP">CLP</option>
                              <option value="UF">UF</option>
                              <option value="Dolár">Dolár</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="cost" class="col-sm-2 col-form-label">Costo</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="cost" id="cost" value="{{ old('cost') }}" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="execution_date" class="col-sm-2 col-form-label">Fecha de Vigencia</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="execution_date" id="execution_date" value="{{ old('execution_date') }}" required>
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
  @livewireStyles
@stop

@section('js')
  @livewireScripts
@stop