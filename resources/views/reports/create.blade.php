@extends('adminlte::page')

@section('title', 'Reportes')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Reportes</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Reporte') }}
                    <a href="{{ route('reports.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
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

                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Recurso</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="name">
                                    <option value="Reporte Cierre Mes">Reporte de Cierre de Mes</option>
                                    <option value="Resumen de Mes">Resumen de Mes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-sm-2 col-form-label">Año</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="year">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="month" class="col-sm-2 col-form-label">Mes</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="month">
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junioo</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="status" value="solicitado">

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Crear Reporte</button>
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
