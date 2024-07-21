@extends('navbar.main')
@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Penuhi Kebutuhan Pertanian Anda Melalui Pasar Tani Kediri</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Belanja Hasil Tani Langsung dari Kebun, Segar Sampai ke
                            Rumah!</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            {{-- <a href="#about" class="btn-get-started">Get Started <i class="bi bi-arrow-right"></i></a> --}}
                            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                                class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i
                                    class="bi bi-play-circle"></i><span>Lihat Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="assets/img/landing.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->


        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Produk</h2>
                {{-- <p>Check our latest work</p> --}}
            </div><!-- End Section Title -->
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    {{-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">Hasil Pertanian</li>
                        <li data-filter=".filter-app">Benih dan Bibit</li>
                        <li data-filter=".filter-product">Pupuk dan Pestisida</li>
                        <li data-filter=".filter-branding">Alat dan Mesin Pertanian</li>
                        <li data-filter=".filter-books">Produk Olahan Pertanian</li>
                    </ul><!-- End Portfolio Filters -->
                    
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($produk as $p)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="menu-item">
                                <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" class="glightbox">
                                    <img src="{{ url('/Produk/' . $p->gambar1_produk) }}" class="menu-img img-fluid" style="width: 100%; height: 200px; object-fit: cover;" alt="{{ $p->nama_produk }}">
                                </a>
                                <a href="{{ route('detailproduk', ['id_produk' => $p->id_produk]) }}" title="Detail Produk" class="details-link" style="text-decoration: none; color: inherit;">
                                    <h4>{{ $p->nama_produk }}</h4>
                                </a>
                                <p class="ingredients">
                                    {{ $p->deskripsi_produk }}
                                </p>
                                <div class="portfolio-info">
                                    <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" title="Detail Foto Produk" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                </div>
                            </div><!-- Menu Item -->
                        </div>
                        @endforeach
                    </div><!-- End Portfolio Container --> --}}
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li>
                            <a href="{{ route('landing') }}"
                                class="{{ request('kategori_produk') ? '' : 'filter-active' }}">Keseluruhan Produk</a>
                        </li>
                        <li>
                            <a href="{{ route('landing', ['kategori_produk' => 'Hasil Pertanian']) }}"
                                class="{{ request('kategori_produk') === 'Hasil Pertanian' ? 'filter-active' : '' }}">Hasil
                                Pertanian</a>
                        </li>
                        <li>
                            <a href="{{ route('landing', ['kategori_produk' => 'Benih dan Bibit']) }}"
                                class="{{ request('kategori_produk') === 'Benih dan Bibit' ? 'filter-active' : '' }}">Benih
                                dan Bibit</a>
                        </li>
                        <li>
                            <a href="{{ route('landing', ['kategori_produk' => 'Pupuk dan Pestisida']) }}"
                                class="{{ request('kategori_produk') === 'Pupuk dan Pestisida' ? 'filter-active' : '' }}">Pupuk
                                dan Pestisida</a>
                        </li>
                        <li>
                            <a href="{{ route('landing', ['kategori_produk' => 'Alat dan Mesin Pertanian']) }}"
                                class="{{ request('kategori_produk') === 'Alat dan Mesin Pertanian' ? 'filter-active' : '' }}">Alat
                                dan Mesin Pertanian</a>
                        </li>
                        <li>
                            <a href="{{ route('landing', ['kategori_produk' => 'Produk dan Olahan Pertanian']) }}"
                                class="{{ request('kategori_produk') === 'Produk dan Olahan Pertanian' ? 'filter-active' : '' }}">Produk
                                Olahan Pertanian</a>
                        </li>
                    </ul>
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($produk as $p)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $p->kategori_produk }}">
                                <div class="menu-item">
                                    <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" class="glightbox">
                                        <img src="{{ url('/Produk/' . $p->gambar1_produk) }}" class="menu-img img-fluid"
                                            style="width: 100%; height: 200px; object-fit: cover;"
                                            alt="{{ $p->nama_produk }}">
                                    </a>
                                    <a href="{{ route('detailproduk', ['id_produk' => $p->id_produk]) }}"
                                        title="Detail Produk" class="details-link"
                                        style="text-decoration: none; color: inherit;">
                                        <h4>{{ $p->nama_produk }}</h4>
                                    </a>
                                    <p class="ingredients">
                                        Rp. {{ number_format($p->harga_produk, 0, ',', '.') }}
                                    </p>

                                    <div class="portfolio-info">
                                        <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" title="Detail Foto Produk"
                                            data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                    </div>
                                </div><!-- Menu Item -->
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <div class="portfolio-content h-100">
                                <img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Product 1 - pupuk dan pestisida</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="assets/img/portfolio/product-1.jpg" title="Product 1"
                                        data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item --> --}}

                    {{-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <div class="portfolio-content h-100">
                                <img src="assets/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Branding 1 - alat dan mesin pertanian</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1"
                                        data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item --> --}}

                    {{-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                            <div class="portfolio-content h-100">
                                <img src="assets/img/portfolio/books-1.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Books 1 - produk olahan pertanian</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="assets/img/portfolio/books-1.jpg" title="Branding 1"
                                        data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item --> --}}

                    {{-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <img src="assets/img/portfolio/app-2.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>App 2 - BENIH DAN BIBIT</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="assets/img/portfolio/app-2.jpg" title="App 2"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item --> --}}

                </div><!-- End Portfolio Container -->
            </div>
            </div>
        </section><!-- /Portfolio Section -->



        <!-- Recent Posts Section -->
        <section id="recent-posts" class="recent-posts section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kabar Tani</h2>
                {{-- <p>Recent posts form our Blog</p> --}}
            </div><!-- End Section Title -->
            <section id="recent-posts" class="recent-posts section">
                <div class="container">
                    <div class="row gy-5">
                        @if ($berita->isEmpty())
                            <div class="col-12">
                                <p class="text-center">ARTIKEL DALAM PROSES PENULISAN NIH, TUNGGU YA!</p>
                            </div>
                        @else
                            @foreach ($berita as $berita)
                                <div class="col-xl-4 col-md-6">
                                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                                        <div class="post-img position-relative overflow-hidden">
                                            {{-- <img src="{{ url('/Kabar Tani/' . $item->foto_berita) }}" alt="{{ $item->judul_berita }}" style="width: 370px; max-width: 100%; height: auto; object-fit: cover;"> --}}
                                            <img src="{{ url('/Kabar Tani/' . $berita->foto_berita) }}"
                                                alt="{{ $berita->judul_berita }}"
                                                style="width: 370px; height: 250px; object-fit: cover;">
                                        </div>
                                        <div class="post-content d-flex flex-column">
                                            <h3 class="post-title">{{ $berita->judul_berita }}</h3>
                                            <div class="meta d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2"></i> <span class="ps-2">Kabar Tani</span>
                                                </div>
                                            </div>
                                            <hr>
                                            {{-- <a href="{{ route('detailartikel.show', ['id' => $item->id_berita]) }}" class="readmore stretched-link"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a> --}}
                                            <a href="{{ route('detailartikel', ['id_berita' => $berita->id_berita]) }}"
                                                class="readmore stretched-link">
                                                <span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i>
                                            </a>
                                            {{-- <a href="{{ route('detailproduk', ['id_produk' => $item->id_produk]) }}" title="Detail Produk" class="details-link"><i
                                                class="bi bi-link-45deg"></i></a> --}}
                                            {{-- <a href="{{ route('detailartikel', ['id' => $item->id_berita]) }}" class="readmore stretched-link"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div><!-- End post item -->
            </section><!-- /Recent Posts Section -->

            <!-- Testimonials Section -->
            <section id="testimonials" class="testimonials section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Testimoni Pengguna</h2>
                    {{-- <p>What they are saying about us<br></p> --}}
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 40
                  },
                  "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 1
                  }
                }
              }
            </script>
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    {{-- <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div> --}}
                                    <p>
                                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                        rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                        risus at semper.
                                    </p>
                                    <div class="profile mt-auto">
                                        {{-- <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                            alt=""> --}}
                                            <img src="{{ asset('assets/img/default-comment.png') }}" class="testimonial-img" alt="">

                                        <h3>Saul Goodman</h3>
                                        <h4>Ceo &amp; Founder</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    {{-- <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div> --}}
                                    <p>
                                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                        cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                        legam anim culpa.
                                    </p>
                                    <div class="profile mt-auto">
                                        {{-- <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                            alt=""> --}}
                                            <img src="{{ asset('assets/img/default-comment.png') }}" class="testimonial-img" alt="">

                                        <h3>Sara Wilsson</h3>
                                        <h4>Designer</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    {{-- <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div> --}}
                                    <p>
                                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                        veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                        minim.
                                    </p>
                                    <div class="profile mt-auto">
                                        {{-- <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                            alt=""> --}}
                                            <img src="{{ asset('assets/img/default-comment.png') }}" class="testimonial-img" alt="">

                                        <h3>Jena Karlis</h3>
                                        <h4>Store Owner</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    {{-- <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div> --}}
                                    <p>
                                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                        fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                        dolore labore illum veniam.
                                    </p>
                                    <div class="profile mt-auto">
                                        {{-- <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                            alt=""> --}}
                                            <img src="{{ asset('assets/img/default-comment.png') }}" class="testimonial-img" alt="">

                                        <h3>Matt Brandon</h3>
                                        <h4>Freelancer</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    {{-- <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div> --}}
                                    <p>
                                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                        veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                        culpa fore nisi cillum quid.
                                    </p>
                                    <div class="profile mt-auto">
                                        {{-- <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                            alt=""> --}}
                                            <img src="{{ asset('assets/img/default-comment.png') }}" class="testimonial-img" alt="">

                                        <h3>John Larson</h3>
                                        <h4>Entrepreneur</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </section><!-- /Testimonials Section -->


            <!-- Contact Section -->
            <section id="contact" class="contact section">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Layanan</h2>
                    {{-- <p>Contact Us</p> --}}
                </div><!-- End Section Title -->
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            @if (session('message_sent'))
                                <div class="alert alert-success">
                                    {{ session('message_sent') }}
                                </div>
                            @endif

                            <form action="/landing/contact" method="post" class="php-email-form" data-aos="fade-up"
                                data-aos-delay="200">
                                @csrf
                                <div class="row gy-4">
                                    <h3>Testimoni Pengguna</h3>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Nama"
                                            required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            required="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                            required="">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Pesanmu Berhasil di kirim, Terimakasih!</div>
                                        <button type="submit">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- End Contact Form -->


                        <div class="col-lg-6">
                            @if (session('message_sent'))
                                <div class="alert alert-success">
                                    {{ session('message_sent') }}
                                </div>
                            @endif

                            <form action="/landing/contact" method="post" class="php-email-form" data-aos="fade-up"
                                data-aos-delay="200">
                                @csrf
                                <div class="row gy-4">
                                    <h3>Layanan Konsultasi Website</h3>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Nama"
                                            required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            required="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                            required="">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Pesanmu Berhasil di kirim, Terimakasih!</div>
                                        <button type="submit">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- End Contact Form -->
                    </div>
                </div>
            </section><!-- /Contact Section -->
    </main>
@endsection
