@include('template.header')

<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                {{-- <div class="auth-logo">
                    <img src="{{ url('/images/logo.png') }}" width="200" alt="">
                </div> --}}
                <h1 class="auth-title">Register.</h1>
                <p class="auth-subtitle mb-5">
                    register baru untuk bertransaksi agar anda dapat memantau transaksi.
                </p>

                <form action="{{ url('/register') }}" method="POST">
                    @csrf
                    @method('post')
                    @if($errors->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('error') }}
                    </div>
                    @endif
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Nama Lengkap" name="nama"
                            required />
                        <div class="form-control-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Username" name="username"
                            required />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password"
                            name="password" required />
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="number" class="form-control form-control-xl" placeholder="No Telepon"
                            name="no_telp" required />
                        <div class="form-control-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">
                        Register
                    </button>
                    <p class="text-center mt-3">
                        Sudah mempunyai akun? <span><a href="{{ url('/') }}">Login Disini</a></span>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                <img src="{{ url('images/logo/logo-simmanbad.png') }}" alt="">
            </div>
        </div>
    </div>
</div>


@include('template.footer')