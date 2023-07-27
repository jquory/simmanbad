@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Laporan Barang Masuk</h4>
            <a href="{{ route('pdfMasuk') }}">Download PDF</a>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Spek/Ukuran</th>
                        <th>Satuan</th>
                        <th>Stok Awal</th>
                        <th>Jumlah Masuk</th>
                        <th>Waktu Masuk</th>
                        <th>Stok Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($allRecords as $record)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $record->nama_barang }}</td>
                        <td>{{ $record->kode_barang }}</td>
                        <td>{{ $record->satuan }}</td>
                        <td>{{ $record->jumlah_masuk }}</td>
                        <td>{{ $record->waktu_masuk }}</td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>

@endsection