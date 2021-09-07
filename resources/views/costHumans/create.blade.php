@extends('adminlte::page')

@section('title', 'Costos de Servicios')

@section('content_header')
    <h1>Costos de Servicios Humanos</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Agregar Costo') }}
                    <a href="{{ route('costHumans.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
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

                    <form action="{{ route('costHumans.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="description" value="{{ old('description') }}" required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="unit_service" class="col-sm-2 col-form-label">Unidad de medida</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="unit_service" value="{{ old('unit_service') }}" required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="amount_service" class="col-sm-2 col-form-label">Cantidad de servicio</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="amount_service" value="{{ old('amount_service') }}" required>
                            </div>
                          </div>

                            <div class="form-group row">
                                <label for="year" class="col-sm-2 col-form-label">Año</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="year">
                                    @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="month" class="col-sm-2 col-form-label">Mes</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="month">
                                    @foreach($months as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                    @endforeach
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
                          <label for="money" class="col-sm-2 col-form-label">Moneda</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="money" id="money">
                              <option value="UF">UF</option>
                              <option value="CLP">CLP</option>
                              <option value="Dolár">Dolár</option>
                            </select>
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
