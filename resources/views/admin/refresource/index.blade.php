@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Lista de Recursos') }}
                    <a href="{{ route('refresources.create') }}" class="btn btn-sm btn-primary float-right">Nuevo Recurso</a>
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
                        <table id="refresources" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tipo</th>
                                <th>Recurso</th>
                                <th>Unidad</th>
                                <th>Observación</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($refresources as $refresource)
                            <tr>
                                <td>{{ $refresource->id }}</td>
                                <td>{{ $refresource->type}}</td>
                                <td>{{ $refresource->resource}}</td>
                                <td>{{ $refresource->unit }}</td>
                                <td>{{ $refresource->observation }}</td>
                                <td>
                                    <a href="{{ route('refresources.edit', $refresource) }}" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('refresources.destroy', $refresource) }}" method="POST">
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
        $('#refresources').DataTable();
    } );
</script>
@stop