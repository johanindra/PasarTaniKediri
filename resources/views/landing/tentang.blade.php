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
                            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                                voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                                Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb-list">
                        <li><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="current">Produk</li>
                    </ol>
                    
                </div>
            </nav>
        </div><!-- End Page Title -->

    


    </main>
@endsection
