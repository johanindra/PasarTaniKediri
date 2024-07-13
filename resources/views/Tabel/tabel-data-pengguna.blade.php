<div class="card-body">
    <h5 class="card-title">Tabel Data Pengguna Pasar Tani Kediri</h5>
    <form method="GET" action="{{ route('adminpengguna') }}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kecamatan" class="form-label"><b>Kecamatan</b></label>
                <select class="form-select" id="kecamatan" name="kecamatan" onchange="this.form.submit()">
                    <option value="">Pilih Kecamatan</option>
                    @foreach (['Tarokan', 'Grogol', 'Banyakan', 'Mojo', 'Semen', 'Ngadiluwih', 'Kras', 'Ringinrejo', 'Kandat', 'Wates', 'Ngancar', 'Plosoklaten', 'Gurah', 'Puncu', 'Kepung', 'Kandangan', 'Pare', 'Badas', 'Kunjang', 'Plemahan', 'Purwoasri', 'Papar', 'Pagu', 'Kayenkidul', 'Gampengrejo', 'Ngasem'] as $kecamatan)
                        <option value="{{ $kecamatan }}" {{ request('kecamatan') == $kecamatan ? 'selected' : '' }}>
                            {{ $kecamatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="pengguna" class="form-label"><b>Pengguna</b></label>
                <select class="form-select" id="pengguna" name="pengguna" onchange="this.form.submit()">
                    <option value="">Pilih Pengguna</option>
                    @foreach (['kelompok_tani', 'admin', 'masyarakat'] as $pengguna)
                        <option value="{{ $pengguna }}" {{ request('pengguna') == $pengguna ? 'selected' : '' }}>
                            {{ ucfirst($pengguna) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><b>Nama</b></th>
                    <th>Level</th>
                    <th>Alamat</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Tanggal Daftar</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penggunaList as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('detail.pengguna', ['id' => $p->id_user]) }}">{{ $p->nama_user }}</a></td>
                        <td>
                            @foreach ($p->roles as $role)
                                @if ($role->name == 'kelompok_tani')
                                    <span class="badge bg-success">{{ $role->name }}</span>
                                @elseif ($role->name == 'masyarakat')
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                @elseif ($role->name == 'admin')
                                    <span class="badge bg-info">{{ $role->name }}</span>
                                @endif
                            @endforeach

                        </td>
                        <td>{{ $p->alamat_user }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td class="text-center">
                            <form action="" method="post">
                                <input name="id" id="id" type="hidden" value="{{ $p->id_berita }}">
                                <a href="{{ route('detail.pengguna', ['id' => $p->id_user]) }}"
                                    class="btn btn-sm btn-primary">Detail</a>
                                {{-- <a class="btn btn-sm btn-warning" href="#" data-toggle="modal"
                data-target="#editBeritaModal{{ $b->id_berita }}">EDIT</a>
            <a class="btn btn-sm btn-danger" href="#"
                onclick="confirmDelete('/upload/hapus/{{ $b->id_berita }}')">HAPUS</a> --}}
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>

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
</script>
