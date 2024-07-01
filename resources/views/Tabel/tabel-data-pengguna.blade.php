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
                <tr>
                    <td>1</td>
                    <td>Tani Maron</td>
                    <td>Kelompok Tani</td>
                    <td>Maron</td>
                    <td>2024/06/21</td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm">Detail</button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('delete-url')">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Sugeng Cahyono</td>
                    <td>Pengguna</td>
                    <td>Maron</td>
                    <td>2024/06/24</td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm">Detail</button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('delete-url')">Hapus</button>
                    </td>
                </tr>
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
