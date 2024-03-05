@extends('components.dashboard')

@section('content')
    <h3 class="text-capitalize">data hasil analisa</h3>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>username</th>
                            <th>penyakit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ $value->username }}</td>
                                <td>
                                    <ul style="list-style: disc;">
                                        @foreach ($value->analisa_detail as $value)
                                            <li style="display: block">
                                                {{ $value->penyakit->penyakit ?? '' }} {{ $value->accuracy }}%
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
