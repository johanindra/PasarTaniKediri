<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- ini untuk judul dari agenda desanya -->
                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>

                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ url('/Produk/' . $produk->gambar1_produk) }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item active">
                                <img src="{{ url('/Produk/' . $produk->gambar2_produk) }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item active">
                                <img src="{{ url('/Produk/' . $produk->gambar3_produk) }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            {{-- <div class="carousel-item">
                                <img src="assets/img/slides-2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/slides-3.jpg" class="d-block w-100" alt="...">
                            </div> --}}
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-title"></div>
                    <br>
                    <div class="agenda-details">
                        <div class="agenda-date">
                            <h6><b>Jenis Produk :</b> {{ $produk->kategori_produk }}</h6>
                        </div>
                        <div class="agenda-date">
                            <h6><b>Harga :</b> Rp.{{ $produk->harga_produk }}</h6>
                        </div>
                        <div class="agenda-description">
                            <h6><b>Deskripsi :</b></h6>
                            <p>{{ $produk->deskripsi_produk }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
