@extends('components.dashboard')

@section('content')
    <h3 class="text-capitalize">data hasil analisa</h3>

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
                                            <span style="font-weight: bold">{{ $value->accuracy }}%</span>
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
@endsection
