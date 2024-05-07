@extends('components.dashboard')

@section('content')
    @include('components.title', ['title' => 'Data pakar penyakit'])

    @include('pages.pakar.modal')
    @include('pages.pakar.table')
@endsection

@push('script')
    <script>
        const list = (elem, name) => {
            console.log('clicked');
            let list = `
                        <div class="d-flex gap-2 mb-2">
                            <select name="gejala_id[]" class="selectpicker" data-title="- Pilih gejala" data-live-search="true"
                                data-width="100%">
                                @foreach ($gejala as $value)
                                    <option value="{{ $value->id }}">{{ "No-$loop->iteration $value->gejala" }}</option>/
                                @endforeach
                            </select>
                            <input type="number" name="hipotesa[]" id="hipotesa" class="form-control" min="0" max="1"
                                step="0.1">
                        </div>
                    `

            if (name)
                list = `
                <div class="d-flex gap-2 align-items-center">
                    <input type="text" class="form-control mb-2" name="solusi[]" />
                    <i class="fas fa-trash text-danger cursor-pointer" onclick="$(this).parents('.d-flex').remove()"></i>
                </div>
                `

            $(elem).parents('.wrapper').find('.wrap').append(list)
            $('select').selectpicker('refresh')
        }
    </script>
@endpush
