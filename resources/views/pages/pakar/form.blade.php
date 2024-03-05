<div class="form-floating mb-3">
    <input type="text" class="form-control" name="penyakit" id="penyakit" placeholder=""
        value="{{ $data->penyakit ?? old('penyakit') }}" />
    <label for="penyakit">Penyakit</label>
</div>

<textarea class="form-control mb-3" name="keterangan" cols="30" rows="3" placeholder="Keterangan">
    {{ $data->keterangan ?? old('keterangan') }}
</textarea>

<div class="wrapper">
    <div class="d-flex align-items-center gap-3">
        <div class="form-floating mb-3 w-100">
            <input type="text" class="form-control" id="gejala" placeholder="" />
            <label for="gejala">Gejala</label>
        </div>
        <button type="button" class="btn btn-primary" onclick="addList($(this), 'gejala')">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <ul class="mx-4">
        @isset($data)
            @foreach ($data->gejala_detail as $item)
                <div class="d-flex align-items-center justify-content-between">
                    <li style="list-style: disc">{{ $item->gejala->gejala }}</li>
                    <i class="fas fa-x cursor-pointer text-red-500" onclick="$(this).parent().remove()"></i>
                    <input type="hidden" value="{{ $item->gejala->id }}" name="gejala[]" />
                </div>
            @endforeach
        @endisset
    </ul>
</div>

<div class="wrapper">
    <div class="d-flex align-items-center gap-3">
        <div class="form-floating mb-3 w-100">
            <input type="text" class="form-control" id="rule" placeholder="" />
            <label for="rule">Pertanyaan</label>
        </div>
        <button type="button" class="btn btn-primary" onclick="addList($(this), 'rule')">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <ul class="mx-4">
        @isset($data)
            @foreach ($data->rule as $item)
                <div class="d-flex align-items-center justify-content-between">
                    <li style="list-style: disc">{{ $item->rule }}</li>
                    <i class="fas fa-x cursor-pointer text-red-500" onclick="$(this).parent().remove()"></i>
                    <input type="hidden" value="{{ $item->id }}" name="rule[]" />
                </div>
            @endforeach
        @endisset
    </ul>
</div>

<div class="wrapper">
    <div class="d-flex align-items-center gap-3">
        <div class="form-floating mb-3 w-100">
            <input type="text" class="form-control" id="solusi" placeholder="" />
            <label for="solusi">Solusi</label>
        </div>
        <button type="button" class="btn btn-primary" onclick="addList($(this), 'solusi')">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <ul class="mx-4">
        @isset($data)
            @foreach ($data->solusi as $item)
                <div class="d-flex align-items-center justify-content-between">
                    <li style="list-style: disc">{{ $item->solusi }}</li>
                    <i class="fas fa-x cursor-pointer text-red-500" onclick="$(this).parent().remove()"></i>
                    <input type="hidden" value="{{ $item->solusi }}" name="solusi[]" />
                </div>
            @endforeach
        @endisset
    </ul>
</div>
