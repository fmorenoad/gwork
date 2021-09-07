<table>
    <thead>
    <tr>
        <th>Codigo Contrato</th>
        <th>Contrato</th>
        <th>Codigo Obra</th>
        <th>Operación</th>
        <th>Unidad de Medida Operación</th>
        <th>Cantidad de Operación</th>
        <th>Costo Total UF</th>
        <th>Costo Total CLP</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($query_reference_report as $reference)
    <tr>
        <td>{{ $reference->code }}</td>
        <td>{{ $reference->description }}</td>
        <td>{{ $reference->item }}</td>
        <td>{{ $reference->work }}</td>
        <td>{{ $reference->unit }}</td>
        @php
            $cantidad_work = 0;
            $costo_uf = 0;
            $costo_clp = 0;

            foreach ($query_report as $report)
            {
                if ($reference->code == $report->code && $reference->item == $report->item)
                {
                    $cantidad_work += floatval($report->amount_of_work);
                    $costo_uf += floatval($report->costo);
                }
            }
        @endphp
        <td>{{ $cantidad_work }}</td>
        <td>{{ $costo_uf }}</td>
        <td>{{ $costo_uf * $query_money_reference[0]->clp }}</td>
    @endforeach
    </tbody>
</table>
