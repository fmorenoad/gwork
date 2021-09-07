@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Editar Usuario') }}
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
                    
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
                    <form action="{{ route('users.update', $user)}}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname', $user->lastname) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="enterprise" class="col-sm-2 col-form-label">Empresa</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="enterprise" id="enterprise" value="{{ old('enterprise', $user->enterprise) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-sm-2 col-form-label">Cargo</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="position" id="position" value="{{ old('position', $user->position) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label">Rol en el Sistema</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="role" id="role" value="{{ old('role', $user->role) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" id="password" value="{{ old('password', $user->role) }}">
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
@endsection

@section('css')

@stop

@section('js')
@stop