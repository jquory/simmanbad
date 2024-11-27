@extends('template.adminSidebar')

@section('content')

<div class="row" id="basic-table">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rating kecocokan setiap Alternatif</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Alternatif</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatif as $a)
                                <tr>
                                    <td class="text-bold-500">{{ $a->name }}</td>
                                    <td class="text-bold-500">{{ $a->C1 }}</td>
                                    <td class="text-bold-500">{{ $a->C2 }}</td>
                                    <td class="text-bold-500">{{ $a->C3 }}</td>
                                    <td class="text-bold-500">{{ $a->C4 }}</td>
                                    <td class="text-bold-500">{{ $a->C5 }}</td>
                                    <td class="text-bold-500">{{ $a->C6 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Hasil Normalisasi</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Alternatif</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($normalisasi as $n)
                                <tr>
                                    <td class="text-bold-500">{{ $n['name'] }}</td>
                                    <td class="text-bold-500">{{ $n['C1'] }}</td>
                                    <td class="text-bold-500">{{ $n['C2'] }}</td>
                                    <td class="text-bold-500">{{ $n['C3'] }}</td>
                                    <td class="text-bold-500">{{ $n['C4'] }}</td>
                                    <td class="text-bold-500">{{ $n['C5'] }}</td>
                                    <td class="text-bold-500">{{ $n['C6'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Hasil Perangkingan</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>Alternatif</th> --}}
                                    <th>Nama</th>
                                    <th>Nilai akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $p)
                                <tr>
                                    <td class="text-bold-500">{{ $loop->iteration }}</td>
                                    {{-- <td class="text-bold-500">V{{ $loop->iteration }}</td> --}}
                                    <td class="text-bold-500">{{ $p['nama_produk']}}</td>
                                    <td class="text-bold-500">{{ $p['final_value']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection