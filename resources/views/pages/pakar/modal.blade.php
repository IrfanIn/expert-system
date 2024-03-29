<form action="{{ route('pakar.store') }}" method="post">
    @csrf
    <div class="modal fade" id="modal-0">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input data kesehatan</h4>
                </div>
                <div class="modal-body">
                    @include('pages.pakar.form')
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@foreach ($pakar as $data)
    <form action="{{ route('pakar.update', $data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="modal fade" id="edit{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit data kesehatan</h4>
                    </div>
                    <div class="modal-body">
                        @include('pages.pakar.form')
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="show{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Informasi data</h4>
                </div>
                <div class="modal-body">
                    @include('pages.pakar.show')
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
