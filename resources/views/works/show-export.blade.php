<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="text-bold text-center">
            <img src="vendor/scada/img/logo.jpg" class="rounded" height="60">
        </div>
        <div class="text-bold text-center">
            <h5>Informe de Obra en Autopista del Aconcagua</h5>
            <h6>Gerencia de Insfraestructura y Servicios
                <br>Departamento de Mantención y Obras.
            </h6>
            <h6>Responsable de Departamento: Jorge Cardona
            <br>Resposable de Tramo Urbano: Isaac Fuenzalida</h6>
        </div>
        <hr>

        <div class="card-body">
            <h6>
                Identificador Único de Obra {{$work->id}}
                <br>Contrato {{ $work->contract->code . " - " . $work->contract->description }}
                <br>{{ $work->refwork->item . " - " . $work->refwork->work }}
                <br>Fecha de Obra {{date("d-m-Y", strtotime($work->created_at))}}
            </h6>
            <h6>Información General de la Obra</h6>
            <ul class="list-unstyled">
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">Ruta </font></label><font size=3 face="arial">{{$work->route}}</font></li>
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">Sentido </font></label><font size=3 face="arial">{{$work->direction}}</font></li>
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">KM </font></label><font size=3 face="arial">{{$work->start . ' - ' . $work->end }}</font></li>
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">Origen de la Obra </font></label><font size=3 face="arial">{{$work->origin}}</font></li>
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">Cantidad de Obra </font></label><font size=3 face="arial">{{$work->amount_of_work}}</font></li>
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">Horas Normal </font></label><font size=3 face="arial">{{$normal_hour}}</font></li>
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">Horas Extra </font></label><font size=3 face="arial">{{$extra_hour}}</font></li>
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">Frecuencia </font></label><font size=3 face="arial">{{$work->frequency}}</font></li>
                <li><label class="col-sm-4 col-form-label"><font size=3 face="arial">Observación </font></label><font size=3 face="arial">{{$work->observation}}</font></li>
            </ul>

            <h6>Recursos Utilizados</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><font size=2 face="arial">Tipo</font></th>
                        <th><font size=2 face="arial">Recurso</font></th>
                        <th><font size=2 face="arial">U. Med</font></th>
                        <th><font size=2 face="arial">Cantidad</font></th>
                        <th><font size=2 face="arial">Observación</font></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($work->resources as $resource)
                        <tr>
                        <td><font size=2 face="arial">{{$resource->type}}</font></td>
                        <td><font size=2 face="arial">
                        @foreach($refresources as $refresource)
                            @if($refresource->id == $resource->refresource_id)
                                {{$refresource->resource}}
                            @endif
                        @endforeach
                    </font>
                    </td>
                        <td><font size=2 face="arial">{{ $resource->unit }}</font></td>
                        <td><font size=2 face="arial">{{ $resource->quantity }}</font></td>
                        <td><font size=2 face="arial">{{ $resource->observation }}</font></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <br>
            <label class="col-sm-4 col-form-label"><font size=3 face="arial">Capataz de Obra</font></label><font size=3 face="arial">{{$work->user->name}} {{$work->user->lastname}}</font>
            <br>
        </div>
        <hr>
        <footer class="text-bold text-center">
            <p>Autovía del Santiago Lampa.</p>
            <div class="text-bold text-center">
                <img src="vendor/scada/img/globalvia-inline.jpg" class="rounded">
            </div>
        </footer>
    </div>
</body>
</html>
