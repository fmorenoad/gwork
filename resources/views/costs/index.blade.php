@extends('adminlte::page')

@section('title', 'Costos')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Obras</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Lista de Costos') }}
                @can('admin.costs')
                    <a href="{{ route('costs.create') }}" class="btn btn-sm btn-primary float-right">Agregar Nuevo Costo</a>
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
                        <table id="costsl" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tipo</th>
                                <th>Recurso</th>
                                <th>Unidad Medida</th>
                                <th>Costo</th>
                                <th>Moneda</th>
                                <th>Fecha Vigencia</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($costs as $cost)
                            <tr>
                                <td>{{ $cost->id  }}</td>
                                <td>{{ $cost->refresource->type }}</td>
                                <td>{{ $cost->refresource->resource }}</td>
                                <td>{{ $cost->refresource->unit }}</td>
                                <td>{{ $cost->cost }}</td>
                                <td>{{ $cost->unit_of_money }}</td>
                                <td>{{ $cost->execution_date }}</td>
                                <td>
                                @can('costs.edit')
                                    <a href="{{ route('costs.edit', $cost) }}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan
                                </td>
                                <td>
                                @can('costs.destroy')
                                    <form action="{{ route('costs.destroy', $cost) }}" method="POST">
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
    $('#costsl').DataTable();
} );
</script>


@stop
