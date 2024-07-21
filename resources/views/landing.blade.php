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
                        <img src="assets/img/LogoPasarTani.png" class="img-fluid animated" alt="">
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
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">Hasil Pertanian</li>
                        <li data-filter=".filter-app">Benih dan Bibit</li>
                        <li data-filter=".filter-product">Pupuk dan Pestisida</li>
                        <li data-filter=".filter-branding">Alat dan Mesin Pertanian</li>
                        <li data-filter=".filter-books">Produk Olahan Pertanian</li>
                    </ul><!-- End Portfolio Filters -->
                    {{-- <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($produk as $item)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                <div class="portfolio-content h-100">
                                    <img src="{{ url('/Produk/' . $item->gambar1_produk) }}"
                                        style="width: 370px; height: 250px; object-fit: cover;">
                                    <div class="portfolio-info">
                                        <h4>Hasil Pertanian</h4>
                                        <p>{{ $item->nama_produk }} ,{{ $item->harga_produk }} </p>
                                        <a href="{{ url('/Produk/' . $item->gambar1_produk) }}" title="Detail Foto Produk"
                                            data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                        <a href="{{ route('detailproduk', ['id_produk' => $item->id_produk]) }}"
                                            title="Detail Produk" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                        @endforeach
                    </div><!-- End Portfolio Item --> --}}
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($produk as $p)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                <div class="menu-item">
                                    <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" class="glightbox">
                                        <img src="{{ url('/Produk/' . $p->gambar1_produk) }}" class="menu-img img-fluid"
                                            style="width: 100%; height: 200px; object-fit: cover;"
                                            alt="{{ $p->nama_produk }}">
                                    </a>
                                    {{-- <a href="{{ route('detailproduk', ['id_produk' => $p->id_produk]) }}" title="Detail Produk" class="details-link" style="text-decoration: none; color: inherit;">
                                    
                                    <h4>{{ $p->nama_produk }}</h4>
                                </a> --}}
                                    <a href="{{ route('detailproduk', ['id_produk' => $p->id_produk]) }}"
                                        title="Detail Produk" class="details-link"
                                        style="text-decoration: none; color: inherit;">
                                        <h4>{{ $p->nama_produk }}</h4>
                                    </a>

                                    <p class="ingredients">
                                        {{ $p->deskripsi_produk }}
                                    </p>
                                    <div class="portfolio-info">
                                        <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" title="Detail Foto Produk"
                                            data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                    </div>
                                </div><!-- Menu Item -->
                            </div>
                        @endforeach
                    </div><!-- End Portfolio Container -->


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
            <!-- Contact Section -->
            <section id="contact" class="contact section">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Kontak</h2>
                    {{-- <p>Contact Us</p> --}}
                </div><!-- End Section Title -->
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="info-item" data-aos="fade" data-aos-delay="200">
                                        <i class="bi bi-geo-alt"></i>
                                        <h3>Alamat</h3>
                                        <p>A108 Adam Street</p>
                                        <p>New York, NY 535022</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="col-md-6">
                                    <div class="info-item" data-aos="fade" data-aos-delay="300">
                                        <i class="bi bi-telephone"></i>
                                        <h3>Nomor Telepon</h3>
                                        <p>+1 5589 55488 55</p>
                                        <p>+1 6678 254445 41</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="col-md-6">
                                    <div class="info-item" data-aos="fade" data-aos-delay="400">
                                        <i class="bi bi-envelope"></i>
                                        <h3>Email</h3>
                                        <p>info@example.com</p>
                                        <p>contact@example.com</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="col-md-6">
                                    <div class="info-item" data-aos="fade" data-aos-delay="500">
                                        <i class="bi bi-clock"></i>
                                        <h3>Jam Buka</h3>
                                        <p>Monday - Friday</p>
                                        <p>9:00AM - 05:00PM</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                        </div>


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
