@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Laporan Jadwal</h4>
            <form action="{{ route('laporan-jadwal') }}" class="d-flex justify-content-evenly align-items-center">
                <input type="date" id="flatpickr-range" class="form-control w-75 flatpickr-range"
                    placeholder="Filter dengan tanggal">
                <input type="hidden" name="start_date" id="start_date">
                <input type="hidden" name="end_date" id="end_date">
                <button type="submit" class="btn btn-success ms-2">Filter</button>
            </form>
            <form action="{{ route('pdfJadwal') }}" method="POST" target="blank">
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
                        <th>Nama</th>
                        <th>Jenis Latihan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="container">
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->status }}</td>
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>
<script>
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