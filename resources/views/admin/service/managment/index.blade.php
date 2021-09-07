@extends('adminlte::page')

@section('title', 'Servicios de Contrato y Usuarios')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Servicios de Contrato y Usuarios') }}
                    <a href="{{ route('services.index', ['contract' => $contract]) }}" class="btn btn-sm btn-secondary float-right">Volver a Servicios</a>
                    <a href="{{ route('managment.create', ['contract' => $contract, 'service' => $service]) }}" class="btn btn-sm btn-primary float-right">Asociar Usuario a Servicio</a>
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
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Fecha Creación</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service_users as $service_user)
                            <tr>
                                <td>{{ $service_user->id }}</td>
                                <td>{{ $service_user->service->contract->id }}</td>
                                <td>{{ $service_user->service->name . ' ' . $service_user->service->description}}</td>
                                <td>{{ $service_user->user->name . ' ' . $service_user->user->lastname}}</td>
                                <td>{{ $service_user->status }}</td>
                                <td>{{ $service_user->created_at }}</td>
                                <td>
                                    @if ($service_user->status == 'Activo')
                                    <form action="{{ route('managment.destroy', ['contract' => $contract, 'service' => $service, 'managment' => $service_user]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type='submit' value="Deshabilitar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea Deshabilitar...?')">
                                    </form>
                                    @else
                                    <form action="{{ route('managment.destroy', ['contract' => $contract, 'service' => $service, 'managment' => $service_user]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type='submit' value="Activar" class="btn btn-sm btn-success" onclick="return confirm('¿Desea Activar...?')">
                                    </form>
                                    @endif

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
