<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- ini untuk judul dari agenda desanya -->
                    <h5 class="card-title">{{ $berita->judul_berita }}</h5>

                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ url('/Kabar Tani/' . $berita->foto_berita) }}" class="d-block w-100"
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
                            <h6><b>Tanggal :</b> {{ $berita->tanggal_berita }}</h6>
                        </div>
                        <div class="agenda-description">
                            <h6><b>Deskripsi :</b></h6>
                            <p>{{ $berita->deskripsi_berita }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
