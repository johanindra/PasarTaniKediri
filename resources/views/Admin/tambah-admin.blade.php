<!-- Modal Tambah Admin -->
<div class="modal fade" id="tambahAdminModal" tabindex="-1" role="dialog" aria-labelledby="tambahAdminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inputForm" action="{{ route('AddAdmin') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="email_user"><b>Email</b></label>
                        <input type="email" class="form-control" id="email_user" placeholder="Masukkan email admin"
                            name="email_user" value="{{ old('email_user') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_user"><b>Nama</b></label>
                        <input type="text" class="form-control" id="nama_user" placeholder="Masukkan nama admin"
                            name="nama_user" value="{{ old('nama_user') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password"
                            name="password" required>
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
