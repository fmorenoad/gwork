@extends('adminlte::page')

@section('title', 'Crear Mes Calendario')

@section('content_header')
    <h1>Calendario</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Mes Calendario') }}
                    <a href="{{ route('calendars.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
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

                    <form action="{{ route('calendars.store') }}" method="POST">
                        @csrf

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
                            <label for="date_init" class="col-sm-2 col-form-label">Fecha Inicio</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="date_init">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_end" class="col-sm-2 col-form-label">Fecha Fin</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="date_end">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="laboral_days" class="col-sm-2 col-form-label">Días laborales</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" name="laboral_days" required>
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
