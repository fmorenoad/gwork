@extends('adminlte::page')

@section('title', 'Ver Obra')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Obras</h1>
@stop

@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Obra N° ') . $work->id }}
                    <a href="{{ route('works.index') }}" class="btn btn-sm btn-secondary float-right">Volver</a>
                    <a href="{{ route('works.pdf', ['work' => $work]) }}" class="btn btn-sm btn-secondary float-right">Descargar PDF</a>
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

                    <div class="row">
                        <label for="contract" class="col-sm-2 col-form-label">Servicio del Contrato</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" name="service" id="service" value="{{ $work->service->contract->code ?? ''}} - {{$work->service->description ?? '' }}">
                        </div>
                      </div>

                      <div class="row">
                          <label for="work" class="col-sm-2 col-form-label">Obra</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="work" id="work" value="{{ $work->refwork->item . " - " . $work->refwork->work }}">
                          </div>
                        </div>

                        <div class="row">
                          <label for="origin" class="col-sm-2 col-form-label">Origen de Obra</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="origin" id="origin" value="{{ old('origin', $work->origin) }}">
                          </div>
                      </div>

                      <div class="row">
                          <label for="amount_of_work" class="col-sm-2 col-form-label">Cantidad de Obra</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="amount_of_work" id="amount_of_work" value="{{ old('amount_of_work', $work->amount_of_work) }}">
                          </div>
                      </div>

                      <div class="row">
                        <label for="observation" class="col-sm-2 col-form-label">Observación</label>
                        <div class="col-sm-10">
                         <textarea name="observation" id="observation" rows="3" readonly class="form-control-plaintext">{{ old('observation', $work->observation) }}</textarea>
                        </div>
                    </div>

                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Horas Normal</th>
                                    <th>Horas Extra</th>
                                    <th>Fecha Obra</th>
                                    <th>Frecuencia</th>
                                    <th>Tramo</th>
                                    <th>Ruta</th>
                                    <th>Sentido</th>
                                    <th>KM</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                            @php
                                $normal_hour = 0;
                                $extra_hour = 0;
                            @endphp

                            @foreach($work->resources as $resource)
                                @if ($resource->unit == 'hora normal')
                                    @php
                                        $normal_hour = $normal_hour + $resource->quantity;
                                    @endphp
                                @elseif($resource->unit == 'hora extra')
                                @php
                                    $extra_hour = $extra_hour + $resource->quantity;
                                @endphp
                                @endif
                            @endforeach
                                <td>{{ $normal_hour }}</td>
                                <td>{{ $extra_hour }}</td>
                                <td>{{ $work->created_at }}</td>
                                <td>{{ $work->frequency }}</td>
                                <td>{{ $work->highway }}</td>
                                <td>{{ $work->route }}</td>
                                <td>{{ $work->direction }}</td>
                                <td>{{ $work->start . ' - ' . $work->end }}</td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">

                <div class="card-header">{{ __('Detalle de Recursos Utilizados') }}
                    @can('resources.create')
                    <a href="{{ route('resources.create_resource_human', ['work' => $work]) }}" class="btn btn-primary float-right">Agregar Recurso Humano</a>
                    <a href="{{ route('resources.create', ['work' => $work]) }}" class="btn btn-primary float-right">Agregar Recurso</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="resources" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tipo</th>
                                    <th>Recurso</th>
                                    <th>Unidad de Medida</th>
                                    <th>Cantidad</th>
                                    <th>Observación</th>
                                    <th>Fecha Agregado</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($work->resources as $resource)
                                    <tr>
                                    <td>{{ $resource->id }}</td>
                                    <td>{{ $resource->type }}</td>
                                    <td>
                                    @foreach($refresources as $refresource)
                                        @if($refresource->id == $resource->refresource_id)
                                            {{ $refresource->resource }}
                                        @endif
                                    @endforeach
                                </td>
                                    <td>{{ $resource->unit }}</td>
                                    <td>{{ $resource->quantity }}</td>
                                    <td>{{ $resource->observation }}</td>
                                    <td>{{ $resource->created_at }}</td>
                                    <td>
                                    @can('resources.edit')
                                        <a href="{{ route('resources.edit', ['work' => $work, 'resource' => $resource]) }}" class="btn btn-primary btn-sm">Editar</a>
                                    @endcan
                                    </td>
                                    <td>
                                    @can('resources.destroy')
                                        <form action="{{ route('resources.destroy', ['work' => $work, 'resource' => $resource]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type='submit' value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea elimnar...?')">
                                        </form>
                                    @endcan
                                    </td>
                                    </tr>
                              @endforeach

                            </tbody>
                        </table>
                        </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Fotografías del ANTES') }}
                    <a href="{{ route('works.form_upload', ['work' => $work]) }}" class="btn btn-primary float-right">Agregar Fotografía</a>
                </div>
                <div class="card-body">
                @foreach ($work->attachments as $attachment)
                    @if ($attachment->type == "1")
                    <div class="card" style="width: 600px;">
                        <img src="/storage/{{ $attachment->route }}" class="card-img-top">
                    </div>
                    @endif
                @endforeach
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Fotografías DURANTE') }}
                </div>
                <div class="card-body">
                @foreach ($work->attachments as $attachment)
                    @if ($attachment->type == "2")
                    <div class="card" style="width: 18rem;">
                        <img src="/storage/{{ $attachment->route }}" class="card-img-top">
                    </div>
                    @endif
                @endforeach
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Fotografías DESPUES') }}
                </div>
                <div class="card-body">
                @foreach ($work->attachments as $attachment)
                    @if ($attachment->type == "3")
                    <div class="card" style="width: 18rem;">
                        <img src="/storage/{{ $attachment->route }}" class="card-img-top">
                    </div>
                    @endif
                @endforeach
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
        $('#resources').DataTable();
    } );
</script>

@stop
