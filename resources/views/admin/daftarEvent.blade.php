@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">

        @if(session('tertambah'))
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
        @elseif(session('terbarui'))
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
        @elseif(session('terhapus'))
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
            <h4>Daftar Event</h4>
            <a href="{{ url('admin/event/create') }}" class="btn btn-primary">Tambah Event</a>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Gambar</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allRecords as $record)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->tanggal }}</td>
                            <td class="w-25">
                                <img class="w-25 m-auto" src="{{ url($record->image) }}" alt="">
                            </td>
                            <td>
                                <a href="{{ url('/admin/event/'. $record->id .'/detil') }}" type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-title="Detil">
                                    <i class="bi bi-info-circle-fill"></i>
                                </a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $record->id }}" data-bs-toggle="tooltip" data-bs-title="Hapus">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>


                        {{-- Delete Modal --}}

                        <div class="modal modal-borderless fade" id="deleteModal-{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title text-danger fs-5" id="exampleModalLabel">Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Data yang dihapus tidak dapat dikembalikan. Yakin ingin menghapus data?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ url('/admin/event/' . $record->id) }}" method="post">
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
        var myToast = new bootstrap.Toast(document.getElementById('masukToast'));
        myToast.show();
    });

$('#table1').datatable();
</script>

@endsection