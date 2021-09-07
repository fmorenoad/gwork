@extends('adminlte::page')

@section('title', 'Costos de Servicios')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Monedas</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Lista de Monedas') }}
                    <a href="{{ route('money.create') }}" class="btn btn-sm btn-primary float-right">Agregar Moneda</a>
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
                                <th>Moneda</th>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>CLP</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($moneys as $money)
                            <tr>
                                <td>{{ $money->id  }}</td>
                                <td>{{ $money->money  }}</td>
                                <td>{{ $money->year }}</td>
                                <td>{{ $money->month }}</td>
                                <td>{{ $money->clp }}</td>
                                <td>
                                @can('admin.costs')
                                    <form action="{{ route('money.destroy', $money) }}" method="POST">
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
