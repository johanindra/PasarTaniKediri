@extends('navbar.main')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Produk</h1>
                            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                                voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                                Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb-list">
                        <li><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="current">Produk</li>
                    </ol>
                    <div class="search-select-bar d-flex align-items-center">
                        <form action="" method="GET" class="search-form d-flex">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" class="form-control" placeholder="Cari Nama Produk"
                                    title="Enter search keyword">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary search-btn" title="Search">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form method="GET" action="{{ route('produk') }}" class="ms-3">
                            <div class="input-group input-group-sm">
                                <select class="form-select" id="kecamatan" name="kecamatan" onchange="this.form.submit()">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach (['Tarokan', 'Grogol', 'Banyakan', 'Mojo', 'Semen', 'Ngadiluwih', 'Kras', 'Ringinrejo', 'Kandat', 'Wates', 'Ngancar', 'Plosoklaten', 'Gurah', 'Puncu', 'Kepung', 'Kandangan', 'Pare', 'Badas', 'Kunjang', 'Plemahan', 'Purwoasri', 'Papar', 'Pagu', 'Kayenkidul', 'Gampengrejo', 'Ngasem'] as $kecamatan)
                                        <option value="{{ $kecamatan }}"
                                            {{ request('kecamatan') == $kecamatan ? 'selected' : '' }}>
                                            {{ $kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>

            <section id="portfolio" class="portfolio section">
                <!-- Section Title -->
                <div class="container">
                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
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
                                            <img src="{{ url('/Produk/' . $p->gambar1_produk) }}" class="menu-img img-fluid"
                                                style="width: 100%; height: 200px; object-fit: cover;"
                                                alt="{{ $p->nama_produk }}">
                                        </a>
                                        <a href="{{ route('detailproduk', ['id_produk' => $p->id_produk]) }}"
                                            title="Detail Produk" class="details-link"
                                            style="text-decoration: none; color: inherit;">
                                            {{-- <i class="bi bi-link-45deg"></i> --}}
                                            <h4>{{ $p->nama_produk }}</h4>
                                        </a>

                                        <p class="ingredients">
                                            Rp. {{ number_format($p->harga_produk, 0, ',', '.') }}
                                        </p>

                                        <div class="profile">
                                            @if ($p->user && $p->kecamatan_user)
                                                <p class="ingredients">{{ $p->kecamatan_user }}</p>
                                            @endif
                                        </div>

                                        <div class="portfolio-info">
                                            <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" title="Detail Foto Produk"
                                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                                    class="bi bi-zoom-in"></i></a>
                                        </div>
                                    </div><!-- Menu Item -->
                                </div>
                            @endforeach
                        </div><!-- End Portfolio Container -->
                        <!-- End Portfolio Container -->
                    </div>
                </div>
            </section><!-- /Portfolio Section -->

    </main>
@endsection
