@extends('adminlte::page')

@section('title', 'Editar Obras')

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

                    <form action="{{ route('works.update', ['work' => $work]) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="contract_id" class="col-sm-2 col-form-label">Contrato</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="service_id" id="service_id">
{{--                                 @if (!is_null($work->service_id))
                                    <option value="{{ $work->service_id }}" selected>{{ $work->service->name . ' - ' . $work->service->description }}</option>
                                @endif --}}
                                    <option value="">Seleccione una opción</option>
                                @foreach($services as $service)
                                  @if($service->id ==  old('service_id', $work->service_id))
                                    <option value="{{ $service->id }}" selected>{{ $service->name . ' - ' . $service->description }}</option>
                                  @else
                                    <option value="{{ $service->id }}">{{ $service->name . ' - ' . $service->description }}</option>
                                  @endif

                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="created_at" class="col-sm-2 col-form-label">Fecha de Obra</label>
                            <div class="col-sm-5">
                              <input type="date" class="form-control" name="date" id="date" value="{{ old('date', $work->created_at->format("Y-m-d")) }}">
                            </div>
                            <div class="col-sm-5">
                              <input type="time" class="form-control" name="time" id="time" value="{{ old('time', $work->created_at->format("H:i")) }}">
                            </div>
                        </div>

                        @livewire('work-edit-component')

                        <div class="form-group row">
                          <label for="amount_of_work" class="col-sm-2 col-form-label">Cantidad de Obra</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="amount_of_work" id="amount_of_work" value="{{ old('amount_of_work', $work->amount_of_work) }}">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="frequency" class="col-sm-2 col-form-label">Frecuencia</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="frequency" id="frequency">
                                <option value="{{ $work->frequency }}" selected>{{ $work->frequency }}</option>
                                @foreach($reffrequencies as $reffrequency)
                                  <option value="{{ $reffrequency->frequency }}">{{ $reffrequency->frequency }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="highway" class="col-sm-2 col-form-label">Tramo</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="highway" id="highway">
                                <option value="{{ $work->highway }}" selected>{{ $work->highway }}</option>
                                @foreach($refhighways as $refhighway)
                                  <option value="{{ $refhighway->highway }}">{{ $refhighway->highway }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="route" class="col-sm-2 col-form-label">Ruta</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="route" id="route">
                                <option value="{{ $work->route }}" selected>{{ $work->route }}</option>
                                @foreach($refroutes as $refroute)
                                  <option value="{{ $refroute->route }}">{{ $refroute->route }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direction" class="col-sm-2 col-form-label">Sentido de trafico</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="direction" id="direction">
                                <option value="{{ $work->direction }}" selected>{{ $work->direction }}</option>
                                @foreach($refdirections as $refdirection)
                                  <option value="{{ $refdirection->direction }}">{{ $refdirection->direction }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start" class="col-sm-2 col-form-label">Km Inicio</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="start" id="start" value="{{ old('start', $work->start) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end" class="col-sm-2 col-form-label">Km Fin</label>
                            <div class="col-sm-10">

                              <input type="text" class="form-control" name="end" id="end" value="{{ old('end', $work->end) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="origin" class="col-sm-2 col-form-label">Origen de Obra</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="origin" id="origin">
                                <option value="{{ $work->origin }}" selected>{{ $work->origin }}</option>
                                @foreach($reforigins as $reforigin)
                                  <option value="{{ $reforigin->origin }}">{{ $reforigin->origin }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observation" class="col-sm-2 col-form-label">Observación</label>
                            <div class="col-sm-10">
                             <textarea name="observation" id="observation" rows="3" class="form-control">{{ old('observation', $work->observation) }}</textarea>
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
  @livewireStyles
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop

@section('js')
  @livewireScripts
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@stop
