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
            <select name="gejala_id[]" class="form-select mb-2">
                <option value="">- Pilih gejala</option>
                @foreach ($gejala as $value)
                    <option value="{{ $value->id }}">{{ "No-$loop->iteration $value->gejala" }}</option>/
                @endforeach
            </select>
        </div>
    </div>
</div>
