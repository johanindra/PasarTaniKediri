<form action="{{ route('update-profil') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email Anda"
            value="{{ old('email', $user->email_user) }}" readonly>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda"
            value="{{ old('nama', $user->nama_user) }}" required>
    </div>
    @if (auth()->user()->hasRole(['kelompok_tani']))
        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Masukkan NPWP"
                value="{{ old('npwp', $user->npwp) }}" required>
        </div>
    @endif
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
        <label for="maps_user" class="form-label">Lokasi (Maps)</label>
        <input type="text" class="form-control" id="maps_user" name="maps_user"
            placeholder="Masukkan link lokasi Anda" value="{{ old('maps_user', $user->maps_user) }}">
        <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
        <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">
        <button type="button" class="btn btn-secondary mt-2" onclick="getCurrentLocation()">Ambil Lokasi
            Terkini</button>
        {{-- <div id="googleMap" style="width:100%;height:400px;margin-top:15px;"></div> --}}
    </div>
    <div class="mb-3">
        <label for="instagram_user" class="form-label">Instagram</label>
        <input type="text" class="form-control" id="instagram_user" name="instagram_user"
            placeholder="Masukkan username Instagram Anda"
            value="{{ old('instagram_user', $user->instagram_user) }}">
    </div>
    <div class="mb-3">
        <label for="facebook_user" class="form-label">Facebook</label>
        <input type="text" class="form-control" id="facebook_user" name="facebook_user"
            placeholder="Masukkan username Facebook Anda" value="{{ old('facebook_user', $user->facebook_user) }}">
    </div>
    <div class="mb-3">
        <label for="link_user" class="form-label">Link Lain</label>
        <input type="text" class="form-control" id="link_user" name="link_user"
            placeholder="Masukkan link lain Anda" value="{{ old('link_user', $user->link_user) }}">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto_user" accept="image/*">
        @if ($user->foto_user)
            <img src="{{ url('/Foto Profil User/' . $user->foto_user) }}" alt="{{ $user->nama_user }}"
                width="100">
        @endif
    </div>

    <button type="submit" class="btn btn-primary w-100">Simpan</button>
</form>
@if (auth()->user()->hasRole(['admin', 'masyarakat', 'kelompok_tani']) &&
        auth()->user()->email_user != 'pasartanikediri@gmail.com')
    <form action="{{ route('hapus-akun', ['id_user' => auth()->user()->id_user]) }}" method="POST"
        id="hapusAkunForm">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger w-100 mt-2" id="hapusAkunButton">Hapus Akun</button>
    </form>
@endif
<script>
    function getCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;
        document.getElementById('maps_user').value = `https://www.google.com/maps?q=${latitude},${longitude}`;
        initMap(latitude, longitude);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }

    function initMap(latitude, longitude) {
        var mapProp = {
            center: new google.maps.LatLng(latitude, longitude),
            zoom: 15,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, longitude),
            map: map
        });
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        if (document.getElementById('latitude').value && document.getElementById('longitude').value) {
            initMap(document.getElementById('latitude').value, document.getElementById('longitude').value);
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
