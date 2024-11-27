@include('template.header')

<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a class="d-flex align-items-center" href="{{ url('/admin/dashboard') }}"><img src="{{ url('/images/logo/logo-simmanbad.png') }}" class="h-25" alt="Logo" width="60" srcset="" /> Simmanbad
                        </a>
                    </div>
                    <div class="sidebar-toggler x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="{{ (request()->is('admin/dashboard')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/dashboard') }}" class="sidebar-link">
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Atlet</li>

                    <li
                        class="{{ (request()->is('admin/daftar-atlet*')) ? 'sidebar-item active' : ((request()->is('admin/daftar-atlet/create')) ? 'sidebar-item active' : 'sidebar-item') }}">
                        <a href="{{ url('admin/daftar-atlet') }}" class="sidebar-link">
                            <i class="bi bi-box-fill"></i>
                            <span>Daftar Atlet</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('admin/prestasi*')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/prestasi') }}" class="sidebar-link">
                            <i class="bi bi-trophy-fill"></i>
                            <span>Prestasi</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Event</li>

                    <li class="{{ (request()->is('admin/event*')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/event') }}" class="sidebar-link">
                            <i class="bi bi-calendar-event-fill"></i>
                            <span>List Event</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('admin/jadwal*')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/jadwal') }}" class="sidebar-link">
                            <i class="bi bi-easel-fill"></i>
                            <span>Jadwal</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Session</li>
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
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>@yield('title')</h3>
        </div>
        <div class="page-content">
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
                                <a href="/admin/logout" class="btn btn-danger">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <a href="https://instagram.com" target="blank">2024 &copy; Kharisma budiwati</a>
                </div>
                {{-- <div class="float-end">
                    <p>
                        Developed with
                        <span class="text-danger"><i class="bi bi-heart"></i></span>
                        by <a href="https://qory.dev" target="blank">Qory</a>
                    </p>
                </div> --}}
            </div>
        </footer>
    </div>
</div>

@include('template.footer')