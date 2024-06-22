<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambahProdukModal" tabindex="-1" role="dialog" aria-labelledby="tambahProdukModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inputForm" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul"><b>Nama Produk</b></label>
                        <input type="text" class="form-control" id="judul" placeholder="Masukkan judul Produk"
                            name="judul">
                    </div>
                    <div class="form-group">
                        <label for="jenis_produk" class="form-label"><b>Jenis Produk</b></label>
                        <select class="form-control" id="jenis_produk" name="jenis_produk"
                            aria-label="Pilih Jenis Produk">
                            <option disabled selected>Pilih Jenis Produk</option>
                            <option value="Hasil Tanam">Hasil Tanam</option>
                            <option value="Alat Pertanian">Alat Pertanian</option>
                            <option value="Pupuk">Pupuk</option>
                            <option value="Benih">Benih</option>
                            <option value="Obat Hama">Obat Hama</option>
                            <option value="Perlengkapan Pertanian">Perlengkapan Pertanian</option>
                            <!-- Tambahkan jenis produk lainnya sesuai kebutuhan -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto"><b>Foto</b></label><br>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"><b>Deskripsi</b></label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
