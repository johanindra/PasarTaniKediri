<div class="col-xl-3">

    <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="{{ url('/Foto Profil User/' . $pengguna->foto_user) }}" alt="Profile" class="rounded-circle"
                style="width: 150px; height: 150px; object-fit: cover;">
            <h2>{{ $pengguna->nama_user }}</h2>
            <h6>{{ $pengguna->email_user }}</h6>
            <h6>{{ $pengguna->alamat_user . ' ' . $pengguna->kecamatan_user }}</h6>
            <div class="social-links mt-2">
                <a href="https://wa.me/{{$pengguna->notelp_user}}" class="telephone"><i class="bi bi-whatsapp"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="map"><i class="bi bi-geo-alt"></i></a>
            </div>
        </div>
    </div>

</div>
<div class="col-xl-9">

    <div class="card">
        <div class="card-body pt-3">
            <!-- Bordered Tabs -->

            <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Tabel Produk Tani</h5>

                    <div class="table-responsive">
                        <table id="produk" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="1%">#</th>
                                    <th width="10%">Nama Produk</th>
                                    <th width="10%">Jenis Produk</th>
                                    <th width="10%">Harga</th>
                                    <th width="15%">Foto</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produk as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_produk }}</td>
                                        <td>{{ $p->kategori_produk }}</td>
                                        <td>{{ $p->harga_produk }}</td>
                                        <td><img src="{{ url('/Produk/' . $p->gambar1_produk) }}" alt="Foto Produk"
                                                width="50"></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm">Detail</button>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="confirmDelete('delete-url')">Hapus</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data produk.</td>
                                    </tr>
                                @endforelse
                                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>

                </div>
            </div><!-- End Bordered Tabs -->

        </div>
    </div>

</div>
