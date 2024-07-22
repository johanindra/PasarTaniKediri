@extends('navbar.main')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Kabar Tani</h1>
                            {{-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                                voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                                Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb-list">
                        <li><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="current">Kabar Tani</li>
                    </ol>

                </div>
            </nav>
        </div><!-- End Page Title -->

        {{-- <section id="portfolio" class="portfolio section"> --}}

        <!-- Section Title -->
        {{-- <div class="container">
                <div class="search-select-bar">
                    <form action="" method="GET" class="search-form">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Search" title="Enter search keyword">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary search-btn" title="Search">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="select-wrapper">
                        <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div> --}}
        {{-- <div class="container section-title" data-aos="fade-up"> --}}
        {{-- <h2>Produk</h2> --}}
        {{-- <p>Check our latest work</p> --}}
        {{-- </div><!-- End Section Title --> --}}
        <section id="recent-posts" class="recent-posts section">
          <div class="container">
              <div class="row gy-5">
                @if ($berita->isEmpty())
                <div class="col-12">
                    <p class="text-center">ARTIKEL DALAM PROSES PENULISAN NIH, TUNGGU YA!</p>
                </div>
            @else
                @foreach ($berita as $item)
                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-img position-relative overflow-hidden">
                              {{-- <img src="{{ url('/Kabar Tani/' . $item->foto_berita) }}" alt="{{ $item->judul_berita }}" style="width: 370px; max-width: 100%; height: auto; object-fit: cover;"> --}}
                                <img src="{{ url('/Kabar Tani/' . $item->foto_berita) }}" alt="{{ $item->judul_berita }}" style="width: 370px; height: 250px; object-fit: cover;">
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">{{ $item->judul_berita }}</h3>
                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Kabar Tani</span>
                                    </div>
                                </div>
                                <hr>
                                {{-- <a href="{{ route('detailartikel', ['id_berita' => $berita->id]) }}">Baca Selengkapnya</a> --}}
                                {{-- <a href="{{ route('detailartikel', ['id_berita' => $item->id_berita]) }}" class="readmore stretched-link"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a> --}}
                                <a href="{{ route('detailartikel', ['id_berita' => $item->id_berita]) }}" class="readmore stretched-link">
                                    <span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i>
                                </a>
                                {{-- <a href="{{ route('detailproduk', ['id_produk' => $p->id_produk]) }}" title="Detail Produk" class="details-link" style="text-decoration: none; color: inherit;">
                                    <h4>{{ $item->nama_produk }}</h4>
                                </a> --}}
                                
                                
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
              </div>
          </div><!-- End post item -->
      </section><!-- /Recent Posts Section -->
      
    </main>
@endsection
