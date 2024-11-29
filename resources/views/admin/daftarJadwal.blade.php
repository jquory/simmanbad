@extends('template.adminSidebar')

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
                    Data berhasil ditambahkan.
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
                    Data berhasil Diperbarui.
                </div>
            </div>
        </div>
        @elseif(session('masukDeleted'))
        <div class="toast-container position-fixed top-0 end-50 start-50 p-3">
            <div id="masukToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
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
            <h4>Daftar Jadwal</h4>
            <a href="{{ url('/admin/jadwal/create') }}" class="btn btn-primary">Tambah Jadwal</a>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Atlet</th>
                        <th>Jadwal</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allRecords as $record)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->nama }}</td>
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
                        <td>
                            <a type="button" href="{{ url('/admin/jadwal/' . $record->id . '/edit') }}"
                                class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-title="Edit">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $record->id }}"
                                data-bs-toggle="tooltip" data-bs-title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>

                    {{-- Delete Modal --}}

                    <div class="modal modal-borderless fade" id="deleteModal-{{ $record->id }}" tabindex="-1"
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
                                    <form action="{{ url('/admin/jadwal/' . $record->id) }}" method="post">
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
        var myToast = new bootstrap.Toast(document.getElementById('masukToast'));
        myToast.show();
    });
</script>
<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>


@endsection