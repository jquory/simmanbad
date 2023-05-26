@include('template.header')

<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div
                    class="d-flex justify-content-between align-items-center"
                >
                    <div class="logo">
                        <a href="admin/dashboard"
                            ><img
                                src="{{ url('/images/logo.png') }}"
                                style="height: 30px"
                                alt="Logo"
                                width="150"
                                height="150"
                                srcset=""
                            />
                        </a>
                    </div>
                    <div class="sidebar-toggler x">
                        <a
                            href="#"
                            class="sidebar-hide d-xl-none d-block"
                            ><i class="bi bi-x bi-middle"></i
                        ></a>
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

                    <li class="sidebar-title">Data Barang</li>
                    
                    <li class="{{ (request()->is('admin/daftar-barang')) ? 'sidebar-item active' : ((request()->is('admin/daftar-barang/create')) ? 'sidebar-item active' : 'sidebar-item') }}">
                        <a href="{{ url('admin/daftar-barang') }}" class="sidebar-link">
                            <i class="bi bi-box-fill"></i>
                            <span>Daftar Barang</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('admin/barang-masuk')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/barang-masuk') }}" class="sidebar-link">
                            <i class="bi bi-bag-fill"></i>
                            <span>Barang Masuk</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('admin/barang-keluar')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/barang-keluar') }}" class="sidebar-link">
                            <i class="bi bi-diagram-3-fill"></i>
                            <span>Barang Keluar</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('admin/history')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/history') }}" class="sidebar-link">
                            <i class="bi bi-calendar2-date-fill"></i>
                            <span>History</span>
                        </a>
                    </li>
    
                    <li class="sidebar-title">Akun</li>

                    <li class="{{ (request()->is('admin/akun')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/akun') }}" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Daftar Pengguna</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Laporan</li>

                    <li class="{{ (request()->is('admin/akun')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/akun') }}" class="sidebar-link">
                            <i class="bi bi-patch-plus-fill"></i>
                            <span>Laporan Barang Masuk</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/akun')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/akun') }}" class="sidebar-link">
                            <i class="bi bi-patch-minus-fill"></i>
                            <span>Laporan Barang Keluar</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/akun')) ? 'sidebar-item active' : 'sidebar-item' }}">
                        <a href="{{ url('admin/akun') }}" class="sidebar-link">
                            <i class="bi bi-calendar2-range-fill"></i>
                            <span>Laporan Akhir</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Session</li>
                    <li class="sidebar-item">
                        <a
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"
                            class="sidebar-link"
                        >
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
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-body text-center fs-3">
                          Yakin ingin Log Out?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Batal</button>
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
                    <a href="https://linkedin.com/in/qori" target="blank">2023 &copy; Kemas Muhammad Qori Ichsan</a>
                </div>
                <div class="float-end">
                    <p>
                        Developed with
                        <span class="text-danger"
                            ><i class="bi bi-heart"></i
                        ></span>
                        by <a href="https://qory.dev" target="blank">Qory</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
</div>

@include('template.footer')