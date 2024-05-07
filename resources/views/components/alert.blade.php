@if (session()->has('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-primary">
        {{ session('error') }}
    </div>
@endif
