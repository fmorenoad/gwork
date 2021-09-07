<div class="form-group row">
    <label for="refwork_id" class="col-sm-2 col-form-label">Obra</label>
    <div class="col-sm-10">
      <select class="form-control" name="refwork_id" id="refwork_id" wire:model="refwork_id">
        @isset($work)
        <option value="{{ $work->refwork_id }}" selected>{{ $work->refwork->item . " - " . $work->refwork->work }}</option>            
        @endisset
        @foreach($refworks as $refwork)
          <option value="{{ $refwork->id }}">{{ $refwork->item . " - " . $refwork->work }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="unit" class="col-sm-2 col-form-label">Unidad de Medidad de Obra</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" name="unit" id="unit" wire:model="unit">
    </div>
</div>