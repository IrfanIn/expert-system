@extends('dashboard-sidebar')

@section('content-dashboard')
    <h4>Data hasil analisa</h4>
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
                            <ul>
                                @foreach ($value->analisa_detail as $value)
                                    <li>{{ $value->penyakit->penyakit }} {{ $value->accuracy }}%</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
