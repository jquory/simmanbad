@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">

        @if(session('added'))
            <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
                <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <div class="p-2 bg-success rounded-4 me-2"></div>
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-bg-success">
                    Data barang masuk berhasil ditambahkan.
                </div>
                </div>
            </div>
        @elseif(session('updated'))
            <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
                <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <div class="p-2 bg-success rounded-4 me-2"></div>
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-bg-success">
                    Data barang masuk berhasil Diperbarui.
                </div>
                </div>
            </div>
        @elseif(session('deleted'))
            <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
                <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <div class="p-2 bg-success rounded-4 me-2"></div>
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-bg-success">
                    Data barang masuk berhasil Dihapus.
                </div>
                </div>
            </div>
        @endif

        <div class="card-header d-flex justify-content-between">
            <h4>List Barang Masuk</h4>
            <a href="{{ url('/admin/barang-masuk/create') }}" class="btn btn-primary">Tambah Transaksi</a>
        </div>
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
                        <th>aksi</th>
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

    document.addEventListener('DOMContentLoaded', function() {
    var myToast = new bootstrap.Toast(document.getElementById('myToast'));
    myToast.show();

$('#table1').datatable();
</script>

@endsection