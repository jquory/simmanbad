@extends('template.userSidebar')
@section('content')
<div class="row justify-content-center match-height">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/user/dashboard') }}" class="d-flex gap-2 mb-3">
                    <i class="bi bi-arrow-left-short"></i>Kembali
                </a>
                <h3 class="card-title">Sewa {{ $produk->nama_produk }}</h3>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ url('/user/sewa/store') }}">
                        @method('post')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label>Tanggal Awal Sewa</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="tanggal_awal" class="form-control"
                                                placeholder="Tanggal awal" id="tanggalAwal" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Tanggal Akhir Sewa</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="tanggal_akhir" class="form-control"
                                                placeholder="Tanggal Akhir" id="tanggal_akhir" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
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
                                            <input type="text" name="model" class="form-control"
                                                placeholder="Harga Produk" id="model" value="Rp. {{ $produk->harga }}"
                                                readonly>
                                            <input type="hidden" name="harga" value="{{ $produk->harga }}"
                                                class="form-control">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
                                            <input type="hidden" name="id_produk" value="{{ $produk->id }}" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-diagram-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Alamat Pengiriman</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="alamat" required></textarea>
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