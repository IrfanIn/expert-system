@extends('main')

@section('content')
    <div class="mx-auto d-flex flex-column justify-content-center" style="width: 60%; min-height: 100vh;">

        @if (Route::is('landing'))
            <div class="d-flex align-items-center flex-column text-center gap-2">
                <h4 class="text-uppercase font-weight-bold">Sistem pakar medis</h4>
                <p class="m-0 w-75">
                    sistem pakar medis adalah sebuah sistem yang memberikan anda solusi seputar medis, mengidentifikasi
                    jenis
                    penyakit anda dan memberikan solusi dari kondisi yang sedang anda alami
                </p>
                <form action="{{ route('landing.diagnosa') }}" method="post" class="w-75">
                    @csrf
                    @method('get')

                    <select class="" name="gejala[]" id="" title="-- Pilih Gejala" multiple required>
                        @foreach ($data as $value)
                            <option value="{{ $value->id }}">{{ $value->gejala }}</option>
                        @endforeach
                    </select>

                    <div class="d-flex gap-2 align-items-center mt-3">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-magnifying-glass mx-1"></i>
                            Mulai analisa
                        </button>
                        <a class="btn btn-secondary" href="{{ auth()->user() ? route('dashboard') : route('login') }}">
                            @auth
                                <i class="fas fa-chart-simple"></i>
                            @else
                                <i class="fas fa-right-to-bracket"></i>
                            @endauth
                        </a>
                    </div>
                </form>
            </div>
        @elseif (Route::is('landing.diagnosa'))
            <div>
                <h4>Pilih berdasarkan yang anda alami</h4>
                <p>Pemilihan yang sesuai dapat membantu sistem mengambil kepetusan lebih tepat</p>

                <form action="{{ route('landing.result') }}" method="post">
                    @csrf
                    @foreach ($diagnosa as $value)
                        @foreach ($value[0]->penyakit->rule as $data)
                            <div class="my-4" id="rule-wrapper">
                                <h3>{{ $data->rule }}</h3>

                                <div class="btn-group">
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="{{ $data->id }}" onclick="radioHandler($(this))" />
                                        Ya
                                    </label>
                                    <label class="btn btn-danger">
                                        <input type="radio" name="{{ $data->id }}"
                                            onclick="radioHandler($(this), true)" />
                                        Tidak
                                    </label>
                                </div>
                                <input type="hidden" name="id[]" value="{{ $data->id }}" disabled>
                            </div>
                            <input type="hidden" name="username" value="{{ $username }}">
                        @endforeach
                    @endforeach

                    <button type="submit" class="btn btn-primary my-2 w-100">
                        Cari tahu penyakit
                    </button>


                </form>


            </div>
        @else
            <div class="d-flex flex-column gap-3 my-4">
                <h4 class="bg-primary p-4 rounded text-white">
                    Hasil analisa, penyakitmu
                </h4>
                @foreach ($data as $key => $value)
                    <div class="card">
                        <div class="card-body d-flex flex-column gap-3 p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="m-0">{{ $value->penyakit->penyakit }}</h3>
                                <h5 class="m-0 {{ $key == 0 ? 'text-primary' : 'text-warning' }}">{{ $value->accuracy }}%
                                </h5>
                            </div>
                            <p class="m-0">{{ $value->penyakit->keterangan }}</p>

                            @if ($key == 0)
                                <h5 class="m-0">Gejala</h5>
                                <ul>
                                    @foreach ($value->penyakit->gejala_detail as $data)
                                        <li>{{ $data->gejala->gejala }}</li>
                                    @endforeach
                                </ul>
                                <h5 class="m-0">solusi pengobatan</h5>
                                <ul>
                                    @foreach ($value->penyakit->solusi as $solusi)
                                        <li>{{ $solusi->solusi }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
                <a class="btn btn-primary align-self-start" href="{{ route('landing') }}" role="button">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
        @endif




    </div>
@endsection

@push('sc')
    <script>
        const radioHandler = (element, toggle = false) =>
            element.parents('#rule-wrapper').find('>input').prop('disabled', toggle)
    </script>
@endpush
