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
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th width="1%">Foto</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Unity Pugh</td>
                    <td>Sayuran</td>
                    <td><img src="assets/img/apple-touch-icon.png" alt="Foto Produk" width="50"></td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm">Detail</button>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('delete-url')">Hapus</button>
                    </td>
                </tr>
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
