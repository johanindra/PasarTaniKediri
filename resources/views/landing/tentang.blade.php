@extends('navbar.main')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Tentang</h1>
                            {{-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                                voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                                Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb-list">
                        <li><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="current">Tentang</li>
                    </ol>
                    
                </div>
            </nav>
        </div><!-- End Page Title -->
        <!-- Faq Section -->
    <section id="faq" class="faq section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          {{-- <h2>F.A.Q</h2> --}}
          <p>Sekilas Mengenai Pasar Tani Kediri</p>
        </div><!-- End Section Title -->
  
        <div class="container">
  
          <div class="row">
  
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
  
              <div class="faq-container">
  
                <div class="faq-item faq-active">
                  <h3>Apa itu Pasar Tani Kediri?</h3>
                  <div class="faq-content">
                    <p>Website Pasar Tani Kediri adalah platform inovatif yang dirancang untuk memasarkan produk pertanian secara efisien. Dengan antarmuka yang ramah pengguna, website ini memungkinkan pengguna maupun kelompok tani untuk menampilkan berbagai produk pertanian mereka dengan mudah. Pengguna dapat mengeksplorasi berbagai fitur menarik setelah membuat akun pada website, termasuk manajemen produk, pemantauan penjualan, dan akses ke fitur tambahan yang mempermudah transaksi dan komunikasi. Pasar Tani Kediri bertujuan untuk meningkatkan visibilitas produk pertanian dan mendukung pertumbuhan sektor pertanian di Kabupaten Kediri.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                <div class="faq-item">
                  <h3>Apakah perlu membuat akun terlebih dahulu sebelum melakukan pemasaran produk?</h3>
                  <div class="faq-content">
                    <p>Ya, sebaiknya Anda membuat akun terlebih dahulu sebelum melakukan pemasaran produk. Dengan membuat akun, Anda akan mendapatkan akses ke berbagai fitur yang dapat mendukung strategi pemasaran Anda, seperti fitur produk dan fitur kabar tani. Fitur produk memungkinkan Anda untuk mengelola dan mempromosikan produk secara efektif, sedangkan fitur kabar tani dapat membantu Anda tetap terhubung dengan perkembangan terbaru dalam industri pertanian dan mendapatkan informasi penting yang dapat digunakan dalam pemasaran. Dengan memiliki akun, Anda juga bisa memanfaatkan berbagai alat dan sumber daya yang tersedia untuk memaksimalkan jangkauan dan dampak dari pemasaran produk Anda.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                <div class="faq-item">
                  <h3>Bagaimana cara unggah produk?</h3>
                  <div class="faq-content">
                    <p>Untuk mengunggah produk, langkah pertama adalah membuat akun terlebih dahulu. Setelah mendaftar, Anda perlu memilih level pengguna sebagai masyarakat atau kelompok tani sesuai dengan kebutuhan. Dengan akun yang sudah terdaftar, Anda akan mendapatkan akses lebih luas ke fitur produk. Anda dapat memanfaatkan fitur ini untuk menambahkan produk baru, mengedit produk yang sudah ada, atau menghapus produk yang tidak diperlukan. Setiap fitur dapat disesuaikan dengan alamat pengguna, memastikan bahwa informasi produk yang Anda unggah relevan dan akurat. Proses ini memungkinkan Anda untuk mengelola dan memperbarui data produk secara efektif.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
              </div>
  
            </div><!-- End Faq Column-->
  
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
  
              <div class="faq-container">
  
                <div class="faq-item">
                  <h3>Bagaimana unggah kabar tani bagi kelompok tani?</h3>
                  <div class="faq-content">
                    <p>Untuk mengunggah kabar tani, langkah pertama adalah membuat akun terlebih dahulu dan memilih level pengguna sebagai kelompok tani. Setelah akun Anda aktif, Anda akan mendapatkan akses ke fitur kabar tani. Dengan fitur ini, Anda dapat menambahkan informasi terbaru tentang kegiatan pertanian, berita, atau update penting yang relevan dengan kelompok tani Anda. Anda juga dapat mengedit atau menghapus kabar tani yang sudah ada jika diperlukan. Proses ini memungkinkan kelompok tani untuk berbagi informasi yang bermanfaat dan terkini kepada anggota dan masyarakat, meningkatkan komunikasi dan koordinasi dalam aktivitas pertanian.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                <div class="faq-item">
                  <h3>Untuk dapat mengetahui lebih dalam mengenai penggunaan website, anda dapat mengakses link dibawah ini!</h3>
                  <div class="faq-content">
                    <p>LINK MENYUSUL</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                
  
              </div>
  
            </div><!-- End Faq Column-->
  
          </div>
  
        </div>
  
      </section><!-- /Faq Section -->

    


    </main>
@endsection
