<!-- Modal Edit Berita -->
@foreach ($berita as $b)
    <div class="modal fade" id="editBeritaModal{{ $b->id_berita }}" tabindex="-1" role="dialog"
        aria-labelledby="editBeritaModalLabel{{ $b->id_berita }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBeritaModalLabel{{ $b->id_berita }}">Edit
                        Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm{{ $b->id_berita }}" action="{{ route('updateBerita', ['id' => $b->id_berita]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul"><b>Judul Berita</b></label>
                            <input type="text" class="form-control" id="judul" name="judul_berita"
                                value="{{ $b->judul_berita }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal"><b>Tanggal Berita</b></label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_berita"
                                value="{{ $b->tanggal_berita }}">
                        </div>
                        <div class="form-group">
                            <label for="foto"><b>Foto Berita</b></label><br>
                            <input type="file" class="form-control-file" id="foto" name="foto_berita">
                            <img src="{{ url('/Kabar Tani/' . $b->foto_berita) }}" alt="{{ $b->judul_berita }}"
                                width="100">
                        </div>
                        <div class="form-group">
                            <label for="isi"><b>Deskripsi Berita</b></label>
                            <textarea class="form-control" id="isi" name="deskripsi_berita">{{ $b->deskripsi_berita }}</textarea>
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
@endforeach
