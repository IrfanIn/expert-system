<div class="col-12">
    <div class="card ">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>penyakit</th>
                        <th>gejala</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pakar as $value)
                        <tr>
                            <td>{{ $value->penyakit }}</td>
                            <td>
                                @foreach ($value->gejala_detail as $item)
                                    <li>{{ $item->gejala->gejala }}</li>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-warning btn-sm"
                                        data-bs-target="#edit{{ $value->id }}" data-bs-toggle="modal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('pakar.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-bs-target="#show{{ $value->id }}" data-bs-toggle="modal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
