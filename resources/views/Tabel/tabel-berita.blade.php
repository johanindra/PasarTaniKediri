<div class="card-body">
    <h5 class="card-title">Tabel Kabar Tani</h5>
    <div class="text-right mb-3">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahBeritaModal">Tambah</a>
    </div>

    <div class="table-responsive">
        <table id="kabartani" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="1%">#</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th width="1%">Foto</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($berita as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $b->judul_berita }}</td>
                        <td>{{ $b->tanggal_berita }}</td>
                        <td><img src="{{ url('/Kabar Tani/' . $b->foto_berita) }}" alt="Foto Berita" width="50">
                        </td>
                        <td class="">
                            <form action="" method="post">
                                <input name="id" id="id" type="hidden" value="{{ $b->id_berita }}">
                                <a href="{{ route('detail.kabar', ['id' => $b->id_berita]) }}"
                                    class="btn btn-sm btn-primary">Detail</a>
                                <a class="btn btn-sm btn-warning" href="#" data-toggle="modal"
                                    data-target="#editBeritaModal{{ $b->id_berita }}">EDIT</a>
                                <a class="btn btn-sm btn-danger" href="#"
                                    onclick="confirmDelete('/upload/hapus/{{ $b->id_berita }}')">HAPUS</a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('Admin.tambah-berita')
@include('Admin.edit-berita')



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
</script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
        });
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    </script>
@endif
