@extends('adminlte::page')

@section('title', 'Crear Costo')

@section('content_header')
    <h1>Administración de Monedas</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Agregar Moneda') }}
                    <a href="{{ route('money.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
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

                    <form action="{{ route('money.store') }}" method="POST">
                        @csrf

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

                        <div class="form-group row">
                            <label for="year" class="col-sm-2 col-form-label">Año</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="year" id="year" value="{{ old('year') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="month" class="col-sm-2 col-form-label">Mes</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="month" id="month" value="{{ old('month') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="clp" class="col-sm-2 col-form-label">CLP</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" name="clp" id="clp" value="{{ old('clp') }}" required>
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
