<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pasar Tani - Masuk</title>
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

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .btn-back {
            color: #86A789;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-weight: bold;
            margin-bottom: 20px;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
            font-size: 25px;
            /* Ukuran ikon */
        }

        .btn-back:hover {
            color: #445D48;
        }

        .btn-back .bi-arrow-left {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <a href="{{ url('/') }}" class="btn btn-back">
        <i class="bi bi-arrow-left"></i>
    </a>
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
                                        <h5 class="card-title text-center pb-0 fs-4">Masuk</h5>
                                        <p class="text-center small">Masukkan email dan kata sandi untuk masuk</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate method="POST"
                                        action="{{ route('login') }}">
                                        @csrf

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email_user"
                                                    class="form-control @error('email_user') is-invalid @enderror"
                                                    id="yourEmail" value="{{ old('email_user') }}" required>
                                                <div class="invalid-feedback">Masukkan email Anda.</div>
                                            </div>
                                            @error('email_user')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Kata Sandi</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="yourPassword" required>
                                            <div class="invalid-feedback">Masukkan kata sandi Anda.</div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <p class="small mb-0"><a href="{{ route('verifikasi-email') }}">Lupa Kata
                                                    Sandi?</a></p>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-success w-100" type="submit">Masuk</button>
                                        </div>

                                        <div class="col-12">
                                            <p class="small mb-0">Belum punya akun? <a href="#"
                                                    id="daftarLink">Buat akun</a></p>
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Cek jika ada pesan error untuk login
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('daftarLink').addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Daftar sebagai?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Kelompok Tani',
                    cancelButtonText: 'Masyarakat'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to daftar-tani route
                        window.location.href = "{{ route('daftar-tani') }}";
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Redirect to daftar route
                        window.location.href = "{{ route('daftar') }}";
                    }
                });
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

</body>

</html>
