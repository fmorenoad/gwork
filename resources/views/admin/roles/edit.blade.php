@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Administración</h1>
@stop

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>                    
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
                    <div class="box box-primary">
                        
                        <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
                            @csrf
                            @method('put')
       
                            <div class="form-group row">
                              <label for="name" class="col-sm-2 col-form-label">Rol</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('amount_of_work', $role->name) }}">
                              </div>
                          </div>
    
                            <div class="form-group row">
                                <label for="route" class="col-sm-2 col-form-label">Permisos</label>
                                <div class="col-sm-10">
                                    @foreach($permissions as $permission)
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" 
                                                    name="{{ $permission->name }}"
                                                    @foreach($role_has_permissions as $role_has_permission)
                                                        @if($role_has_permission->permission_id == $permission->id)
                                                        checked
                                                        @endif
                                                    @endforeach
                                                    >
                                            {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                            </div>
                        </form>
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
        $('#users').DataTable();
    } );
</script>
@stop