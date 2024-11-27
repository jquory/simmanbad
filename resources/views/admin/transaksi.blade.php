@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">
        @if(session('tertambah'))
        <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
            <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <div class="p-2 bg-success rounded-4 me-2"></div>
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-bg-success">
                    Data berhasil ditambahkan.
                </div>
            </div>
        </div>
        @elseif(session('terubah'))
        <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
            <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <div class="p-2 bg-success rounded-4 me-2"></div>
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-bg-success">
                    Data berhasil Diperbarui.
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
                    Data berhasil Dihapus.
                </div>
            </div>
        </div>
        @endif

        <div class="card-header d-flex justify-content-between">
            <h4>Data Transaksi</h4>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Tanggal Kembali</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal Bayar</th>
                        <th>Tanggal Dikirim</th>
                        <th>Alamat</th>
                        <th>Status Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($allRecords) }} --}}

                    @foreach($transaksi as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->nama_produk }}</td>
                        <td>{{ $t->tanggal_awal_sewa }}</td>
                        <td>{{ $t->tanggal_akhir_sewa }}</td>
                        <td class="{{ $t->tanggal_pengembalian == '0' ? 'text-warning': 'text-success' }}">{{
                            $t->tanggal_pengembalian == '0' ? 'Belum': 'Selesai' }}</td>
                        <td class="{{ $t->status_pembayaran == 'P' ? 'text-warning' : 'text-success' }}">{{
                            $t->status_pembayaran == 'P' ? 'Pending' : 'Lunas' }}</td>
                        <td>{{ $t->tanggal_pembayaran == '0' ? '-' : $t->tanggal_pembayaran }}</td>
                        <td>{{ $t->tanggal_dikirim == '0' ? '-': $t->tanggal_dikirim }}</td>
                        <td>{{ $t->alamat_pengiriman }}</td>
                        <td class="{{ $t->status_pengiriman == 'P' ? " text-warning" : "text-success" }}">{{
                            $t->status_pengiriman == 'P' ? "Pending" : "Selesai" }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ url('/admin/transaksi/' . $t->id . '/edit') }}" type="button"
                                    class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="Edit">
                                    <i class="bi bi-pen-fill"></i>
                                </a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-bs-toggle="tooltip" data-bs-title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal Delete --}}

                    <div class="modal modal-borderless fade" id="deleteModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title text-danger fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Data yang dihapus tidak dapat dikembalikan. Yakin ingin menghapus data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ url('/admin/daftar-produk/' . $t->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

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
    });
</script>
<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>

@endsection