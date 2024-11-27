@include('template.header')

<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">
                    Log in atau register untuk berinteraksi.
                </p>

                <form action="{{ url('/') }}" method="POST">
                    @csrf
                    @method('post')
                    @if($errors->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('error') }}
                    </div>
                    @elseif(session('Berhasil'))
                    <div class="alert alert-success" role="alert">
                        Berhasil mendaftar akun, silahkan Login!
                    </div>
                    @endif
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
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                        Log in
                    </button>
                    <p class="text-center mt-3">
                        Belum mempunyai akun? <span><a href="{{ url('/register') }}">Register Disini</a></span>
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