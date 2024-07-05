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
                @foreach ($berita as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $b->judul_berita }}</td>
                        <td>{{ $b->tanggal_berita }}</td>
                        <td><img src="{{ url('/Kabar Tani/' . $b->foto_berita) }}" alt="Foto Berita" width="50">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Detail</button>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete('delete-url')">Hapus</button>
                        </td>
                    </tr>
                @endforeach
                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </tbody>
        </table>
        <!-- End Table with striped rows -->
    </div>
</div>

@include('Admin.tambah-berita')

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
