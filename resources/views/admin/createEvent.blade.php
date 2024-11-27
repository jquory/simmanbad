@extends('template.adminSidebar')

@section('content')

<div class="row justify-content-center match-height">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/admin/event') }}" class="d-flex gap-2 mb-3">
                    <i class="bi bi-arrow-left-short"></i>Kembali
                </a>
                <h3 class="card-title">Input Event Baru</h3>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ url('/admin/event/store') }}" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label>Nama Event</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Nama Event" id="name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Tanggal</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="tanggal" class="form-control"
                                                placeholder="Kode Barang" id="tanggal">
                                            <div class="form-control-icon">
                                                <i class="bi bi-unity"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Gambar</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="file" name="image" class="form-control" placeholder="image"
                                                id="image">
                                            <div class="form-control-icon">
                                                <i class="bi bi-box"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Detil</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <textarea name="detil" class="form-control" id="detil" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button type="submit" id="btnSubmit"
                                        class="btn btn-primary me-3 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function autoFill() {
        const id = document.getElementById('selectProduct').value
        if(id) {
            const url = '/admin/barang-keluar/getDetail/' + id
            fetch(url)
            .then(res => res.json())
            .then(data => {
                const kodeBarang = document.getElementById('kodeBarang').value = data.kode_barang
                const satuan = document.getElementById('satuan').value = data.satuan
            })
        }

    }
</script>

<script src="{{ url('/extensions/toastify-js/src/toastify.js') }}"></script>
<script src="{{ url('/js/pages/toastify.js') }}"></script>

@endsection