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
                        <div class="d-flex gap-2 align-items-center">
                            <select name="gejala_id[]" class="form-select mb-2">
                                <option value="">- Pilih gejala</option>
                                @foreach ($gejala as $value)
                                    <option value="{{ $value->id }}">{{ "No-$loop->iteration $value->gejala" }}</option>/
                                @endforeach
                            </select>
                            <i class="fas fa-trash text-danger cursor-pointer" onclick="$(this).parent().remove()"></i>
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
        }
    </script>
@endpush
