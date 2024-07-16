<!-- Modal Edit Produk -->
@foreach ($produk as $p)
    <div class="modal fade" id="editProdukModal{{ $p->id_produk }}" tabindex="-1" role="dialog"
        aria-labelledby="editProdukModalLabel{{ $p->id_produk }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProdukModalLabel{{ $p->id_produk }}">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm{{ $p->id_produk }}" action="{{ route('updateProduk', ['id' => $p->id_produk]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_produk"><b>Nama Produk</b></label>
                            <input type="text" class="form-control" id="nama_produk"
                                placeholder="Masukkan nama produk" name="nama_produk" value="{{ $p->nama_produk }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="harga_produk"><b>Harga Produk</b></label>
                            <input type="number" class="form-control" id="harga_produk"
                                placeholder="Masukkan harga produk" name="harga_produk" value="{{ $p->harga_produk }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="kategori_produk" class="form-label"><b>Jenis Produk</b></label>
                            <select class="form-control" id="kategori_produk" name="kategori_produk"
                                aria-label="Pilih Jenis Produk" required>
                                <option disabled>Pilih Jenis Produk</option>
                                <option value="Hasil pertanian"
                                    {{ $p->kategori_produk == 'Hasil pertanian' ? 'selected' : '' }}>Hasil pertanian
                                </option>
                                <option value="Benih dan bibit"
                                    {{ $p->kategori_produk == 'Benih dan bibit' ? 'selected' : '' }}>Benih dan bibit
                                </option>
                                <option value="Pupuk dan pestisida"
                                    {{ $p->kategori_produk == 'Pupuk dan pestisida' ? 'selected' : '' }}>Pupuk dan
                                    pestisida</option>
                                <option value="Alat dan mesin pertanian"
                                    {{ $p->kategori_produk == 'Alat dan mesin pertanian' ? 'selected' : '' }}>Alat dan
                                    mesin pertanian</option>
                                <option value="Produk olahan pertanian"
                                    {{ $p->kategori_produk == 'Produk olahan pertanian' ? 'selected' : '' }}>Produk
                                    olahan pertanian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar1_produk"><b>Foto 1</b></label><br>
                            <input type="file" class="form-control-file" id="gambar1_produk" name="gambar1_produk">
                            <img src="{{ url('/Produk/' . $p->gambar1_produk) }}" alt="{{ $p->nama_produk }}"
                                width="100">
                        </div>
                        <div class="form-group">
                            <label for="gambar2_produk"><b>Foto 2</b></label><br>
                            <input type="file" class="form-control-file" id="gambar2_produk" name="gambar2_produk">
                            <img src="{{ url('/Produk/' . $p->gambar2_produk) }}" alt="{{ $p->nama_produk }}"
                                width="100">
                        </div>
                        <div class="form-group">
                            <label for="gambar3_produk"><b>Foto 3</b></label><br>
                            <input type="file" class="form-control-file" id="gambar3_produk" name="gambar3_produk">
                            <img src="{{ url('/Produk/' . $p->gambar3_produk) }}" alt="{{ $p->nama_produk }}"
                                width="100">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_produk"><b>Deskripsi</b></label>
                            <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan deskripsi" required>{{ $p->deskripsi_produk }}</textarea>
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
@endforeach
