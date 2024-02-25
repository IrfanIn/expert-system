@extends('main')

@section('content')
    <div class="p-4">
        <div class="row">
            <div class="col-2">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Penyakit</a></li>
                    <li><a href="{{ route('analisa') }}">Analisa</a></li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <li class="text-primary" style="cursor: pointer" onclick="$(this).parent().submit()">
                            Logout
                        </li>
                    </form>
                </ul>
            </div>
            <div class="col">@yield('content-dashboard')</div>
        </div>
    </div>
@endsection
