@extends('template.userSidebar')

@section('content')

<div class="row justify-content-center match-height">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/user/prestasi') }}" class="d-flex gap-2 mb-3">
                    <i class="bi bi-arrow-left-short"></i>Kembali
                </a>
                <h3 class="card-title">Input Prestasi Baru</h3>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ url('/user/prestasi/store') }}">
                        @method('post')
                        @csrf
                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-4 mb-2">
                                    <label>Nama Prestasi</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Nama Prestasi" id="name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-trophy"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Tingkat</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select name="tingkat" class="form-select"
                                                aria-label="Default select example"
                                                id="tingkat">
                                                <option selected value="Kabupaten/Kota">Kabupaten/Kota</option>
                                                <option value="Nasional">Nasional</option>
                                                <option value="Internasional">Internasional</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Tahun</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="number" name="tahun" class="form-control"
                                                placeholder="Tahun" id="tahun" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Pemberi</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="pemberi" class="form-control"
                                                placeholder="Pemberi Penghargaan" id="pemberi" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-check"></i>
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