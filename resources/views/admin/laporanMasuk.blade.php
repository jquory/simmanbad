@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Laporan Barang Masuk</h4>
            <form action="{{ route('laporan-masuk') }}" class="d-flex justify-content-evenly align-items-center">
                <input type="date" id="flatpickr-range" class="form-control w-75 flatpickr-range"
                    placeholder="Filter dengan tanggal">
                <input type="hidden" name="start_date" id="start_date">
                <input type="hidden" name="end_date" id="end_date">
                <button type="submit" class="btn btn-success ms-2">Filter</button>
            </form>
            <form action="{{ route('pdfMasuk') }}" method="POST" target="blank">
                @csrf
                @method('post')
                <input type="hidden" name="dari" id="dari">
                <input type="hidden" name="ke" id="ke">
                <button type="submit" class="btn btn-primary">Download PDF</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->total_jumlah_masuk }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Data Tidak Ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    const range = document.getElementById('flatpickr-range')
    const startDate = document.getElementById('start_date')
    const endDate = document.getElementById('end_date')
    const dari = document.getElementById('dari')
    const ke = document.getElementById('ke')
    range.flatpickr({
        mode: "range",
        minDate: "2020-01-01",
        dateFormat: "l, J F Y",
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length === 2) {
                startDate.value = selectedDates[0].toISOString().split('T')[0];
                endDate.value = selectedDates[1].toISOString().split('T')[0];
                dari.value = selectedDates[0].toISOString().split('T')[0];
                ke.value = selectedDates[1].toISOString().split('T')[0];
            }
        }
    })
</script>

@endsection