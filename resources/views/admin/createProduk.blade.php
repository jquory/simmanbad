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
                        action="{{ url('/admin/daftar-atlet/store') }}">
                        @method('post')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label>Nama</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Nama Pengguna" id="name" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-command"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="username" class="form-control"
                                                placeholder="Username" id="username" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-tags"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Password</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" name="password" class="form-control"
                                                id="password" placeholder="*********" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-diagram-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>No Telp</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="no_telp" class="form-control"
                                                placeholder="No Telepon" id="no_telp" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-123"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Tanggal Lahir</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="ttl" class="form-control"
                                                placeholder="ttl" id="ttl" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-flag"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select name="gender" class="form-select"
                                                aria-label="Default select example"
                                                id="gender">
                                                <option selected value="Perempuan">Perempuan</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                            </select>
                                            {{-- <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Unit</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="unit" class="form-control"
                                                placeholder="Unit" id="unit" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-inboxes"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>TMT</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="tmt" class="form-control"
                                                placeholder="TMT" id="tmt" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-currency-dollar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Penempatan</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="penempatan" class="form-control" placeholder="Penempatan"
                                                id="penempatan" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Peran</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select name="role" class="form-select"
                                                aria-label="Default select example"
                                                id="role">
                                                <option selected value="user">Atlet</option>
                                                <option value="admin">Pelatih</option>
                                            </select>
                                            {{-- <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Profil</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="file" name="image" class="form-control" placeholder="penempatan"
                                                id="image" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
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