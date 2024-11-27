@extends('template.userSidebar')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>List Transaksi Saya</h4>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Awal Sewa</th>
                        <th>Tanggal Akhir Sewa</th>
                        <th>Status Pembayaran</th>
                        <th>Alamat Pengiriman</th>
                        <th>Status Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $t)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->nama_produk }}</td>
                        <td>{{ $t->tanggal_awal_sewa }}</td>
                        <td>{{ $t->tanggal_akhir_sewa }}</td>
                        <td class="{{ $t->status_pembayaran == 'P' ? 'text-warning' : 'text-success' }}">{{
                            $t->status_pembayaran == 'P' ? "Pending" : "Success" }}</td>
                        <td>{{ $t->alamat_pengiriman }}</td>
                        <td class="{{ $t->status_pengiriman == 'P' ? 'text-warning' : 'text-success' }}">{{
                            $t->status_pengiriman == 'P' ? "Pending" : "Success" }}</td>
                    </tr>

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
        var myToast = new bootstrap.Toast(document.getElementById('masukToast'));
        myToast.show();
    });
</script>
<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>


@endsection