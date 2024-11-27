@include('template.header')
<div class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">PELINDO</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ url('login') }}">Login</a>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="zoom-out">
                        <h1>Pilihan Pertama Pelanggan</h1>
                        <p>
                            Menjadi top of mind pelayanan operator terminal multipurpose yang menyediakan
                            exceptional service sesuai dengan kebutuhan dan memberikan
                            nilai tambah bagi pelanggan.
                        </p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Cari Produk</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ url('images/hero.png') }}" class="img-fluid animated" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section light-background">
            <div class="container" data-aos="zoom-in">
                <div class="row justify-content-center align-items-center">
                    <div class="col-3">
                        <img src="{{ url('images/cat.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="col-3">
                        <img src="{{ url('images/komatsu.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="col-3">
                        <img src="{{ url('images/sany.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="col-3">
                        <img src="{{ url('images/volvo.png') }}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- /Clients Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About Us</h2>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row justify-content-center gy-4">
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <p>
                            PT Pelabuhan Tanjung Priok (PTP Nonpetikemas) merupakan operator terminal multipurpose
                            pertama di Indonesia dan berpengalaman dalam menangani kegiatan bongkar muat kargo
                            multipurpose seperti kargo curah cair, curah kering, general cargo dan lain-lain.
                        </p>
                        <div class="text-center">
                            <a href="#" class="read-more text-center"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Produk</h2>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    @foreach($produk as $p)
                    <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img class="w-25" src="{{ url($p['gambar']) }}" alt="">
                            </div>
                            <h4>
                                <a>{{ $p['nama_produk'] }}</a>
                            </h4>
                            <p>
                                Sewa {{ $p['nama_produk'] }} untuk kebutuhan bisnis anda sekarang!
                            </p>
                            <a class="btn btn-primary" href="{{ url('login') }}">Sewa</a>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Service Item -->
                </div>
            </div>
        </section>
        <!-- /Services Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum
                    quidem sint consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p>
                                        A108 Adam Street, New York, NY
                                        535022
                                    </p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p>info@example.com</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                                frameborder="0" style="
                                        border: 0;
                                        width: 100%;
                                        height: 270px;
                                    " allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Your Name</label>
                                    <input type="text" name="name" id="name-field" class="form-control" required="" />
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required="" />
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field"
                                        required="" />
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Message</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field"
                                        required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">
                                        Your message has been sent. Thank
                                        you!
                                    </div>

                                    <button type="submit">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form -->
                </div>
            </div>
        </section>
        <!-- /Contact Section -->
    </main>
</div>
@include('template.footer')