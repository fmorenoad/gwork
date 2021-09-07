@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Editar Empresa Contratista') }}
                <a href="{{ route('contracts.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>

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
                    <form action="{{ route('contracts.update', ['contract' => $contract])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">Codigo</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="code" id="code" value="{{ old('code', $contract->code) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Descripción del Contrato</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="description" id="description" value="{{ old('description', $contract->description) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="enterprise_id" class="col-sm-2 col-form-label">Empresa Contratista</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="enterprise_id" id="enterprise_id">
                                    <option value="{{ $contract->enterprise_id }}" selected>{{ $contract->enterprise->enterprise }}</option>
                                    @foreach ($enterprises as $enterprisei)
                                    <option value="{{$enterprisei->id}}">{{$enterprisei->enterprise}}</option>
                                    @endforeach
                                </select>
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
