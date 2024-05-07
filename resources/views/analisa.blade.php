@extends('components.dashboard')

@section('content')
    <div class="d-flex justify-content-between mb-2">
        <h3 class="text-capitalize">data hasil analisa</h3>
        <button type="button" class="btn btn-primary" data-target="#modal" data-toggle="modal">
            Analisa baru
        </button>
    </div>

    @include('components.alert')

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>tanggal</th>
                            <th>nama</th>
                            <th>penyakit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ date('d F Y', strtotime($value->created_at)) }}</td>
                                <td>{{ $value->username }}</td>
                                <td>
                                    @foreach ($value->analisa_detail as $value)
                                        <li style="display: block">
                                            {{ $value->penyakit->penyakit ?? '' }}
                                            <span style="font-weight: bold">{{ $value->accuracy * 100 }}%</span>
                                        </li>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="{{ route('analisa.store') }}" method="post">
        @csrf
        <div class="modal fade" id="modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Analisa penyakit jantung</h4>
                    </div>
                    <div class="modal-body">
                        @foreach ($gejala as $item)
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 wrap">
                                        <h4 class="form-label mb-3">{{ $item->gejala }}?</h4>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                                value="1" id="1{{ $item->id }}" />
                                            <label class="form-check-label" for="1{{ $item->id }}">Sangat yakin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                                value="0.8" id="2{{ $item->id }}" />
                                            <label class="form-check-label" for="2{{ $item->id }}">Yakin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                                value="0.6" id="3{{ $item->id }}" />
                                            <label class="form-check-label" for="3{{ $item->id }}">Cukup</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                                value="0.2" id="4{{ $item->id }}" />
                                            <label class="form-check-label" for="4{{ $item->id }}">Tidak tahu</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                                value="0" id="5{{ $item->id }}" />
                                            <label class="form-check-label" for="5{{ $item->id }}">Tidak</label>
                                        </div>
                                        <input type="hidden" name="id[]" value="{{ $item->id }}" disabled>
                                        <input type="hidden" name="hipotesa[]" disabled>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
    </form>

    </div>
@endsection

@push('script')
    <script>
        $('input').on('click', event => {
            const parent = $(event.target).parents('.wrap');
            parent.find("input[type='hidden'").attr('disabled', false)
            parent.find("input[name='hipotesa[]']").val($(event.target).val())
        })
    </script>
@endpush
