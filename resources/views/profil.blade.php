<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pasar Tani - Profil</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/LogoPasarTani.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- tabel -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Memuat DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <!-- tabel end -->

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Sidebar ======= -->
    @include('Include.topbar')
    @include('Include.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <!-- <li class="breadcrumb-item">Kabar Desa</li> -->
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <!-- <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="card-title mb-0">Agenda dan Profil</h5>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0 text-md-end text-right">
                            <button type="submit" id="tambah" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profil Pengguna</h5>
                            <form action="{{ route('lengkapi-profil') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan nama Anda" value="{{ old('nama', $user->nama_user) }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Masukkan email Anda" value="{{ old('email', $user->email_user) }}"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Masukkan alamat Anda"
                                        value="{{ old('alamat', $user->alamat_user) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <select class="form-select" id="kecamatan" name="kecamatan" required>
                                        <option value="">Pilih Kecamatan</option>
                                        <option value="Tarokan"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Tarokan' ? 'selected' : '' }}>
                                            Tarokan
                                        </option>
                                        <option value="Grogol"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Grogol' ? 'selected' : '' }}>
                                            Grogol
                                        </option>
                                        <option value="Banyakan"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Banyakan' ? 'selected' : '' }}>
                                            Banyakan
                                        </option>
                                        <option value="Mojo"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Mojo' ? 'selected' : '' }}>
                                            Mojo</option>
                                        <option value="Semen"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Semen' ? 'selected' : '' }}>
                                            Semen</option>
                                        <option value="Ngadiluwih"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Ngadiluwih' ? 'selected' : '' }}>
                                            Ngadiluwih
                                        </option>
                                        <option value="Kras"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kras' ? 'selected' : '' }}>
                                            Kras</option>
                                        <option value="Ringinrejo"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Ringinrejo' ? 'selected' : '' }}>
                                            Ringinrejo</option>
                                        <option value="Kandat"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kandat' ? 'selected' : '' }}>
                                            Kandat
                                        </option>
                                        <option value="Wates"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Wates' ? 'selected' : '' }}>
                                            Wates</option>
                                        <option value="Ngancar"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Ngancar' ? 'selected' : '' }}>
                                            Ngancar
                                        </option>
                                        <option value="Plosoklaten"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Plosoklaten' ? 'selected' : '' }}>
                                            Plosoklaten</option>
                                        <option value="Gurah"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Gurah' ? 'selected' : '' }}>
                                            Gurah</option>
                                        <option value="Puncu"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Puncu' ? 'selected' : '' }}>
                                            Puncu</option>
                                        <option value="Kepung"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kepung' ? 'selected' : '' }}>
                                            Kepung
                                        </option>
                                        <option value="Kandangan"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kandangan' ? 'selected' : '' }}>
                                            Kandangan
                                        </option>
                                        <option value="Pare"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Pare' ? 'selected' : '' }}>
                                            Pare</option>
                                        <option value="Badas"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Badas' ? 'selected' : '' }}>
                                            Badas</option>
                                        <option value="Kunjang"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kunjang' ? 'selected' : '' }}>
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
                                        <option value="Papar"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Papar' ? 'selected' : '' }}>
                                            Papar</option>
                                        <option value="Pagu"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Pagu' ? 'selected' : '' }}>
                                            Pagu</option>
                                        <option value="Kayenkidul"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Kayenkidul' ? 'selected' : '' }}>
                                            Kayenkidul</option>
                                        <option value="Gampengrejo"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Gampengrejo' ? 'selected' : '' }}>
                                            Gampengrejo</option>
                                        <option value="Ngasem"
                                            {{ old('kecamatan', $user->kecamatan_user ?? '') == 'Ngasem' ? 'selected' : '' }}>
                                            Ngasem
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telp</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="Masukkan nomor telepon Anda"
                                        value="{{ old('no_telp', $user->notelp_user) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto_user"
                                        accept="image/*" {{ $user->foto ? '' : 'required' }}>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <!-- tabel -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Memuat DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>


    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/mainjs.js') }}"></script>


    <!-- kalau mau ubah js tabel di sini -->
    <script src="{{ asset('assets/js/tabel.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputForm = document.getElementById('inputForm');
            inputForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(inputForm);

                fetch(inputForm.getAttribute('action'), {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Agenda berhasil ditambahkan.'
                            }).then((result) => {
                                if (result.isConfirmed || result.isDismissed) {
                                    window.location.reload();
                                }
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>


</body>

</html>
