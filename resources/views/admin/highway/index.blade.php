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
                <div class="card-header">{{ __('Lista de Tramos') }}
                    <a href="{{ route('refhighways.create') }}" class="btn btn-sm btn-primary float-right">Nuevo Tramo</a>
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
                        <table id="highways" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tramo</th>
                                <th>Fecha Creación</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($refhighways as $refhighway)
                            <tr>
                                <td>{{ $refhighway->id }}</td>
                                <td>{{ $refhighway->highway}}</td>
                                <td>{{ $refhighway->created_at }}</td>
                                <td>
                                    <a href="{{ route('refhighways.edit', $refhighway) }}" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('refhighways.destroy', $refhighway) }}" method="POST">
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
        $('#higways').DataTable();
    } );
</script>
@stop