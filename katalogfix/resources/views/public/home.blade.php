@extends('layouts.public')

@section('title', 'Home - ' . ($setting->site_name ?? 'Katalog Produk'))

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Selamat Datang di {{ $setting->site_name ?? 'Katalog Produk' }}</h1>
                <p>{{ $setting->description ?? 'Temukan berbagai produk berkualitas dengan harga terbaik' }}</p>
                <div class="hero-buttons" style = "display: flex; gap: 15px; margin-top: 20px;">
                    <a href="{{ route('catalog') }}" class="btn btn-light">🛒 Lihat Katalog</a>
                    <a href="https://wa.me/{{ $setting->whatsapp ?? '62xxxxx' }}" class="btn btn-success" target="_blank">💬 Hubungi Kami</a>
                </div>
            </div>
            <div class="hero-icon">
                <div style="font-size: 200px; text-align: center; opacity: 0.2;">🏪</div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Produk Unggulan</h2>
            <p>Pilihan produk terbaik untuk Anda</p>
        </div>
        
        @if($products->count() > 0)
        <div class="grid grid-3">
            @foreach($products as $product)
            <div class="card">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img">
                @else
                <div style="height: 250px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                    📦
                </div>
                @endif
                <div class="card-body">
                    <span class="badge badge-primary">{{ $product->category->name }}</span>
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <p class="card-text">{{ substr($product->description, 0, 80) }}...</p>
                    @if($product->price)
                    <p style="color: #667eea; font-size: 1.3rem; font-weight: bold; margin-bottom: 15px;">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    @endif
                    <a href="{{ route('product.detail', $product->id) }}" class="btn btn-primary" style="width: 100%;">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('catalog') }}" class="btn btn-primary" style="padding: 15px 40px; font-size: 1.1rem;">
                Lihat Semua Produk →
            </a>
        </div>
        @else
        <div style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 10px;">
            <div style="font-size: 4rem; margin-bottom: 20px;">📭</div>
            <h3>Belum Ada Produk</h3>
            <p style="color: #666;">Produk akan segera ditambahkan</p>
        </div>
        @endif
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-header">
            <h2>Mengapa Memilih Kami?</h2>
        </div>
        <div class="grid grid-3">
            <div style="text-align: center; padding: 30px;">
                <div style="font-size: 4rem; margin-bottom: 20px;">✅</div>
                <h3 style="margin-bottom: 10px;">Produk Berkualitas</h3>
                <p style="color: #666;">Kami hanya menyediakan produk dengan kualitas terbaik</p>
            </div>
            <div style="text-align: center; padding: 30px;">
                <div style="font-size: 4rem; margin-bottom: 20px;">🚚</div>
                <h3 style="margin-bottom: 10px;">Pengiriman Cepat</h3>
                <p style="color: #666;">Pengiriman cepat dan aman ke seluruh Indonesia</p>
            </div>
            <div style="text-align: center; padding: 30px;">
                <div style="font-size: 4rem; margin-bottom: 20px;">🎧</div>
                <h3 style="margin-bottom: 10px;">Layanan 24/7</h3>
                <p style="color: #666;">Tim kami siap melayani Anda kapan saja</p>
            </div>
        </div>
    </div>
</section>
@endsection
