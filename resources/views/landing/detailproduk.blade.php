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
                            {{-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                                voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                                Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
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
                            @foreach ($produk as $p)
                                <div class="swiper-wrapper align-items-center">
                                    {{-- Slider images --}}
                                    @if ($p->gambar1_produk)
                                        <div class="swiper-slide">
                                            <img src="{{ url('/Produk/' . $p->gambar1_produk) }}"
                                                alt="{{ $p->nama_produk }}"
                                                style="width: auto; height: auto; max-width: 50%; max-height: 50%; display: block; margin: 0 auto;">
                                        </div>
                                    @endif

                                    @if ($p->gambar2_produk)
                                        <div class="swiper-slide">
                                            <img src="{{ url('/Produk/' . $p->gambar2_produk) }}"
                                                alt="{{ $p->nama_produk }}"
                                                style="width: auto; height: auto; max-width: 50%; max-height: 50%; display: block; margin: 0 auto;">
                                        </div>
                                    @endif

                                    @if ($p->gambar3_produk)
                                        <div class="swiper-slide">
                                            <img src="{{ url('/Produk/' . $p->gambar3_produk) }}"
                                                alt="{{ $p->nama_produk }}"
                                                style="width: auto; height: auto; max-width: 50%; max-height: 50%; display: block; margin: 0 auto;">
                                        </div>
                                    @endif
                                </div>


                                <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                            <h3>Informasi Produk</h3>
                            <ul>
                                <li><strong>Nama Produk</strong>: {{ $p->nama_produk }}</li>
                                <li><strong>Harga Produk</strong>: Rp. {{ number_format($p->harga_produk, 0, ',', '.') }}
                                </li>
                                <li><strong>Kategori Produk</strong>: {{ $p->kategori_produk }}</li>
                                <li><strong>Deskripsi Produk</strong>: {{ $p->deskripsi_produk }}</li>
                                {{-- Tautan WhatsApp --}}
                                <ul style="list-style-type: none; padding: 0;">
                                    @if ($p->user && $p->user->notelp_user)
        <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
            <a href="https://wa.me/{{ $p->user->notelp_user }}">
                <i class="bi bi-whatsapp"></i>
            </a>
        </li>
    @else
        <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
            <a href="#" class="disabled-icon">
                <i class="bi bi-whatsapp"></i>
            </a>
        </li>
    @endif

    @if ($p->user && $p->user->maps_user)
        <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
            <a href="{{ $p->user->maps_user }}" target="_blank">
                <i class="bi bi-geo-alt-fill"></i>
            </a>
        </li>
    @else
        <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
            <a href="#" class="disabled-icon">
                <i class="bi bi-geo-alt-fill"></i>
            </a>
        </li>
    @endif

    @if ($p->user && $p->user->instagram_user)
        <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
            <a href="https://www.instagram.com/{{ $p->user->instagram_user }}" target="_blank">
                <i class="bi bi-instagram"></i>
            </a>
        </li>
    @else
        <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
            <a href="#" class="disabled-icon">
                <i class="bi bi-instagram"></i>
            </a>
        </li>
    @endif

    @if ($p->user && $p->user->facebook_user)
        <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
            <a href="https://www.facebook.com/{{ $p->user->facebook_user }}" target="_blank">
                <i class="bi bi-facebook"></i>
            </a>
        </li>
    @else
        <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
            <a href="#" class="disabled-icon">
                <i class="bi bi-facebook"></i>
            </a>
        </li>
    @endif
                                    {{-- <li style="display: inline-block; margin-right: 10px; font-size: 20px;"><a href="#"><i class="bi bi-geo-alt-fill"></i></a></li> --}}
                                    
                                    
                                    <li style="display: inline-block; margin-right: 10px; font-size: 20px;">
                                        @if ($p->shopee_produk)
                                            <a href="{{ $p->shopee_produk }}" target="_blank">
                                                <i class="bi bi-shop"></i>
                                            </a>
                                        @else
                                            <span style="color: grey; cursor: not-allowed;">
                                                <i class="bi bi-shop"></i>
                                            </span>
                                        @endif
                                    </li>
                                </ul>
                            </ul>
                        </div>
                        {{-- <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                        <h2>Deskripsi Produk :</h2>
                        <p>{{ $p->deskripsi_produk }}</p>
                    </div> --}}
                    </div>
                    @endforeach

                </div>

            </div>

            <section id="blog-comments" class="blog-comments section">
                <div class="container">
                    <h4 class="comments-count">Komentar Mengenai Produk</h4>

                    @if ($komentar->isEmpty())
                        <p>Belum ada komentar untuk produk ini.</p>
                    @else
                        @foreach ($komentar as $comment)
                            <div id="comment-{{ $comment->id }}" class="comment">
                                <div class="d-flex">
                                    <div class="comment-img">
                                        <img src="{{ asset('assets/img/default-comment.png') }}" alt="">
                                    </div>
                                    <div>
                                        <h5><a href="">{{ $comment->nama }}</a></h5>
                                        <time
                                            datetime="{{ $comment->created_at->format('Y-m-d') }}">{{ $comment->created_at->format('d M, Y') }}</time>
                                        <p>
                                            {{ $comment->komentar }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- End comment #{{ $comment->id }} -->
                        @endforeach
                    @endif
                </div>
            </section><!-- /Blog Comments Section -->



            {{-- <!-- /Comment Form Section --> --}}
            <!-- Comment Form Section -->
            <section id="comment-form" class="comment-form section">
                <div class="container">
                    <form action="{{ route('storecomment') }}" method="POST">
                        @csrf
                        <h4>Tuliskan Komentar Anda</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input name="nama" type="text" class="form-control" placeholder="Nama Anda" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="email" type="email" class="form-control" placeholder="Email Anda" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <textarea name="komentar" class="form-control" placeholder="Komentar Anda" required></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        </div>
                    </form>
                </div>
            </section><!-- /Comment Form Section -->

    </main>
@endsection
