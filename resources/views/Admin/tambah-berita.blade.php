<!-- Modal Tambah Berita -->
<div class="modal fade" id="tambahBeritaModal" tabindex="-1" role="dialog" aria-labelledby="tambahBeritaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBeritaModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form id="inputForm" action="{{ route('uploadBerita') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="judul"><b>Judul Berita</b></label>
                            <input type="text" class="form-control" id="judul"
                                placeholder="Masukkan judul Berita" name="judul_berita">
                        </div>
                        <div class="form-group">
                            <label for="tanggal"><b>Tanggal Berita</b></label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_berita">
                        </div>
                        <div class="form-group">
                            <label for="foto"><b>Foto Berita</b></label><br>
                            <input type="file" class="form-control-file" id="foto" name="foto_berita">
                        </div>
                        <div class="form-group">
                            <label for="isi"><b>Deskripsi Berita</b></label>
                            <textarea class="form-control" id="isi" name="deskripsi_berita" placeholder="Masukkan deskripsi Berita"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
