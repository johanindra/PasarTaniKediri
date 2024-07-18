<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- Judul Berita -->
                    @if (auth()->user()->hasRole(['admin']))
                        <h5 class="card-title"><i class="bi bi-person-circle"></i> {{ $berita->user->nama_user }}</h5>
                    @endif
                    @if (auth()->user()->hasRole('kelompok_tani'))
                        <h5 class="card-title"><i class="bi bi-person-circle"></i> Saya</h5>
                    @endif

                    <!-- Carousel Gambar Berita -->
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ url('/Kabar Tani/' . $berita->foto_berita) }}" class="d-block w-100"
                                    alt="Gambar Berita" data-bs-toggle="modal" data-bs-target="#fotoModal">
                            </div>
                        </div>
                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Detail Berita dalam Tabel -->
                    <div class="card-title"></div>
                    <br>
                    <div class="agenda-details">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Judul Berita</th>
                                        <td>{{ $berita->judul_berita }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal</th>
                                        <td>{{ $berita->tanggal_berita }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Deskripsi</th>
                                        <td>{{ $berita->deskripsi_berita }}</td>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoModalLabel">Gambar Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ url('/Kabar Tani/' . $berita->foto_berita) }}" class="img-fluid" alt="Gambar Berita">
            </div>
        </div>
    </div>
</div>
