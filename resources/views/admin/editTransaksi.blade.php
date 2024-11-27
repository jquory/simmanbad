@extends('template.adminSidebar')

@section('content')

<div class="row justify-content-center match-height">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/admin/transaksi') }}" class="d-flex gap-2 mb-3">
                    <i class="bi bi-arrow-left-short"></i>Kembali
                </a>
                <h3 class="card-title">Edit Data Transaksi</h3>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form enctype="multipart/form-data" class="form form-horizontal" method="POST"
                        action="{{ url('/admin/transaksi/' . $transaksi->id) }}">
                        @method('put')
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
                                                placeholder="Nama Produk" value="{{ $produk->nama_produk }}"
                                                id="namaProduk" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-command"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Nama Pembeli</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Nama Pembeli" value="{{ $user->name }}" id="merk" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-tags"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Tanggal Awal Sewa</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="tanggal_awal_sewa" class="form-control"
                                                placeholder="Tanggal Awal Sewa"
                                                value="{{ $transaksi->tanggal_awal_sewa }}" id="tanggal_awal_sewa"
                                                required>
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
                                            <input type="date" name="tanggal_akhir_sewa" class="form-control"
                                                placeholder="Tanggal akhir Sewa"
                                                value="{{ $transaksi->tanggal_akhir_sewa }}" id="tanggal_akhir_sewa"
                                                required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Tanggal Pengembalian</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="tanggal_pengembalian" class="form-control"
                                                placeholder="Tanggal pengembalian Sewa"
                                                value="{{ $transaksi->tanggal_pengembalian }}"
                                                id="tanggal_pengembalian_sewa">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Status Pembayaran</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="status_pembayaran">
                                                    <option value="P" {{ $transaksi->status_pembayaran == 'P' ?
                                                        'selected'
                                                        : '' }}>Belum Dibayar</option>
                                                    <option value="S" {{ $transaksi->status_pembayaran != 'P' ?
                                                        'selected' : ''
                                                        }}>Sudah Dibayar</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Tanggal Pembayaran</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="tanggal_pembayaran" class="form-control"
                                                placeholder="tanggal_pembayaran Produk"
                                                value="{{ $transaksi->tanggal_pembayaran }}" id="tanggal_pembayaran"
                                                required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-123"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Tanggal Dikirim</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="tanggal_dikirim" class="form-control"
                                                placeholder="tanggal_dikirim" value="{{ $transaksi->tanggal_dikirim }}"
                                                id="tanggal_dikirim" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-flag"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Alamat Pengiriman</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="alamat_pengiriman" class="form-control"
                                                placeholder="alamat_pengiriman"
                                                value="{{ $transaksi->alamat_pengiriman }}" id="alamat_pengiriman"
                                                required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Status Pengiriman</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="status_pengiriman">
                                                    <option value="P" {{ $transaksi->status_pengiriman == 'P' ?
                                                        'selected'
                                                        : '' }}>Belum Dikirim</option>
                                                    <option value="S" {{ $transaksi->status_pengiriman != 'P' ?
                                                        'selected' : ''
                                                        }}>Sudah Dikirim</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button class="btn btn-success me-3 mb-1">
                                        <a class="text-white"
                                            href="https://wa.me/{{ str_replace('+', '', $user->no_telp) }}">
                                            Hubungi
                                        </a>
                                    </button>
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