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
                        
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
       
                            <div class="form-group row">
                              <label for="permission" class="col-sm-2 col-form-label">Permiso</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="permission" id="permission" value="{{ old('permission') }}">
                              </div>
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Crear</button>
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

@stop