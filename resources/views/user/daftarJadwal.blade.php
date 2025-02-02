@extends('template.userSidebar')

@section('content')
<section class="section">
    <div class="card">

        @if(session('ditambahkan'))
        <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
            <div id="masukToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <div class="p-2 bg-success rounded-4 me-2"></div>
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-bg-success">
                    Absen berhasil.
                </div>
            </div>
        </div>
        @elseif(session('masukUpdated'))
        <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
            <div id="masukToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
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
        @elseif(session('masukDeleted'))
        <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
            <div id="masukToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <div class="p-2 bg-warning rounded-4 me-2"></div>
                    <strong class="me-auto">Gagal</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-bg-warning">
                    Lokasi anda terlalu jauh
                </div>
            </div>
        </div>
        @endif

        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Jadwal</h4>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        {{-- <th>Nama Atlet</th> --}}
                        <th>Jadwal</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Absen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userRecords as $record)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $record->name }}</td>
                        {{-- <td>{{ $record->nama }}</td> --}}
                        <td>{{ $record->tanggal }}</td>
                        <td>
                            @if($record->status == 'Terjadwal')
                            <span class="badge bg-light-secondary">{{ $record->status }}</span>
                            @elseif($record->status == 'Hadir')
                            <span class="badge bg-light-success">{{ $record->status }}</span>
                            @else
                            <span class="badge bg-light-danger">{{ $record->status }}</span>
                            @endif
                        </td>
                        @if($record->status == 'Terjadwal')
                        <td>
                            <form id="form-{{ $record->id }}" action="{{ url('/user/jadwal/' . $record->id . '/hadir') }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="latitude" class="latitude-input" />
                                <input type="hidden" name="longitude" class="longitude-input" />
                                <button type="button" @if($record->tanggal != $today) disabled @endif 
                                        class="btn btn-success submit-btn" 
                                        data-form-id="{{ $record->id }}"
                                        data-bs-toggle="tooltip" 
                                        data-bs-title="Hadir">
                                    <i class="bi bi-check-circle-fill"></i>
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Get location first
        navigator.geolocation.getCurrentPosition(function(position) {
            // Set coordinates for all forms
            document.querySelectorAll('.latitude-input').forEach(input => {
                input.value = position.coords.latitude;
            });
            document.querySelectorAll('.longitude-input').forEach(input => {
                input.value = position.coords.longitude;
            });
        });

        // Handle button clicks
        document.querySelectorAll('.submit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const formId = this.getAttribute('data-form-id');
                const form = document.getElementById('form-' + formId);
                
                // Check if coordinates are set
                const lat = form.querySelector('.latitude-input').value;
                const lng = form.querySelector('.longitude-input').value;
                
                if (!lat || !lng) {
                    alert('Please wait for location data to be loaded');
                    return;
                }
                
                form.submit();
            });
        });
    });

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