<div class="card-body">
    <h5 class="card-title">Tabel Produk Tani</h5>
    <div class="text-right mb-3">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahProdukModal">Tambah</a>
    </div>
    <!-- Filter Form -->
    @if (auth()->user()->hasRole(['admin']))
        <form method="GET" action="{{ route('produktani') }}" class="mb-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kecamatan" class="form-label"><b>Kecamatan</b></label>
                    <select class="form-select" id="kecamatan" name="kecamatan" onchange="this.form.submit()">
                        <option value="">Pilih Kecamatan</option>
                        @foreach (['Tarokan', 'Grogol', 'Banyakan', 'Mojo', 'Semen', 'Ngadiluwih', 'Kras', 'Ringinrejo', 'Kandat', 'Wates', 'Ngancar', 'Plosoklaten', 'Gurah', 'Puncu', 'Kepung', 'Kandangan', 'Pare', 'Badas', 'Kunjang', 'Plemahan', 'Purwoasri', 'Papar', 'Pagu', 'Kayenkidul', 'Gampengrejo', 'Ngasem'] as $kecamatan)
                            <option value="{{ $kecamatan }}"
                                {{ request('kecamatan') == $kecamatan ? 'selected' : '' }}>
                                {{ $kecamatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pengguna" class="form-label"><b>Pengguna</b></label>
                    <select class="form-select" id="pengguna" name="pengguna" onchange="this.form.submit()">
                        <option value="">Pilih Pengguna</option>
                        @foreach (['masyarakat', 'kelompok_tani', 'admin'] as $pengguna)
                            <option value="{{ $pengguna }}"
                                {{ request('pengguna') == $pengguna ? 'selected' : '' }}>
                                {{ ucfirst($pengguna) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    @endif

    <div class="table-responsive">
        <table id="produk" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="1%">#</th>
                    <th width="10%">Nama Produk</th>
                    <th width="10%">Jenis Produk</th>
                    @if (auth()->user()->hasRole(['admin']))
                        <th width="10%">Nama User</th>
                        <th width="10%">Alamat User</th>
                    @endif
                    <th width="10%">Foto</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('produk.detail', ['id' => $p->id_produk]) }}">{{ $p->nama_produk }}</a>
                        </td>
                        <td>{{ $p->kategori_produk }}</td>
                        @if (auth()->user()->hasRole(['admin']))
                            <td>{{ $p->user->nama_user }}</td>
                            <td>{{ $p->user->alamat_user . ', ' . $p->user->kecamatan_user }}</td>
                        @endif
                        {{-- <td>{{ $p->harga_produk }}</td> --}}
                        <td><img src="{{ url('/Produk/' . $p->gambar1_produk) }}" alt="Foto Produk" width="50">
                        </td>
                        <td class="text-center">
                            <form action="" method="post">
                                <input name="id" id="id" type="hidden" value="{{ $p->id_user }}">
                                <a href="{{ route('produk.detail', ['id' => $p->id_produk]) }}"
                                    class="btn btn-sm btn-primary btn-icon"><img src="assets/img/detail.png"
                                        alt="Detail" style="width: 20px; height: 20px;"></a></a>
                                @if (auth()->user()->hasRole(['admin', 'kelompok_tani', 'masyarakat']) && $p->id_user == auth()->user()->id_user)
                                    <!-- Tampilkan tombol EDIT hanya jika user adalah admin dan pemilik produk -->
                                    <a class="btn btn-sm btn-warning btn-icon" href="#" data-toggle="modal"
                                        data-target="#editProdukModal{{ $p->id_produk }}"><img
                                            src="assets/img/edit.png" alt="Edit"
                                            style="width: 20px; height: 20px;"></a>
                                @endif
                                <a class="btn btn-sm btn-danger btn-icon" href="#"
                                    onclick="confirmDelete('/produk/hapus/{{ $p->id_produk }}')"><img src="assets/img/hapus.png" alt="Hapus" style="width: 20px; height: 20px;"></a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data produk.</td>
                    </tr>
                @endforelse
                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>

@include('Admin.edit-produk')
@include('Admin.tambah-produk')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Fungsi untuk konfirmasi penghapusan
    function confirmDelete(url) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Anda tidak akan dapat mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika konfirmasi, arahkan pengguna ke URL hapus
                window.location = url;
            }
        });
    }
    var columnsConfig = [
        null, // Kolom nomor urut
        {
            searchable: true
        }, // Nama Produk
        {
            searchable: true
        }, // Jenis Produk
        @if (auth()->user()->hasRole(['admin']))
            {
                searchable: true
            }, // Nama User
            {
                searchable: false
            }, // Nama User
        @endif {
            searchable: false
        }, // Foto
        {
            searchable: false
        }, // Aksi
    ];
</script>
