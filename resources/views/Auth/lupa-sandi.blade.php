<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pasar Tani - Ganti Kata Sandi</title>
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
                                        <h5 class="card-title text-center pb-0 fs-4">Reset kata Sandi</h5>
                                        <p class="text-center small">Masukkan kata sandi baru anda</p>
                                    </div>

                                    <form id="resetPasswordForm" class="row g-3 needs-validation" novalidate
                                        method="POST" action="{{ route('update-password') }}">
                                        @csrf

                                        <input type="hidden" name="email" value="{{ $email }}">

                                        <div class="col-12">
                                            <label for="new_password" class="form-label">Kata Sandi Baru</label>
                                            <input type="password" name="new_password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password" required>
                                            @error('new_password')
                                                <div id="newPasswordError" class="invalid-feedback">{{ $message }}
                                                </div>
                                            @enderror
                                            <div id="passwordMessage" class="form-text"></div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi
                                                Baru</label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" required>
                                            @error('password_confirmation')
                                                <div id="passwordConfirmationError" class="invalid-feedback">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const passwordField = document.getElementById('new_password');
                                                const passwordMessage = document.getElementById('passwordMessage');
                                                const passwordConfirmationField = document.getElementById('password_confirmation');
                                                const form = document.getElementById('resetPasswordForm');

                                                function removeSpaces(event) {
                                                    event.target.value = event.target.value.replace(/\s/g, '');
                                                }

                                                function updatePasswordMessage() {
                                                    const password = passwordField.value;

                                                    if (password.length < 8 || password.length > 16) {
                                                        passwordMessage.textContent = 'Kata sandi harus memiliki 8-16 karakter.';
                                                        passwordMessage.className = 'form-text password-invalid';
                                                    } else {
                                                        passwordMessage.textContent = 'Kata sandi memenuhi syarat.';
                                                        passwordMessage.className = 'form-text password-valid';
                                                    }
                                                }

                                                if (passwordField) {
                                                    passwordField.addEventListener('input', removeSpaces);
                                                    passwordField.addEventListener('input', updatePasswordMessage);
                                                }

                                                if (passwordConfirmationField) {
                                                    passwordConfirmationField.addEventListener('input', removeSpaces);
                                                }

                                                // Display SweetAlert2 messages based on session flash data
                                                @if (session('error'))
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error',
                                                        text: "{{ session('error') }}",
                                                        willOpen: () => {
                                                            document.getElementById('newPasswordError').textContent =
                                                                "{{ session('error') }}";
                                                        }
                                                    });
                                                @elseif (session('success'))
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Success',
                                                        text: "{{ session('success') }}",
                                                        willOpen: () => {
                                                            document.getElementById('passwordMessage').textContent =
                                                                "{{ session('success') }}";
                                                        }
                                                    });
                                                @endif
                                            });
                                        </script>

                                        <div class="col-12">
                                            <button class="btn btn-success w-100" type="submit">Simpan Kata Sandi
                                                Baru</button>
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
</body>

</html>
