@extends('adminlte::page')

@section('title', 'Agregar Fotografía a Obra')

@section('css')
@stop

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
                    <a href="{{ route('works.show', ['work' => $work]) }}" class="btn btn-sm btn-secondary float-right">Volver</a>
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

                    <div class="row">{{ __('Cargar Fotografía') }}</div>
                    <br>
                    <div class="form-group">
                        <form action="{{ route('works.upload', ['work' => $work]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="type">La fotografía a que etapa de la obra corresponde? </label>
                                <select class="form-control" name="type" id="type">
                                    <option value="1">Antes de iniciar el trabajo</option>
                                    <option value="2">Durante el trabajo</option>
                                    <option value="3">Al terminar el trabajo</option>
                                </select>
                            </div>
                            <br>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" required>
                                <label class="custom-file-label" for="image">Seleccione la fotografía</label>
                            </div>


                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Guardar Fotografía</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@stop
