@extends('adminlte::page')

@section('title', 'Crear Obra')

@section('content_header')
    <h1>Obras</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Nueva Obra') }}
                    <a href="{{ route('works.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
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

                    <form action="{{ route('works.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="contract_id" class="col-sm-2 col-form-label">Contrato</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="service_id" id="service_id">
                                @foreach($services as $service)
                                  @if($service->id ==  old('service_id'))
                                  <option value="{{ $service->id }}" selected>{{ $service->name . ' - ' . $service->description }}</option>
                                  @endif
                                  <option value="{{ $service->id }}">{{ $service->name . ' - ' . $service->description }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        @livewire('work-create-component')

                        <div class="form-group row">
                            <label for="amount_of_work" class="col-sm-2 col-form-label">Cantidad de Obra</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="amount_of_work" id="amount_of_work" value="{{ old('amount_of_work') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="frequency" class="col-sm-2 col-form-label">Frecuencia</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="frequency" id="frequency">
                                @foreach($reffrequencies as $reffrequency)
                                  @if($reffrequency ==  old('frequency'))
                                  <option value="{{ $reffrequency->frequency }}" selected>{{ $reffrequency->frequency }}</option>
                                  @endif
                                  <option value="{{ $reffrequency->frequency }}">{{ $reffrequency->frequency }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="highway" class="col-sm-2 col-form-label">Tramo</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="highway" id="highway">
                                @foreach($refhighways as $refhighway)
                                  @if($refhighway ==  old('highway'))
                                  <option value="{{ $refhighway->highway }}" selected>{{ $refhighway->highway }}</option>
                                  @endif
                                  <option value="{{ $refhighway->highway }}">{{ $refhighway->highway }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="route" class="col-sm-2 col-form-label">Ruta</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="route" id="route">
                                @foreach($refroutes as $refroute)
                                  @if($refroute ==  old('route'))
                                  <option value="{{ $refroute->route }}" selected>{{ $refroute->route }}</option>
                                  @endif
                                  <option value="{{ $refroute->route }}">{{ $refroute->route }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direction" class="col-sm-2 col-form-label">Sentido de trafico</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="direction" id="direction">
                                @foreach($refdirections as $refdirection)
                                  @if($refdirection ==  old('direction'))
                                  <option value="{{ $refdirection->direction }}" selected>{{ $refdirection->direction }}</option>
                                  @endif
                                  <option value="{{ $refdirection->direction }}">{{ $refdirection->direction }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start" class="col-sm-2 col-form-label">Km Inicio</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="start" id="start" value="{{ old('start') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end" class="col-sm-2 col-form-label">Km Fin</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="end" id="end" value="{{ old('end') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="origin" class="col-sm-2 col-form-label">Origen de Obra</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="origin" id="origin">
                                @foreach($reforigins as $reforigin)
                                  @if($reforigin ==  old('origin'))
                                  <option value="{{ $reforigin->origin }}" selected>{{ $reforigin->origin }}</option>
                                  @endif
                                  <option value="{{ $reforigin->origin }}">{{ $reforigin->origin }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_minuta" class="col-sm-2 col-form-label">Número de Minuta (Solo si aplica)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="num_minuta" id="num_minuta" value="{{ old('num_minuta') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ficha_accidente" class="col-sm-2 col-form-label">Ficha Accidente (Solo si aplica)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ficha_accidente" id="ficha_accidente" value="{{ old('ficha_accidente') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observation" class="col-sm-2 col-form-label">Observación</label>
                            <div class="col-sm-10">
                             <textarea name="observation" id="observation" rows="3" class="form-control">{{ old('observation') }}</textarea>
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
  @livewireStyles
@stop

@section('js')
  @livewireScripts
@stop
