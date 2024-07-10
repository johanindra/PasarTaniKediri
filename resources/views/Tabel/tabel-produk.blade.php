<div class="card-body">
    <h5 class="card-title">Tabel Produk Tani</h5>
    <div class="text-right mb-3">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahProdukModal">Tambah</a>
    </div>

    <div class="table-responsive">
        <table id="produk" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="1%">#</th>
                    <th width="10%">Nama Produk</th>
                    <th width="10%">Jenis Produk</th>
                    {{-- <th width="10%">Harga</th> --}}
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
                        {{-- <td>{{ $p->harga_produk }}</td> --}}
                        <td><img src="{{ url('/Produk/' . $p->gambar1_produk) }}" alt="Foto Produk" width="50"></td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Detail</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete('delete-url')">Hapus</button>
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
