@extends('template.adminSidebar')

@section('content')

<div class="row" id="basic-table">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Kriteria</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <p class="card-text">Using the most basic table up, here’s how
                        <code>.table</code>-based tables look in Bootstrap. You can use any example
                        of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Simbol</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria as $k)
                                <tr>
                                    <td class="text-bold-500">{{ $loop->iteration }}</td>
                                    <td class="text-bold-500">{{ $k->nama_kriteria }}</td>
                                    <td class="text-bold-500">{{ $k->bobot }}</td>
                                    <td class="text-bold-500">{{ $k->simbol }}</td>
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
                <h4 class="card-title">Sub Kriteria Harga (C1)</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <p class="card-text">Using the most basic table up, here’s how
                        <code>.table</code>-based tables look in Bootstrap. You can use any example
                        of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Sub Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c1 as $c)
                                <tr>
                                    <td class="text-bold-500">{{ $c->sub_kriteria }}</td>
                                    <td class="text-bold-500">{{ $c->bobot }}</td>
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
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sub Kriteria Merk (C2)</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <p class="card-text">Using the most basic table up, here’s how
                        <code>.table</code>-based tables look in Bootstrap. You can use any example
                        of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Sub Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c2 as $c)
                                <tr>
                                    <td class="text-bold-500">{{ $c->sub_kriteria }}</td>
                                    <td class="text-bold-500">{{ $c->bobot }}</td>
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
                <h4 class="card-title">Sub Kriteria Model (C3)</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <p class="card-text">Using the most basic table up, here’s how
                        <code>.table</code>-based tables look in Bootstrap. You can use any example
                        of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Sub Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c3 as $c)
                                <tr>
                                    <td class="text-bold-500">{{ $c->sub_kriteria }}</td>
                                    <td class="text-bold-500">{{ $c->bobot }}</td>
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
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sub Kriteria Kapasitas (C4)</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <p class="card-text">Using the most basic table up, here’s how
                        <code>.table</code>-based tables look in Bootstrap. You can use any example
                        of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Sub Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c4 as $c)
                                <tr>
                                    <td class="text-bold-500">{{ $c->sub_kriteria }}</td>
                                    <td class="text-bold-500">{{ $c->bobot }}</td>
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
                <h4 class="card-title">Sub Kriteria Tahun (C5)</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <p class="card-text">Using the most basic table up, here’s how
                        <code>.table</code>-based tables look in Bootstrap. You can use any example
                        of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Sub Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c5 as $c)
                                <tr>
                                    <td class="text-bold-500">{{ $c->sub_kriteria }}</td>
                                    <td class="text-bold-500">{{ $c->bobot }}</td>
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
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sub Kriteria Negara (C6)</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <p class="card-text">Using the most basic table up, here’s how
                        <code>.table</code>-based tables look in Bootstrap. You can use any example
                        of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Sub Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c6 as $c)
                                <tr>
                                    <td class="text-bold-500">{{ $c->sub_kriteria }}</td>
                                    <td class="text-bold-500">{{ $c->bobot }}</td>
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