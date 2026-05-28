@extends('user.layouts.app')

@section('title', 'Tentang Kami - Portal Berita')

@section('content')
<div class="container my-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 font-weight-bold text-primary mb-3">
                Tentang Portal Berita
            </h1>
            <p class="lead text-muted">
                Kami adalah platform berita digital modern yang menyediakan informasi terkini dan berkualitas untuk masyarakat Indonesia.
            </p>
        </div>
    </div>

    <!-- Visi Misi Section -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h3 class="card-title text-primary font-weight-bold mb-3">
                        <i class="fas fa-eye mr-2"></i>Visi Kami
                    </h3>
                    <p class="card-text text-muted">
                        Menjadi portal berita terdepan dalam memberikan informasi akurat, terpercaya, dan relevan kepada semua lapisan masyarakat Indonesia dengan memanfaatkan teknologi terkini.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h3 class="card-title text-primary font-weight-bold mb-3">
                        <i class="fas fa-bullseye mr-2"></i>Misi Kami
                    </h3>
                    <p class="card-text text-muted">
                        Memberikan liputan berita berkualitas tinggi, transparan, dan objektif untuk mendukung partisipasi aktif masyarakat dalam kehidupan sosial, politik, dan ekonomi.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Nilai Kami -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <h2 class="h2 font-weight-bold mb-4 text-center">Nilai-Nilai Kami</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas fa-shield-alt text-white" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="font-weight-bold mb-2">Akurasi dan Kebenaran</h5>
                            <p class="text-muted small">Kami berkomitmen menyajikan berita yang akurat dan telah diverifikasi dari sumber terpercaya.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas fa-balance-scale text-white" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="font-weight-bold mb-2">Keadilan dan Objektifitas</h5>
                            <p class="text-muted small">Kami menyajikan berbagai perspektif tanpa bias dan memastikan perlakuan yang adil terhadap semua pihak.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas fa-lock text-white" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="font-weight-bold mb-2">Keamanan Data</h5>
                            <p class="text-muted small">Data dan privasi Anda adalah prioritas utama kami dengan sistem keamanan terkini.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas fa-users text-white" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="font-weight-bold mb-2">Komunitas yang Sehat</h5>
                            <p class="text-muted small">Kami mendorong dialog konstruktif dan menolak segala bentuk ujaran kebencian serta diskriminasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hubungi Kami -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body p-5">
                    <h2 class="h2 font-weight-bold mb-4 text-center">Hubungi Kami</h2>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="text-center">
                                <i class="fas fa-envelope text-primary" style="font-size: 2rem;"></i>
                                <h5 class="font-weight-bold mt-3">Email</h5>
                                <p class="text-muted">
                                    <a href="mailto:info@portalberita.com" class="text-decoration-none">
                                        info@portalberita.com
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="text-center">
                                <i class="fas fa-phone text-primary" style="font-size: 2rem;"></i>
                                <h5 class="font-weight-bold mt-3">Telepon</h5>
                                <p class="text-muted">
                                    <a href="tel:+621234567890" class="text-decoration-none">
                                        +62 (123) 456-7890
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <a href="/beranda" class="btn btn-primary">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
