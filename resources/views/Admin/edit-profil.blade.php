<form action="{{ route('lengkapi-profil') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda"
            value="{{ old('nama', $user->nama_user) }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email Anda"
            value="{{ old('email', $user->email_user) }}" readonly>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat Anda"
            value="{{ old('alamat', $user->alamat_user) }}" required>
    </div>
    <div class="mb-3">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <select class="form-select" id="kecamatan" name="kecamatan" required>
            <option value="">Pilih Kecamatan</option>
            <option value="Tarokan" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Tarokan' ? 'selected' : '' }}>
                Tarokan
            </option>
            <option value="Grogol" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Grogol' ? 'selected' : '' }}>
                Grogol
            </option>
            <option value="Banyakan"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Banyakan' ? 'selected' : '' }}>
                Banyakan
            </option>
            <option value="Mojo" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Mojo' ? 'selected' : '' }}>
                Mojo</option>
            <option value="Semen" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Semen' ? 'selected' : '' }}>
                Semen</option>
            <option value="Ngadiluwih"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Ngadiluwih' ? 'selected' : '' }}>
                Ngadiluwih
            </option>
            <option value="Kras" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kras' ? 'selected' : '' }}>
                Kras</option>
            <option value="Ringinrejo"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Ringinrejo' ? 'selected' : '' }}>
                Ringinrejo</option>
            <option value="Kandat" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kandat' ? 'selected' : '' }}>
                Kandat
            </option>
            <option value="Wates" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Wates' ? 'selected' : '' }}>
                Wates</option>
            <option value="Ngancar" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Ngancar' ? 'selected' : '' }}>
                Ngancar
            </option>
            <option value="Plosoklaten"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Plosoklaten' ? 'selected' : '' }}>
                Plosoklaten</option>
            <option value="Gurah" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Gurah' ? 'selected' : '' }}>
                Gurah</option>
            <option value="Puncu" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Puncu' ? 'selected' : '' }}>
                Puncu</option>
            <option value="Kepung" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kepung' ? 'selected' : '' }}>
                Kepung
            </option>
            <option value="Kandangan"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kandangan' ? 'selected' : '' }}>
                Kandangan
            </option>
            <option value="Pare" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Pare' ? 'selected' : '' }}>
                Pare</option>
            <option value="Badas" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Badas' ? 'selected' : '' }}>
                Badas</option>
            <option value="Kunjang" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kunjang' ? 'selected' : '' }}>
                Kunjang
            </option>
            <option value="Plemahan"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Plemahan' ? 'selected' : '' }}>
                Plemahan
            </option>
            <option value="Purwoasri"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Purwoasri' ? 'selected' : '' }}>
                Purwoasri
            </option>
            <option value="Papar" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Papar' ? 'selected' : '' }}>
                Papar</option>
            <option value="Pagu" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Pagu' ? 'selected' : '' }}>
                Pagu</option>
            <option value="Kayenkidul"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kayenkidul' ? 'selected' : '' }}>
                Kayenkidul</option>
            <option value="Gampengrejo"
                {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Gampengrejo' ? 'selected' : '' }}>
                Gampengrejo</option>
            <option value="Ngasem" {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Ngasem' ? 'selected' : '' }}>
                Ngasem
            </option>
        </select>
    </div>
    <div class="mb-3">
        <label for="no_telp" class="form-label">No Telp</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp"
            placeholder="Masukkan nomor telepon Anda" value="{{ old('no_telp', $user->notelp_user) }}" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto_user" accept="image/*"
            {{ $user->foto ? '' : 'required' }}>
    </div>
    <button type="submit" class="btn btn-primary w-100">Simpan</button>
</form>
