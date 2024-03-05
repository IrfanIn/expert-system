<h4>{{ $data->penyakit }}</h4>
<p>{{ $data->keterangan }}</p>
<h5>Gejala</h5>
<ul>
    @foreach ($data->gejala_detail as $item)
        <li style="list-style: disc;" class="mx-4">{{ $item->gejala->gejala }}</li>
    @endforeach
</ul>
<h5>Solusi</h5>
<ul>
    @foreach ($data->solusi as $item)
        <li style="list-style: disc;" class="mx-4">{{ $item->solusi }}</li>
    @endforeach
</ul>
