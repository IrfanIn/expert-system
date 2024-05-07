<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <title>Aplikasi sistem pakar</title>
</head>

<body style="background-color: #2c2c2c; color: white">

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
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" />
            </div>
        @endif
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" name="password" id="password" />
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-2">
            {{ Route::is('login') ? 'Login' : 'Daftar' }}
        </button>

        <div class="d-flex gap-2 align-items-center justify-content-between">
            <a href="{{ Route::is('login') ? route('daftar') : route('login') }}">
                {{ Route::is('login') ? 'Daftar' : 'Login' }}
            </a>
        </div>

    </form>

</body>

</html>
