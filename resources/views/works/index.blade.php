@extends('adminlte::page')

@section('title', 'Obras')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Obras</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Lista de Obras') }}
                @can('works.create')
                    <a href="{{ route('works.create') }}" class="btn btn-sm btn-primary float-right">Nueva Obra</a>
                @endcan
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

                    <div class="table-responsive-sm">
                        <table id="worksl" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Item</th>
                                <th>Obra</th>
                                <th>Horas</th>
                                <th>Horas Extras</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($works as $work)
                            <tr>
                                <td>{{ $work->id  }}</td>
                                <td>{{ date('d-m-Y', strtotime($work->created_at)) }}</td>
                                <td><a href="{{ route('works.show', $work)}}" class="link">{{ $work->refwork->item }}</a></td>
                                <td><a href="{{ route('works.show', $work)}}" class="link">{{ $work->refwork->work }}</a></td>

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
                                <td>
                                @can('works.edit')
                                    <a href="{{ route('works.edit', $work) }}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan
                                </td>
                                <td>
                                @can('works.destroy')
                                    <form action="{{ route('works.destroy', $work) }}" method="POST">
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
        </div>
    </div>
</div>

@endsection

@section('css')
  @livewireStyles
@stop

@section('js')
@livewireScripts
<script>
$(document).ready(function() {
    $('#worksl').DataTable();
} );
</script>


@stop
