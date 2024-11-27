@extends('template.adminSidebar')

@section('content')

<div class="row justify-content-center match-height">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/admin/daftar-atlet') }}" class="d-flex gap-2 mb-3">
                    <i class="bi bi-arrow-left-short"></i>Kembali
                </a>
                <h3 class="card-title">Input Produk Baru</h3>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" enctype="multipart/form-data" method="POST"
                        action="{{ url('/admin/daftar-produk/store') }}">
                        @method('post')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label>Nama Produk</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="nama_produk" class="form-control"
                                                placeholder="Nama Produk" id="namaProduk" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-command"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Merk</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="merk" class="form-control"
                                                placeholder="Merk Produk" id="merk" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-tags"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Model</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="model" class="form-control"
                                                placeholder="Model Produk" id="model" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-diagram-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Kapasitas</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="kapasitas" class="form-control"
                                                placeholder="Kapasitas Produk" id="kapasitas" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-123"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Negara</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="negara" class="form-control"
                                                placeholder="Negara Asal" id="negara" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-flag"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Tahun</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="tahun" class="form-control"
                                                placeholder="Tahun Produk" id="negara" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Stok Awal</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="number" name="stok_awal" class="form-control"
                                                placeholder="Stok Awal" id="stok_awal" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-inboxes"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Harga</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="number" name="harga" class="form-control"
                                                placeholder="Harga Produk" id="harga" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-currency-dollar"></i>
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
                                            <input type="file" name="gambar" class="form-control" placeholder="Gambar"
                                                id="gambar" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box"></i>
                                            </div>
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

<script src="{{ url('/extensions/toastify-js/src/toastify.js') }}"></script>
<script src="{{ url('/js/pages/toastify.js') }}"></script>

@endsection