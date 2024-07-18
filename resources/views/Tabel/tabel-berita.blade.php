<div class="card-body">
    <h5 class="card-title">Tabel Kabar Tani</h5>
    <div class="text-right mb-3">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahBeritaModal">Tambah</a>
    </div>
    <!-- Filter Form -->
    @if (auth()->user()->hasRole(['admin']))
        <form method="GET" action="{{ route('adminberita') }}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kecamatan" class="form-label"><b>Kecamatan</b></label>
                    <select class="form-select" id="kecamatan" name="kecamatan" onchange="this.form.submit()">
                        <option value="">Pilih Kecamatan</option>
                        @foreach (['Tarokan', 'Grogol', 'Banyakan', 'Mojo', 'Semen', 'Ngadiluwih', 'Kras', 'Ringinrejo', 'Kandat', 'Wates', 'Ngancar', 'Plosoklaten', 'Gurah', 'Puncu', 'Kepung', 'Kandangan', 'Pare', 'Badas', 'Kunjang', 'Plemahan', 'Purwoasri', 'Papar', 'Pagu', 'Kayenkidul', 'Gampengrejo', 'Ngasem'] as $kecamatan)
                            <option value="{{ $kecamatan }}"
                                {{ request('kecamatan') == $kecamatan ? 'selected' : '' }}>{{ $kecamatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pengguna" class="form-label"><b>Pengguna</b></label>
                    <select class="form-select" id="pengguna" name="pengguna" onchange="this.form.submit()">
                        <option value="">Pilih Pengguna</option>
                        @foreach (['kelompok_tani', 'admin'] as $pengguna)
                            <option value="{{ $pengguna }}"
                                {{ request('pengguna') == $pengguna ? 'selected' : '' }}>{{ ucfirst($pengguna) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    @endif

    <div class="table-responsive">
        <table id="kabartani" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="1%">#</th>
                    <th>Judul</th>
                    @if (auth()->user()->hasRole(['admin']))
                        <th>Nama User</th>
                        <th>Alamat</th>
                    @endif
                    <th>Tanggal</th>
                    <th width="1%">Foto</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($berita as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('detail.kabar', ['id' => $b->id_berita]) }}">{{ $b->judul_berita }}</a>
                        </td>
                        @if (auth()->user()->hasRole(['admin']))
                            <td>{{ $b->user->nama_user }}</td>
                            <td>{{ $b->user->alamat_user . ', ' . $b->user->kecamatan_user }}</td>
                        @endif
                        <td>{{ $b->tanggal_berita }}</td>
                        <td><img src="{{ url('/Kabar Tani/' . $b->foto_berita) }}" alt="Foto Berita" width="50">
                        </td>
                        <td class="text-center">
                            <form action="" method="post">
                                <input name="id" id="id" type="hidden" value="{{ $b->id_berita }}">
                                <a href="{{ route('detail.kabar', ['id' => $b->id_berita]) }}"
                                    class="btn btn-sm btn-primary btn-icon"><img src="assets/img/detail.png"
                                        alt="Detail" style="width: 20px; height: 20px;"></a>
                                @if (auth()->user()->hasRole(['admin','kelompok_tani']) && $b->id_user == auth()->user()->id_user)
                                    <a class="btn btn-sm btn-warning btn-icon" href="#" data-toggle="modal"
                                        data-target="#editBeritaModal{{ $b->id_berita }}"><img
                                            src="assets/img/edit.png" alt="Edit"
                                            style="width: 20px; height: 20px;"></a>
                                @endif
                                <a class="btn btn-sm btn-danger btn-icon" href="#"
                                    onclick="confirmDelete('/upload/hapus/{{ $b->id_berita }}')">
                                    <img src="assets/img/hapus.png" alt="Hapus" style="width: 20px; height: 20px;">
                                </a>

                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@include('Admin.edit-berita')
@include('Admin.tambah-berita')



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
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
                window.location = url;
            }
        });
    }
    var columnsConfig = [
        null, // Kolom nomor urut
        {
            searchable: true
        }, // Nama Produk
        @if (auth()->user()->hasRole(['admin']))
            {
                searchable: true
            }, // Nama User
            {
                searchable: false
            }, // Nama User
        @endif {
            searchable: true
        }, // Jenis Produk
        {
            searchable: false
        }, // Foto
        {
            searchable: false
        }, // Aksi
    ];
</script>
