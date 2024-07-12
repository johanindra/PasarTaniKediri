<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- ini untuk judul -->
                    @if (auth()->user()->hasRole(['admin']))
                        <h5 class="card-title">Produk {{ $produk->user->nama_user }}</h5>
                    @endif
                    @if (auth()->user()->hasRole(['masyarakat', 'kelompok_tani']))
                        <h5 class="card-title">Produk Saya</h5>
                    @endif

                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ url('/Produk/' . $produk->gambar1_produk) }}" class="d-block w-100"
                                    alt="Gambar 1 Produk" data-bs-toggle="modal" data-bs-target="#fotoModal"
                                    onclick="showModal(0)">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ url('/Produk/' . $produk->gambar2_produk) }}" class="d-block w-100"
                                    alt="Gambar 2 Produk" data-bs-toggle="modal" data-bs-target="#fotoModal"
                                    onclick="showModal(1)">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ url('/Produk/' . $produk->gambar3_produk) }}" class="d-block w-100"
                                    alt="Gambar 3 Produk" data-bs-toggle="modal" data-bs-target="#fotoModal"
                                    onclick="showModal(2)">
                            </div>
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
                            <h6><b>Nama Produk:</b> {{ $produk->nama_produk }}</h6>
                        </div>
                        <div class="agenda-date">
                            <h6><b>Jenis Produk:</b> {{ $produk->kategori_produk }}</h6>
                        </div>
                        <div class="agenda-date">
                            <h6><b>Harga:</b> Rp.{{ $produk->harga_produk }}</h6>
                        </div>
                        <div class="agenda-description">
                            <h6><b>Deskripsi:</b> {{ $produk->deskripsi_produk }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoModalLabel">Foto Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="fotoModalImage" src="" class="img-fluid" alt="Foto Produk">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" onclick="prevImage()">
                    <i class="bi bi-arrow-left"></i> Sebelumnya
                </button>
                <button type="button" class="btn btn-outline-primary" onclick="nextImage()">
                    Berikutnya <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    var currentImageIndex = 0;
    var images = [
        '{{ url('/Produk/' . $produk->gambar1_produk) }}',
        '{{ url('/Produk/' . $produk->gambar2_produk) }}',
        '{{ url('/Produk/' . $produk->gambar3_produk) }}'
    ];

    function showModal(index) {
        currentImageIndex = index;
        document.getElementById('fotoModalImage').src = images[currentImageIndex];
    }

    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        document.getElementById('fotoModalImage').src = images[currentImageIndex];
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        document.getElementById('fotoModalImage').src = images[currentImageIndex];
    }
</script>
