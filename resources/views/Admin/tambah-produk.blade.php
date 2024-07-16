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
                <form id="inputForm" action="{{ route('uploadproduk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_produk"><b>Nama Produk</b></label>
                        <input type="text" class="form-control" id="nama_produk" placeholder="Masukkan nama produk"
                            name="nama_produk" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_produk"><b>Harga Produk</b></label>
                        <input type="number" class="form-control" id="harga_produk" placeholder="Masukkan harga produk"
                            name="harga_produk" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori_produk" class="form-label"><b>Jenis Produk</b></label>
                        <select class="form-control" id="kategori_produk" name="kategori_produk"
                            aria-label="Pilih Jenis Produk" required>
                            <option disabled selected>Pilih Jenis Produk</option>
                            <option value="Hasil pertanian">Hasil pertanian</option>
                            <option value="Benih dan bibit">Benih dan bibit</option>
                            <option value="Pupuk dan pestisida">Pupuk dan pestisida</option>
                            <option value="Alat dan mesin pertanian">Alat dan mesin pertanian</option>
                            <option value="Produk olahan pertanian">Produk olahan pertanian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar1_produk"><b>Foto 1</b></label><br>
                        <input type="file" class="form-control-file" id="gambar1_produk" name="gambar1_produk"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="gambar2_produk"><b>Foto 2</b></label><br>
                        <input type="file" class="form-control-file" id="gambar2_produk" name="gambar2_produk">
                    </div>
                    <div class="form-group">
                        <label for="gambar3_produk"><b>Foto 3</b></label><br>
                        <input type="file" class="form-control-file" id="gambar3_produk" name="gambar3_produk">
                    </div>
                    <div class="form-group">
                        <label for="shopee_produk"><b>Link Shopee Produk</b></label>
                        <input type="url" class="form-control" id="shopee_produk"
                            placeholder="Masukkan link Shopee produk" name="shopee_produk">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_produk"><b>Deskripsi</b></label>
                        <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan deskripsi" required></textarea>
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
