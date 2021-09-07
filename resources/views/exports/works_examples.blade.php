<table>
    <thead>
    <tr>
        <th>Contrat</th>
        <th>Id Obra</th>
        <th>Fecha</th>

        <th>Tipo de Trabajo</th>

        <td>N° Minuta</td>
        <td>N° Ficha Accidente</td>
        <td>Tipo de Cuadrilla</td>
        <th>Lider Cuadrilla</th>

        <th>Item</th>
        <th>Operación</th>
        <th>Unidad de Medida Operación</th>

        <th>Cantidad de Operación</th>

        <th>Recurso</th>
        <th>Unidad del Recurso</th>
        <th>Cantidad</th>
        <th>Moneda</th>
        <th>Costo Unitario</th>
        <th>Costo Total</th>
    </tr>
    </thead>
    <tbody>

    @foreach($query_report as $report)

    <tr>
        <td>{{ $report->code . ' - ' .  $report->description}}</td>
        <td>{{ $report->id }}</td>
        <td>{{ $report->created_at }}</td>
        <td>{{ $report->origin}}</td>
        <td>{{ $report->num_minuta}}</td>
        <td>{{ $report->ficha_accidente}}</td>
        <td>Cuadrilla Mantención</td>
        <td>{{ $report->name . " " . $report->lastname}}</td>

        <td>{{ $report->item }}</td>
        <td>{{ $report->work }}</td>
        <td>{{ $report->unit_work }}</td>

        <td>{{ $report->amount_of_work}}</td>

        <td>{{ $report->resource }}</td>
        <td>{{ $report->unit }}</td>
        <td>{{ $report->quantity }}</td>
        <td>{{ $report->unit_of_money }}</td>
        <td>{{ $report->costo }}</td>
        <td>{{ $report->costo * $report->quantity }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
