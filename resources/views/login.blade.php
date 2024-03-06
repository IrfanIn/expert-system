@extends('main')

@section('content')
    <form action="{{ Route::is('login') ? route('login.post') : route('daftar.post') }}"
        class="w-25 mx-auto d-flex justify-content-center flex-column" style="height: 100vh" method="post">
        @csrf
        <h3 class="text-uppercase mb-3 text-center">{{ Route::is('login') ? 'Login' : 'Daftar' }}</h3>

        @if (session()->has('error'))
            <div class="p-3 bg-danger mb-2 text-white rounded">
                {{ session('error') }}
            </div>
        @endif

        @if (Route::is('daftar'))
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="username" id="username" placeholder="" />
                <label for="username">Username</label>
            </div>
        @endif
        <div class="form-floating mb-2">
            <input type="email" class="form-control" name="email" id="email" placeholder="" />
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-2">
            <input type="password" class="form-control" name="password" id="password" placeholder="" />
            <label for="password">Password</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-2">
            <i class="fas fa-right-to-bracket"></i>
        </button>

        <div class="d-flex gap-2 align-items-center justify-content-between">
            <a href="{{ route('landing') }}">
                Kembali
            </a>
            <a href="{{ Route::is('login') ? route('daftar') : route('login') }}">
                {{ Route::is('login') ? 'Daftar' : 'Login' }}
            </a>
        </div>

    </form>
@endsection
