@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Laporan Akhir</h4>
            <form action="" class="d-flex justify-content-evenly align-items-center">
                <input type="date" id="flatpickr-range" class="form-control w-75 flatpickr-range"
                    placeholder="Filter dengan tanggal">
                <input type="hidden" name="start_date" id="start_date">
                <input type="hidden" name="end_date" id="end_date">
                <button type="submit" class="btn btn-success ms-2">Filter</button>
            </form>
            <form action="{{ route('pdfAkhir') }}" target="blank">
                {{-- @if(request->start_date && request->end_date)
                <input type="hidden" name="end_date" id="end_date">
                <input type="hidden" name="start_date" id="start_date">
                @endif --}}
                <button type="submit" class="btn btn-primary">Download PDF</button>
            </form>

        </div>
        <div class="card-body">
            {{-- {{ dd($semuaData) }} --}}
            <table class="table overflow-x-scroll" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Spek/Ukuran</th>
                        <th>Satuan</th>
                        <th>Stok Awal</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                        <th>Stok Akhir</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody id="container" class="overflow-x-scroll">
                    @foreach ($semuaData as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->spek }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->stok_awal }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->stok_awal * $item->harga }}</td>
                        <td>{{ $item->jumlah_masuk }}</td>
                        <td>{{ $item->jumlah_keluar }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->jumlah_masuk * $item->harga }}</td>
                        <td>{{ $item->stok_akhir }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->harga * $item->stok_akhir }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>
<script>
    new DataTable('#table1', {
        scrollX: true
    });
    const range = document.getElementById('flatpickr-range')
    const startDate = document.getElementById('start_date')
    const endDate = document.getElementById('end_date')
    range.flatpickr({
        mode: "range",
        minDate: "2020-01-01",
        dateFormat: "l, J F Y",
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length === 2) {
                startDate.value = selectedDates[0].toISOString().split('T')[0];
                endDate.value = selectedDates[1].toISOString().split('T')[0];
            }
        }
    })
    console.log(startDate.value)
</script>

@endsection