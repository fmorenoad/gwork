@extends('adminlte::page')

@section('title', 'Calendario de Reportes')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Calendario</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Lista de Calendario') }}
                    <a href="{{ route('calendars.create') }}" class="btn btn-sm btn-primary float-right">Nuevo Mes</a>
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

                    <div class="table-responsive-sm">
                        <table id="calendarsl" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Días Laborales</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($calendars as $calendar)
                            <tr>
                                <td>{{ $calendar->id  }}</td>
                                <td>{{ $calendar->year }}</td>
                                <td>{{ $calendar->month }}</td>
                                <td>{{ $calendar->date_init }}</td>
                                <td>{{ $calendar->date_end }}</td>
                                <td>{{ $calendar->laboral_days }}</td>
                                <td>
                                    <a href="{{ route('calendars.edit', $calendar) }}" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('calendars.destroy', $calendar) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type='submit' value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea elimnar...?')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
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
<script>
$(document).ready(function() {
    $('#calendarsl').DataTable();
} );
</script>


@stop
