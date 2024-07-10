<div class="card-body">
    <h5 class="card-title">Tabel Data Pengguna Pasar Tani Kediri</h5>

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
                @forelse ($pengguna as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('detail.pengguna', ['id' => $p->id_user]) }}">{{ $p->nama_user }}</a></td>
                        <td>
                            @foreach ($p->roles as $role)
                                {{ $role->name }}
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
                        <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
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
