@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">Data Barang Masuk</div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah Masuk</th>
                        <th>Waktu Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allRecords as $record)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->nama_barang }}</td>
                            <td>{{ $record->kode_barang }}</td>
                            <td>{{ $record->satuan }}</td>
                            <td>{{ $record->jumlah_masuk }}</td>
                            <td>{{ $record->waktu_masuk }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-title="Edit">
                                    <i class="bi bi-pen-fill"></i>
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-title="Hapus">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);

$('#table1').datatable();
</script>

@endsection