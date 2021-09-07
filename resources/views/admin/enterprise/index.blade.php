@extends('adminlte::page')

@section('title', 'Emnpresas Contratistas')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Empresas Contratistas') }}
                    <a href="{{ route('enterprises.create') }}" class="btn btn-sm btn-primary float-right">Nueva Empresa</a>
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

                    <div class="table-responsive-md">
                        <table id="workst" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>RUT</th>
                                <th>Empresa</th>
                                <th>Fecha Creación</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enterprises as $enterprise)
                            <tr>
                                <td>{{ $enterprise->id }}</td>
                                <td>{{ $enterprise->rut }}</td>
                                <td>{{ $enterprise->enterprise }}</td>
                                <td>{{ $enterprise->created_at }}</td>
                                <td>
                                    <a href="{{ route('enterprises.edit', $enterprise) }}" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('enterprises.destroy', $enterprise) }}" method="POST">
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

@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#workst').DataTable();
    } );
</script>
@stop
