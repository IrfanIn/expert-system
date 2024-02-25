@extends('dashboard-sidebar')

@section('content-dashboard')
    <div class="d-flex justify-content-between">
        <h4>Data pakar penyakit</h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalId">
            Tambah
        </button>
    </div>

    <div class="table-responsive p-4">
        <table class="table table-bordered">
            <thead>
                <tr class="text-capitalize">
                    <th>penyakit</th>
                    {{-- <th>keterangan</th> --}}
                    <th>gejala</th>
                    {{-- <th>analisa</th> --}}
                    {{-- <th>solusi</th> --}}
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                    <tr>
                        <td>{{ $value->penyakit }}</td>
                        <td>
                            @foreach ($value->gejala_detail as $data)
                                <li>{{ $data->gejala->gejala }}</li>
                            @endforeach
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <ion-icon name="create" class="fs-4"></ion-icon>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <ion-icon name="trash-outline" class="fs-4"></ion-icon>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm">
                                    <ion-icon name="information" class="fs-4"></ion-icon>
                                </button>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>

    <!-- Modal -->
    <form action="{{ route('store.penyakit') }}" method="post">
        @csrf
        <div class="modal fade" id="modalId" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Input data penyakit
                        </h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="penyakit" id="penyakit" placeholder="" />
                            <label for="penyakit">Penyakit</label>
                        </div>

                        <textarea class="form-control mb-3" name="keterangan" cols="30" rows="5"
                            placeholder="Keterangan mengenai penyakit"></textarea>

                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control inputFocus" name="gejala" id="gejala"
                                        placeholder="" />
                                    <label for="gejala">Gejala</label>
                                </div>
                            </div>
                            <button type="button" class="col-1 btn btn-primary"
                                onclick="addList($(this), 'gejala', '#gejala-list')">
                                <ion-icon name="add-outline"></ion-icon>
                            </button>
                        </div>
                        <ul id="gejala-list" class="mb-3"></ul>

                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control inputFocus" name="solusi" id="solusi"
                                        placeholder="" />
                                    <label for="solusi">Solusi</label>
                                </div>
                            </div>
                            <button type="button" class="col-1 btn btn-primary"
                                onclick="addList($(this), 'solusi', '#solusi-list')">
                                <ion-icon name="add-outline"></ion-icon>
                            </button>
                        </div>
                        <ul id="solusi-list" class="mb-3"></ul>

                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control inputFocus" id="rule" placeholder="" />
                                    <label for="rule">Pertanyaan mengenai penyakit</label>
                                </div>
                            </div>
                            <button type="button" class="col-1 btn btn-primary"
                                onclick="addList($(this), 'rule', '#rule-list')">+</button>
                        </div>
                        <ul id="rule-list" class="mb-3"></ul>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('sc')
    <script>
        const addList = (elem, name, wrapper) => {
            let text = elem.parent().find('input').val()
            const list =
                `<div class="w-100 d-flex align-items-center justify-content-between">
                    <li>${text}</li>
                    <ion-icon name="close" style="cursor: pointer;" onclick="$(this).parent().remove()"></ion-icon>
                    <input type="hidden" value="${text}" name="${name}[]">
                </div>`
            $(wrapper).append(list)
            elem.parent().find('input').val('')
        }
    </script>
@endpush
