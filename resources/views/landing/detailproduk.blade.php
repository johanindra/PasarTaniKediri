@extends('navbar.main')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Detail Produk</h1>
                        <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                            voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                            Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('landing') }}">Beranda</a></li>
                    <li class="current">Detail Produk</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper init-swiper">

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
                              }
                            }
                        </script>
                        @foreach($produk as $p)
                        <div class="swiper-wrapper align-items-center">
                            {{-- Slider images --}}
                            <div class="swiper-slide">
                                <img src="{{ url('/Produk/' . $p->gambar1_produk) }}" alt="{{ $p->nama_produk }}">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ url('/Produk/' . $p->gambar2_produk) }}" alt="{{ $p->nama_produk }}">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ url('/Produk/' . $p->gambar3_produk) }}" alt="{{ $p->nama_produk }}">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                        <h3>Informasi Produk</h3>
                        <ul>
                            <li><strong>Nama Produk</strong>: {{ $p->nama_produk }}</li>
                            <li><strong>Harga Produk</strong>: {{ $p->harga_produk }}</li>
                            <li><strong>Ketersediaan Produk</strong>: {{ $p->tanggal_ketersediaan }}</li>
                            {{-- Tautan WhatsApp --}}
                            @if ($p->user && $p->user->notelp_user)
                            <li><a href="https://wa.me/{{ $p->user->notelp_user }}"><i class="bi bi-whatsapp"></i></a></li>
                            @else
                            <li><p>Informasi kontak tidak tersedia.</p></li>
                            @endif
                            <li><a href="#"><i class="bi bi-geo-alt-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                        <h2>Deskripsi Produk :</h2>
                        <p>{{ $p->deskripsi_produk }}</p>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </section><!-- /Portfolio Details Section -->

</main>
@endsection
