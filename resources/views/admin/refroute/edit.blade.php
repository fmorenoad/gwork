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
                <div class="card-header">{{ __('Editar Ruta') }}
                <a href="{{ route('refroutes.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
                    
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
                    <form action="{{ route('refroutes.update', $refroute)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="route" class="col-sm-2 col-form-label">Ruta</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="route" id="route" value="{{ old('route', $refroute->route) }}">
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