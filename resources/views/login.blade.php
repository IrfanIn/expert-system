@extends('main')

@section('content')
    <form action="{{ Route::is('login') ? route('login.post') : route('daftar.post') }}"
        class="w-25 mx-auto d-flex justify-content-center flex-column" style="height: 100vh" method="post">
        @csrf
        <h3 class="text-uppercase mb-3">{{ Route::is('login') ? 'Login' : 'Daftar' }}</h3>

        @if (session()->has('error'))
            <div class="p-3 bg-danger mb-3 text-white rounded">
                {{ session('error') }}
            </div>
        @endif

        @if (Route::is('daftar'))
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="" />
                <label for="username">Username</label>
            </div>
        @endif
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="" />
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="" />
            <label for="password">password</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <ion-icon name="log-in"></ion-icon>
        </button>


        <a href="{{ Route::is('login') ? route('daftar') : route('login') }}">
            {{ Route::is('login') ? 'Daftar' : 'Login' }}
        </a>

    </form>
@endsection
