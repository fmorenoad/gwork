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
                <div class="card-header">{{ __('Nueva Obra') }}
                <a href="{{ route('refworks.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
                    
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
                    <form action="{{ route('refworks.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="item" class="col-sm-2 col-form-label">Item</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="item" id="item" value="{{ old('item') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="work" class="col-sm-2 col-form-label">Obra</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="work" id="work" value="{{ old('work') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit" class="col-sm-2 col-form-label">Unidad de Medida</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="unit" id="unit" value="{{ old('unit') }}">
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
@endsection

@section('css')

@stop

@section('js')
@stop