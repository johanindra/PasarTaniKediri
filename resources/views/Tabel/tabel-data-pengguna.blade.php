@include('Admin.tambah-admin')
<div class="card-body">
    <h5 class="card-title">Tabel Data Pengguna Pasar Tani Kediri</h5>
    @if (auth()->user()->hasRole('admin') && auth()->user()->email_user == 'pasartanikediri@gmail.com')
        <div class="text-right mb-3">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahAdminModal">Tambah</a>
        </div>
    @endif
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
                @php
                    // Check if there's any user with email 'pasartanikediri@gmail.com'
$emailRestricted = $penggunaList->contains('email_user', 'pasartanikediri@gmail.com');
                @endphp
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
                        <td>{{ $p->alamat_user . ', ' . $p->kecamatan_user }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td class="text-center">
                            @if (auth()->user()->hasRole('admin'))
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('detail.pengguna', ['id' => $p->id_user]) }}"
                                        class="btn btn-sm btn-primary btn-icon"><img src="assets/img/detail.png"
                                            alt="Detail" style="width: 20px; height: 20px;"></a>

                                    @if ($emailRestricted && $p->email_user == 'pasartanikediri@gmail.com')
                                        <!-- Hide button for rows with email pasartanikediri@gmail.com -->
                                    @elseif (auth()->user()->email_user == 'pasartanikediri@gmail.com' ||
                                            $p->roles->pluck('name')->intersect(['masyarakat', 'kelompok_tani'])->isNotEmpty())
                                        <form id="delete-form-{{ $p->id_user }}"
                                            action="{{ route('HapusAkunUser', ['id' => $p->id_user]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger btn-icon"
                                                onclick="confirmDelete({{ $p->id_user }})"><img
                                                    src="assets/img/hapus.png" alt="Hapus"
                                                    style="width: 20px; height: 20px;"></button>
                                        </form>
                                    @endif
                                </div>
                            @else
                                <a href="{{ route('detail.pengguna', ['id' => $p->id_user]) }}"
                                    class="btn btn-sm btn-primary btn-icon"><img src="assets/img/detail.png"
                                        alt="Detail" style="width: 20px; height: 20px;"></a>
                            @endif
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
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat mengembalikan akun ini setelah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
</script>
