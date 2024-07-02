<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboardadmin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminproduk') }}">
                <i class="bi bi-box-seam"></i>
                <span>Produk</span>
            </a>
        </li><!-- End Produk Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminberita') }}">
                <i class="bi bi-newspaper"></i>
                <span>Kabar Tani</span>
            </a>
        </li><!-- End Berita Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminpengguna') }}">
                <i class="bi bi-people"></i>
                <span>Data Pengguna</span>
            </a>
        </li><!-- End Data Pengguna Nav -->

        <li class="nav-item">
            <a class="nav-link " href="{{ route('adminprofil') }}">
                <i class="bi bi-people"></i>
                <span>Profil</span>
            </a>
        </li>

        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link" href="#" onclick="confirmLogout();">
                <i class="bi bi-arrow-right"></i>
                <span>keluar</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi?',
            text: "Anda akan keluar dari sesi ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form when confirmed
                document.getElementById('logout-form').submit();
            }
        });
    }

    @if (session('info'))
        Swal.fire({
            icon: 'info',
            title: 'Info',
            text: '{{ session('info') }}',
            showConfirmButton: true,
            confirmButtonText: 'OK'
        });
    @endif
</script>
