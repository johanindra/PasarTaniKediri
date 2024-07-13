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
                        <div class="select-wrapper ml-2 d-flex align-items-center">
                            <select class="form-select form-select-sm" aria-label="Default select example">
                                <option selected>Pilih Kecamatan</option>
                                <option value="1">Mojo</option>
                                <option value="2">Semen</option>
                                <option value="3">Ngadiluwih</option>
                                <option value="4">Kras</option>
                                <option value="5">Ringinrejo</option>
                                <option value="6">Kandat</option>
                                <option value="7">Wates</option>
                                <option value="8">Ngancar</option>
                                <option value="9">Plosoklaten</option>
                                <option value="10">Gurah</option>
                                <option value="11">Puncu</option>
                                <option value="12">Kepung</option>
                                <option value="13">Kandangan</option>
                                <option value="14">Pare</option>
                                <option value="15">Badas</option>
                                <option value="16">Kunjang</option>
                                <option value="17">Plemahan</option>
                                <option value="18">Purwoasri</option>
                                <option value="19">Papar</option>
                                <option value="20">Pagu</option>
                                <option value="21">Kayenkidul</option>
                                <option value="22">Gampengrejo</option>
                                <option value="23">Ngasem</option>
                                <option value="24">Banyakan</option>
                                <option value="25">Grogol</option>
                                <option value="26">Tarokan</option>
                            </select>
                            <button class="btn btn-outline-secondary btn-sm ml-2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </div><!-- End Page Title -->

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
                                <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" class="glightbox"><img src="{{ url('/Produk/' . $p->gambar1_produk) }}" class="menu-img img-fluid" alt="{{ $p->nama_produk }}"></a>
                                <h4>{{ $p->nama_produk }}</h4>
                                <p class="ingredients">
                                    {{ $p->deskripsi_produk }}
                                </p>
                                <div class="portfolio-info">
                                    <a href="{{ url('/Produk/' . $p->gambar1_produk) }}" title="Detail Foto Produk" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="{{ route('detailproduk', ['id_produk' => $p->id_produk]) }}" title="Detail Produk" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div><!-- Menu Item -->
                        </div>
                        @endforeach
                    </div><!-- End Portfolio Container -->
                </div>
            </div>
        </section><!-- /Portfolio Section -->

    </main>
@endsection
