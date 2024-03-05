@extends('components.dashboard')

@section('content')
    @include('components.title', ['title' => 'Data pakar penyakit'])

    @include('pages.pakar.modal')
    @include('pages.pakar.table')
@endsection

@push('script')
    <script>
        const addList = (elem, name) => {
            let text = elem.parent().find('input').val()
            if (!text) return;
            const list = `
                <div class="d-flex align-items-center justify-content-between">
                    <li style="list-style: disc">${text}</li>
                    <i class="fas fa-x cursor-pointer text-red-500" onclick="$(this).parent().remove()"></i>
                    <input type="hidden" value="${text}" name="${name}[]" />
                </div>
                `
            elem.parents('.wrapper').find('ul').append(list)
            elem.parent().find('input').val('')
        }
    </script>
@endpush
