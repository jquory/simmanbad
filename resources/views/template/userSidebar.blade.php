@include('template.header')

<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a class="d-flex align-items-center" href="{{ url('/user/dashboard') }}"><img src="{{ url('/images/logo/logo-simmanbad.png') }}" class="h-25" alt="Logo" width="60" srcset="" /> Simmanbad
                        </a>
                    </div>
                    <div class="sidebar-toggler x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="{{ (request()->is('user/dashboard')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('user/dashboard') }}" class="sidebar-link">
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Lainnya</li>

                    <li class="{{ (request()->is('user/jadwal*')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('user/jadwal') }}" class="sidebar-link">
                            <i class="bi bi-bag-fill"></i>
                            <span>Jadwal Saya</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('user/prestasi*')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('user/prestasi') }}" class="sidebar-link">
                            <i class="bi bi-bag-fill"></i>
                            <span>Prestasi Saya</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="sidebar-link">
                            <i class="bi bi-door-open-fill"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="main">
        <div class="page-content">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>@yield('title')</h3>
            </div>
            <section class="row">
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center fs-3">
                                Yakin ingin Log Out?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-success"
                                    data-bs-dismiss="modal">Batal</button>
                                <a href="/user/logout" class="btn btn-danger">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
            </section>
        </div>
    </div>
</div>




@include('template.footer')