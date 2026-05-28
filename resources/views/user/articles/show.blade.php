@extends('user.layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Gambar Sampul Berita Responsif -->
            @if($article->image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $article->image) }}" 
                     alt="{{ $article->title }}" 
                     class="img-fluid rounded shadow-lg" 
                     style="width: 100%; height: auto; max-height: 500px; object-fit: cover;">
            </div>
            @endif

            <!-- Judul Artikel -->
            <h1 class="mb-3 text-dark font-weight-bold">{{ $article->title }}</h1>

            <!-- Meta Informasi (Kategori, Tanggal, Penulis) -->
            <div class="mb-4 pb-3 border-bottom">
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <!-- Kategori -->
                    @if($article->category)
                    <span class="badge badge-primary" style="font-size: 0.9rem; padding: 0.5rem 1rem;">
                        <i class="fas fa-folder mr-1"></i>{{ $article->category->name }}
                    </span>
                    @endif

                    <!-- Tanggal Publikasi -->
                    <span class="text-muted">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        {{ $article->created_at->format('d F Y') }}
                    </span>

                    <!-- Penulis -->
                    <span class="text-muted">
                        <i class="fas fa-pen-fancy mr-1"></i>
                        {{ $article->user->name }}
                    </span>
                </div>

                <!-- Tags -->
                @if($article->tags->count() > 0)
                <div class="mt-3">
                    @foreach($article->tags as $tag)
                    <span class="badge badge-secondary mr-2 mb-2" style="padding: 0.5rem 0.8rem;">
                        #{{ $tag->name }}
                    </span>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Konten Artikel Berita -->
            <article class="mb-5 article-content">
                <div class="text-justify" style="line-height: 1.8; color: #333; font-size: 1rem;">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </article>

            <!-- Divider -->
            <hr class="my-5">

            <!-- Kotak Informasi Profil Penulis -->
            <div class="card shadow-sm border-0 mb-5">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start">
                        <!-- Avatar Penulis -->
                        <div class="mr-4">
                            @if($article->user->profile && $article->user->profile->avatar)
                                <img src="{{ asset('storage/' . $article->user->profile->avatar) }}" 
                                     alt="{{ $article->user->name }}" 
                                     class="rounded-circle" 
                                     style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #007bff;">
                            @else
                                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" 
                                     style="width: 100px; height: 100px; color: white;">
                                    <i class="fas fa-user fa-2x"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Info Penulis -->
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1 font-weight-bold text-dark">
                                {{ $article->user->name }}
                            </h5>

                            <!-- Nomor Telepon Penulis -->
                            @if($article->user->profile && $article->user->profile->phone_number)
                            <p class="mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-phone mr-2"></i>
                                    <a href="tel:{{ $article->user->profile->phone_number }}" class="text-decoration-none">
                                        {{ $article->user->profile->phone_number }}
                                    </a>
                                </small>
                            </p>
                            @endif

                            <!-- Biografi Penulis -->
                            @if($article->user->profile && $article->user->profile->biography)
                            <p class="card-text text-justify mb-0" style="line-height: 1.6; color: #555;">
                                <i class="fas fa-quote-left text-primary mr-2"></i>
                                {{ $article->user->profile->biography }}
                            </p>
                            @else
                            <p class="card-text text-muted mb-0">
                                <em>Biografi penulis belum tersedia.</em>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="mb-5">
                <a href="/beranda" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .article-content {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }

    .article-content img {
        max-width: 100%;
        height: auto;
        margin: 1.5rem 0;
        border-radius: 0.5rem;
    }

    .badge {
        font-weight: 500;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endsection
