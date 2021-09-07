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
                    <form action="{{ route('services.update', ['contract' => $contract, 'service' => $service])}}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="contract_id" value="{{$contract}}">
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">Codigo</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="code" id="code" value="{{ old('code', $service->code) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre del Servicio</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $service->name) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Descripción del Servicio</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="description" id="description" value="{{ old('description', $service->description) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-sm-2 col-form-label">Cantidad del Servicio Contratado</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount', $service->amount) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit" class="col-sm-2 col-form-label">Unidad del Servicio Contratado</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="unit" id="unit">
                                    <option value="{{$service->unit}}">{{$service->unit}}</option>
                                    <option value="Horas Hombre">Horas Hombre</option>
                                    <option value="Horas Maquina">Horas Maquina</option>
                                    <option value="Metros Lineales">Metros Lineales</option>
                                    <option value="Metros Cuadrados">Metros Cuadrados</option>
                                    <option value="Metros Cubicos">Metros Cubicos</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="money" class="col-sm-2 col-form-label">Moneda del Servicio Contratado</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="money" id="money">
                                    <option value="{{$service->money}}">{{$service->money}}</option>
                                    <option value="UF">UF</option>
                                    <option value="CLP">CLP</option>
                                    <option value="Dolár">Dolár</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cost" class="col-sm-2 col-form-label">Costo del Servicio Contratado</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="cost" id="cost" value="{{ old('cost', $service->cost) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="variable_cost" class="col-sm-2 col-form-label">Costo Variable (Hora Extra)</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="variable_cost" id="variable_cost" value="{{ old('variable_cost', $service->variable_cost) }}" required>
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
