@extends('adminlte::page')

@section('title', 'Servicios de Contrato')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Servicios de Contrato') }}
                    <a href="{{ route('contracts.index') }}" class="btn btn-sm btn-secondary float-right">Volver a Contratos</a>
                    <a href="{{ route('services.create', ['contract' => $contract]) }}" class="btn btn-sm btn-primary float-right">Nuevo Servicio</a>
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
                                <th>Contrato</th>
                                <th>Servicio</th>
                                <th>Unidad</th>
                                <th>Monto</th>
                                <th>Fecha Creación</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->code }}</td>
                                <td>{{ $service->contract->code . ' - ' . $service->contract->description }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->unit }}</td>
                                <td>{{ $service->cost }}</td>
                                <td>{{ $service->created_at }}</td>
                                <td>
                                    <a href="{{ route('managment.index', ['contract' => $contract, 'service' => $service]) }}" class="btn btn-primary btn-sm">Ver Usuarios</a>
                                </td>
                                <td>
                                    <a href="{{ route('services.edit', ['contract' => $contract, 'service' => $service]) }}" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('services.destroy', ['contract' => $contract, 'service' => $service]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type='submit' value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar...?')">
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
