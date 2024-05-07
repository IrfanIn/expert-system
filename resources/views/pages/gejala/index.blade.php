@extends('components.dashboard')

@section('content')
    @include('components.title', ['title' => 'Data gejala'])

    @include('pages.gejala.modal')
    @include('pages.gejala.table')
@endsection

@push('script')
    <script>
        const list = (elem, name) => {
            const list = `
                <div class="d-flex gap-2 align-items-center">
                    <input type="text" class="form-control mb-2" name="${name}" />
                    <i class="fas fa-trash text-danger cursor-pointer" onclick="$(this).parents('.d-flex').remove()"></i>
                </div>
                `

            $(elem).parents('.wrapper').find('.wrap').append(list)
        }
    </script>
@endpush
