@extends('layouts.public')

@section('title', 'Tentang Kami - ' . ($setting->site_name ?? 'Katalog Produk'))

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0;
    }
    
    .about-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
        margin-bottom: 60px;
    }
    
    .about-image {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        padding: 60px;
        text-align: center;
        color: white;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    
    .about-text h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }
    
    .about-text p {
        color: #555;
        line-height: 1.8;
        font-size: 1.1rem;
    }
    
    .vision-mission {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 60px;
    }
    
    .vm-card {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    
    .vm-icon {
        font-size: 3rem;
        margin-bottom: 20px;
        color: #667eea;
    }
    
    .vm-card h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
    }
    
    .vm-card p,
    .vm-card ul {
        color: #555;
        line-height: 1.8;
    }
    
    .vm-card ul {
        list-style-position: inside;
    }
    
    .values-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        margin-top: 40px;
    }
    
    .value-item {
        text-align: center;
        padding: 30px 20px;
    }
    
    .value-item .icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }
    
    .cta-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0;
        text-align: center;
        border-radius: 10px;
    }
    
    .cta-section h2 {
        font-size: 2rem;
        margin-bottom: 15px;
    }
    
    .cta-section p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }
    
    @media (max-width: 768px) {
        .about-content,
        .vision-mission,
        .values-grid {
            grid-template-columns: 1fr;
        }
    }
    
    @media (min-width: 769px) and (max-width: 1024px) {
        .values-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection

@section('content')
<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container">
        <h1 style="font-size: 2.5rem; margin-bottom: 10px;">Tentang Kami</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Kenali lebih dekat tentang kami</p>
    </div>
</div>

<!-- ABOUT CONTENT -->
<section class="section">
    <div class="container">
        <div class="about-content">
            <div class="about-image">
                @if($setting && $setting->logo)
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->site_name }}" style="max-width: 100%; border-radius: 10px;">
                @else
                <div>
                    <div style="font-size: 5rem; margin-bottom: 20px;">🏪</div>
                    <h2>{{ $setting->site_name ?? 'Katalog Produk' }}</h2>
                </div>
                @endif
            </div>
            <div class="about-text">
                <h2>{{ $setting->site_name ?? 'Katalog Produk' }}</h2>
                <p>{{ $setting->description ?? 'Kami adalah penyedia produk berkualitas dengan komitmen untuk memberikan pelayanan terbaik kepada pelanggan.' }}</p>
            </div>
        </div>
        
        <!-- VISION & MISSION -->
        <div class="vision-mission">
            <div class="vm-card">
                <div class="vm-icon">👁️</div>
                <h3>Visi Kami</h3>
                <p>Menjadi penyedia produk terpercaya dan terdepan yang memberikan solusi terbaik untuk kebutuhan pelanggan dengan standar kualitas tertinggi.</p>
            </div>
            <div class="vm-card">
                <div class="vm-icon">🎯</div>
                <h3>Misi Kami</h3>
                <ul>
                    <li>Menyediakan produk berkualitas tinggi</li>
                    <li>Memberikan layanan pelanggan terbaik</li>
                    <li>Berinovasi secara berkelanjutan</li>
                    <li>Membangun kepercayaan pelanggan</li>
                </ul>
            </div>
        </div>
        
        <!-- VALUES -->
        <div>
            <h2 style="text-align: center; font-size: 2rem; margin-bottom: 10px;">Nilai-Nilai Kami</h2>
            <div class="values-grid">
                <div class="value-item">
                    <div class="icon">⭐</div>
                    <h3>Kualitas</h3>
                    <p style="color: #666;">Produk terbaik untuk Anda</p>
                </div>
                <div class="value-item">
                    <div class="icon">🛡️</div>
                    <h3>Kepercayaan</h3>
                    <p style="color: #666;">Komitmen pada kepuasan</p>
                </div>
                <div class="value-item">
                    <div class="icon">💡</div>
                    <h3>Inovasi</h3>
                    <p style="color: #666;">Selalu berkembang</p>
                </div>
                <div class="value-item">
                    <div class="icon">👥</div>
                    <h3>Pelayanan</h3>
                    <p style="color: #666;">Fokus pada pelanggan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section style="padding: 0 20px 80px;">
    <div class="container">
        <div class="cta-section">
            <h2>Siap Berbelanja?</h2>
            <p>Jelajahi katalog produk kami sekarang</p>
            <a href="{{ route('catalog') }}" class="btn btn-light" style="padding: 15px 40px; font-size: 1.1rem;">
                🛒 Lihat Katalog
            </a>
        </div>
    </div>
</section>
@endsection
