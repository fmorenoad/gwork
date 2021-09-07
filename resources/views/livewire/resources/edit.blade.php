<div class="form-group row">
  <label for="type" class="col-sm-2 col-form-label">Tipo</label>
  <div class="col-sm-10">
      <select class="form-control" name="type" id="type" wire:model="type">
          <option value="equipment">Equipos y Maquinas</option>
          <option value="material">Materiales</option>
      </select>
  </div>
</div>

<div class="form-group row">
    <label for="resource_id" class="col-sm-2 col-form-label">Recurso</label>
    <div class="col-sm-10">
        <select class="form-control" name="resource_id" id="resource_id" wire:model="resource_id">
            @foreach($refresources as $refresource)
              <option value="{{ $refresource->id }}">{{ $refresource->resource }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="unit" class="col-sm-2 col-form-label">Unidad de medida</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" name="unit" id="unit" wire:model="unit">
    </div>
</div>