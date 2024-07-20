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
                            @if (!empty($produk->gambar1_produk))
                                <div class="carousel-item active">
                                    <img src="{{ url('/Produk/' . $produk->gambar1_produk) }}" class="d-block w-100"
                                        alt="Gambar 1 Produk" data-bs-toggle="modal" data-bs-target="#fotoModal"
                                        onclick="showModal(0)">
                                </div>
                            @endif
                            @if (!empty($produk->gambar2_produk))
                                <div class="carousel-item{{ empty($produk->gambar1_produk) ? ' active' : '' }}">
                                    <img src="{{ url('/Produk/' . $produk->gambar2_produk) }}" class="d-block w-100"
                                        alt="Gambar 2 Produk" data-bs-toggle="modal" data-bs-target="#fotoModal"
                                        onclick="showModal(1)">
                                </div>
                            @endif
                            @if (!empty($produk->gambar3_produk))
                                <div
                                    class="carousel-item{{ empty($produk->gambar1_produk) && empty($produk->gambar2_produk) ? ' active' : '' }}">
                                    <img src="{{ url('/Produk/' . $produk->gambar3_produk) }}" class="d-block w-100"
                                        alt="Gambar 3 Produk" data-bs-toggle="modal" data-bs-target="#fotoModal"
                                        onclick="showModal(2)">
                                </div>
                            @endif
                        </div>

                        @if (!empty($produk->gambar2_produk) || !empty($produk->gambar3_produk))
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
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-title"></div>
                    <br>
                    <div class="agenda-details">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Produk</th>
                                        <td>{{ $produk->nama_produk }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Produk</th>
                                        <td>{{ $produk->kategori_produk }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Harga Produk</th>
                                        <td>Rp. {{ number_format($produk->harga_produk, 0, ',', '.') }}</td>
                                    </tr>
                                    @if ($produk->shopee_produk)
                                        <tr>
                                            <th scope="row">Link Shopee</th>
                                            <td>
                                                <a href="{{ $produk->shopee_produk }}" target="_blank"
                                                    class="btn btn-primary"
                                                    style="color: white; text-decoration: none; display: inline-block; padding: 10px 20px; border-radius: 5px; background-color: #FF6600;">
                                                    <img src="https://logospng.org/wp-content/uploads/shopee.png"
                                                        alt="Shopee"
                                                        style="height: 20px; vertical-align: middle; margin-right: 5px;">
                                                    Lihat Produk
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th scope="row">Deskripsi</th>
                                        <td>{{ $produk->deskripsi_produk }}</td>
                                    </tr>
                                </tbody>
                            </table>
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
            @if (!empty($produk->gambar2_produk) || !empty($produk->gambar3_produk))
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="prevImage()">
                        <i class="bi bi-arrow-left"></i> Sebelumnya
                    </button>
                    <button type="button" class="btn btn-outline-primary" onclick="nextImage()">
                        Berikutnya <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    var currentImageIndex = 0;
    var images = [
        @if (!empty($produk->gambar1_produk))
            '{{ url('/Produk/' . $produk->gambar1_produk) }}',
        @endif
        @if (!empty($produk->gambar2_produk))
            '{{ url('/Produk/' . $produk->gambar2_produk) }}',
        @endif
        @if (!empty($produk->gambar3_produk))
            '{{ url('/Produk/' . $produk->gambar3_produk) }}',
        @endif
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
