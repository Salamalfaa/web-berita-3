@extends('user.layouts.app')

@section('title', 'Beranda - Portal Berita')

@section('content')
<div class="container my-5">
    <!-- Hero Section -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h1 class="display-4 font-weight-bold text-primary mb-3">
                Selamat Datang di Portal Berita
            </h1>
            <p class="lead text-muted mb-4">
                Dapatkan berita terkini dan informasi penting dari berbagai kategori. Kami berkomitmen memberikan berita berkualitas yang dapat dipercaya.
            </p>
            <div>
                <a href="#daftar-berita" class="btn btn-primary btn-lg mr-2">
                    <i class="fas fa-newspaper mr-2"></i>Baca Berita
                </a>
                <a href="/tentang" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-info-circle mr-2"></i>Tentang Kami
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="text-center">
                <i class="fas fa-newspaper" style="font-size: 150px; color: #007bff; opacity: 0.2;"></i>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <!-- Daftar Berita Terbaru -->
    <section id="daftar-berita">
        <h2 class="h2 font-weight-bold mb-4">
            <i class="fas fa-bolt text-warning mr-2"></i>Berita Terbaru
        </h2>

        @if(isset($articles) && $articles->count() > 0)
        <div class="row">
            @foreach($articles as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm border-0 transition" style="transition: all 0.3s ease;">
                    <!-- Gambar Artikel -->
                    @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" 
                         class="card-img-top" 
                         alt="{{ $article->title }}"
                         style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-light d-flex align-items-center justify-content-center" 
                         style="height: 200px; background-color: #e9ecef;">
                        <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                    </div>
                    @endif

                    <div class="card-body">
                        <!-- Kategori Badge -->
                        @if($article->category)
                        <span class="badge badge-primary mb-2">{{ $article->category->name }}</span>
                        @endif

                        <!-- Judul -->
                        <h5 class="card-title font-weight-bold">
                            <a href="{{ route('articles.show', $article->slug) }}" class="text-decoration-none text-dark">
                                {{ Str::limit($article->title, 60) }}
                            </a>
                        </h5>

                        <!-- Preview Konten -->
                        <p class="card-text text-muted small">
                            {{ Str::limit(strip_tags($article->content), 100) }}
                        </p>
                    </div>

                    <div class="card-footer bg-light border-top-0">
                        <small class="text-muted d-block">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            {{ $article->created_at->format('d M Y') }}
                        </small>
                        <small class="text-muted d-block">
                            <i class="fas fa-pen-fancy mr-1"></i>
                            {{ $article->user->name }}
                        </small>
                        <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-outline-primary mt-2 w-100">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle mr-2"></i>
            Belum ada berita yang tersedia. Silakan kembali lagi nanti.
        </div>
        @endif
    </section>
</div>

<style>
    .card {
        transition: all 0.3s ease !important;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }

    .card-title a {
        transition: color 0.3s ease;
    }

    .card-title a:hover {
        color: #007bff !important;
    }
</style>
@endsection
