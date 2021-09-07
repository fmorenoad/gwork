@extends('adminlte::page')

@section('title', 'Servicios de Contrato')

@section('content_header')
    <h1>{{ __('Administración') }}</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Servicio') }}
                <a href="{{ route('managment.index', ['contract' => $contract, 'service' => $service]) }}" class="btn btn-sm btn-secondary float-right">Volver</a>

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
                    <form action="{{ route('managment.store', ['contract' => $contract, 'service' => $service->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="contract_id" value="{{$contract}}">
                        <input type="hidden" name="service_id" value="{{$service->id}}">
                        <input type="hidden" name="status" value="Activo">
                        <div class="form-group row">
                            <label for="service" class="col-sm-2 col-form-label">Servicio</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="service" id="service" value="{{ $service->code . ' - ' . $service->name }}" readonly required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">Seleccione al usuario a agregar</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="user_id" id="user_id">
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name . ' ' . $user->lastname . ' - ' . $user->enterprise}}</option>
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
