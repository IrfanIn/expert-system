<div class="mb-3">
    <label for="penyakit" class="form-label">Penyakit</label>
    <input type="text" class="form-control" name="penyakit" id="penyakit"
        value="{{ $data->penyakit ?? old('penyakit') }}" />
</div>

<div class="wrapper">
    <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <label class="form-label">Gejala</label>
            <button type="button" class="btn btn-primary" onclick="list($(this))">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="wrap">
            <div class="d-flex gap-2 mb-2">
                <select name="gejala_id[]" class="selectpicker" data-title="- Pilih gejala" data-live-search="true"
                    data-width="100%">
                    @foreach ($gejala as $value)
                        <option value="{{ $value->id }}">{{ "No-$loop->iteration $value->gejala" }}</option>/
                    @endforeach
                </select>
                <input type="number" name="hipotesa[]" id="hipotesa" class="form-control" min="0"
                    max="1" step="0.1">
            </div>
        </div>
    </div>
</div>

{{-- <div class="mb-3">
    <label for="hipotesa" class="form-label">hipotesa</label>
    <input type="number" class="form-control" name="hipotesa" id="hipotesa"
        value="{{ $data->hipotesa ?? old('hipotesa') }}" />
</div> --}}
