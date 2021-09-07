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
                <div class="card-header">{{ __('Lista de Reportes') }}
                @can('works.create')
                    <a href="{{ route('reports.create') }}" class="btn btn-sm btn-primary float-right">Nuevo reporte</a>
                @endcan
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
                        <table id="worksl" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Reporte</th>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>Estado</th>
                                <th>Fecha Solicitud</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr>
                                <td>{{ $report->id  }}</td>
                                <td>{{ $report->name }}</td>
                                <td>{{ $report->year }}</td>
                                <td>{{ $report->month }}</td>
                                <td>{{ $report->status }}</td>
                                <td>{{ $report->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('reports.download', $report) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$report->id}}">
                                                <input type="hidden" name="month" value="{{$report->month}}">
                                                <input type="hidden" name="year" value="{{$report->year}}">
                                                <input type='submit' value="Descargar" class="btn btn-sm btn-primary">
                                            </form>
                                        </div><div class="col">
                                            <form action="{{ route('reports.destroy', $report) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type='submit' value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea elimnar...?')">
                                            </form>
                                        </div>
                                      </div>
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
    $('#worksl').DataTable();
} );
</script>


@stop
