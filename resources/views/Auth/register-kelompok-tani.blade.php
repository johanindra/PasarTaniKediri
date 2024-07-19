<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pasar Tani - Daftar Kelompok Tani</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .password-valid {
            color: blue;
        }

        .password-invalid {
            color: red;
        }
    </style>
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Pasar Tani Kediri</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Buat akun Kelompok Tani</h5>
                                        <p class="text-center small">Lengkapi data di bawah untuk membuat akun</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate method="POST"
                                        action="{{ route('registerkelompok.post') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="nama_user" class="form-label">Nama Kelompok Tani</label>
                                            <input type="text" name="nama_user"
                                                class="form-control @error('nama_user') is-invalid @enderror"
                                                placeholder="Contoh: Sido Tani" id="nama_user"
                                                value="{{ old('nama_user') }}" required>
                                            @error('nama_user')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="invalid-feedback">Masukkan nama kelompok tani anda.</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="email_user" class="form-label">Email</label>
                                            <input type="email" name="email_user"
                                                class="form-control @error('email_user') is-invalid @enderror"
                                                placeholder="Contoh: kelompoktani@gmail.com" id="email_user"
                                                value="{{ old('email_user') }}" required>
                                            @error('email_user')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="invalid-feedback">Masukkan email kelompok tani.</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="npwp" class="form-label">NPWP</label>
                                            <input type="text" name="npwp"
                                                class="form-control @error('npwp') is-invalid @enderror" id="npwp"
                                                placeholder="Contoh: 0123456789123000" value="{{ old('npwp') }}"
                                                required pattern="\d*" title="NPWP hanya boleh mengandung angka">
                                            @error('npwp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="invalid-feedback">Masukkan NPWP kelompok tani.</div>
                                            @enderror
                                        </div>

                                        <script>
                                            document.getElementById('npwp').addEventListener('input', function(e) {
                                                // Menghapus karakter yang bukan angka
                                                this.value = this.value.replace(/\D/g, '');
                                            });
                                        </script>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Kata Sandi</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="invalid-feedback">Masukkan kata sandi.</div>
                                            @enderror
                                            <div id="passwordMessage" class="form-text"></div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const passwordField = document.getElementById('password');
                                                const passwordMessage = document.getElementById('passwordMessage');

                                                function updatePasswordMessage() {
                                                    const password = passwordField.value;

                                                    if (password.length < 8 && password.length > 0) {
                                                        passwordMessage.textContent = 'Kata sandi harus memiliki minimal 8 karakter.';
                                                        passwordMessage.className = 'form-text password-invalid'; // Apply invalid class
                                                    } else if (password.length >= 8) {
                                                        passwordMessage.textContent = 'Kata sandi memenuhi syarat.';
                                                        passwordMessage.className = 'form-text password-valid'; // Apply valid class
                                                    } else {
                                                        passwordMessage.textContent = ''; // Clear message if password is empty
                                                    }
                                                }

                                                if (passwordField) {
                                                    passwordField.addEventListener('input', updatePasswordMessage);
                                                }
                                            });
                                        </script>

                                        <div class="col-12">
                                            <label for="password_confirmation" class="form-label">Konfirmasi Kata
                                                Sandi</label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" required>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="invalid-feedback">Konfirmasi kata sandi.</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Daftar</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Sudah punya akun? <a
                                                    href="{{ route('login') }}">Masuk</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                onClose: () => {
                    window.location.href = '{{ route('login') }}';
                }
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif


    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ada Kesalahan!',
                html: `
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
