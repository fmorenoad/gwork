@extends('adminlte::page')

@section('title', 'Costos de Servicios')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Costos de Servicios Humanos</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Lista de Costos') }}
                    <a href="{{ route('costHumans.create') }}" class="btn btn-sm btn-primary float-right">Agregar Nuevo Costo</a>
                </div>

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

                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="costHumansl" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th>Unidad Medida</th>
                                <th>Cantidad</th>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>Costo</th>
                                <th>Moneda</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($costHumans as $costHuman)
                            <tr>
                                <td>{{ $costHuman->id  }}</td>
                                <td>{{ $costHuman->description }}</td>
                                <td>{{ $costHuman->unit_service }}</td>
                                <td>{{ $costHuman->amount_service }}</td>
                                <td>{{ $costHuman->year }}</td>
                                <td>{{ $costHuman->month }}</td>
                                <td>{{ $costHuman->cost }}</td>
                                <td>{{ $costHuman->money }}</td>
                                <td>
                                @can('admin.costs')
                                    <a href="{{ route('costHumans.edit', $costHuman) }}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan
                                </td>
                                <td>
                                @can('admin.costs')
                                    <form action="{{ route('costHumans.destroy', $costHuman) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type='submit' value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea elimnar...?')">
                                    </form>
                                @endcan
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
    $('#costHumansl').DataTable();
} );
</script>


@stop
