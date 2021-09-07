@extends('adminlte::page')

@section('title', 'Contratos')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Contratos') }}
                    <a href="{{ route('contracts.create') }}" class="btn btn-sm btn-primary float-right">Nuevo Contrato</a>
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
                                <th>Contratista</th>
                                <th>Contrato</th>
                                <th>Servicios</th>
                                <th>Fecha Creación</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contracts as $contract)
                            <tr>
                                <td>{{ $contract->code }}</td>
                                <td>{{ $contract->enterprise->enterprise }}</td>
                                <td>{{ $contract->description }}</td>
                                <td>{{ count($contract->services) }} <a href="{{ route('services.index', $contract) }}" class="btn btn-primary btn-sm">Ver</a></td>
                                <td>{{ $contract->created_at }}</td>
                                <td>
                                    <a href="{{ route('contracts.edit', $contract) }}" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('contracts.destroy', $contract) }}" method="POST">
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
