<div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="text-capitalize m-0">{{ $title }}</h3>
    {{-- @if (!in_array(auth()->user()->role->role, $readonly ?? [])) --}}
    <button type="button" class="btn btn-primary" data-bs-target="#modal-0" data-bs-toggle="modal">
        Tambah
    </button>
    {{-- @endif --}}
</div>
