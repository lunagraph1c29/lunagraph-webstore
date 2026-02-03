@extends('layouts.public')

@section('title', $product->name . ' - ' . ($setting->site_name ?? 'Katalog Produk'))

@section('styles')
<style>
    .breadcrumb {
        background: #f8f9fa;
        padding: 15px 0;
    }
    
    .breadcrumb-list {
        display: flex;
        list-style: none;
        gap: 10px;
        align-items: center;
    }
    
    .breadcrumb-list a {
        color: #667eea;
    }
    
    .breadcrumb-list a:hover {
        text-decoration: underline;
    }
    
    .product-detail {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-top: 40px;
    }
    
    .product-image-container {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    
    .product-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }
    
    .product-placeholder {
        width: 100%;
        height: 500px;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
    }
    
    .product-info {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    
    .product-badges {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }
    
    .product-title {
        font-size: 2.5rem;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    
    .product-price {
        color: #667eea;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 30px;
    }
    
    .product-description {
        line-height: 1.8;
        color: #555;
        margin-bottom: 30px;
    }
    
    .product-specs {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }
    
    .product-specs tr {
        border-bottom: 1px solid #e9ecef;
    }
    
    .product-specs td {
        padding: 15px 0;
    }
    
    .product-specs td:first-child {
        font-weight: bold;
        width: 150px;
    }
    
    @media (max-width: 768px) {
        .product-detail {
            grid-template-columns: 1fr;
        }
        
        .product-title {
            font-size: 1.8rem;
        }
    }
</style>
@endsection

@section('content')
<!-- BREADCRUMB -->
<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb-list">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>›</li>
            <li><a href="{{ route('catalog') }}">Katalog</a></li>
            <li>›</li>
            <li>{{ $product->name }}</li>
        </ul>
    </div>
</div>

<!-- PRODUCT DETAIL -->
<section class="section">
    <div class="container">
        <div class="product-detail">
            <!-- PRODUCT IMAGE -->
            <div class="product-image-container">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                @else
                <div class="product-placeholder">📦</div>
                @endif
            </div>
            
            <!-- PRODUCT INFO -->
            <div class="product-info">
                <div class="product-badges">
                    <span class="badge badge-primary">{{ $product->category->name }}</span>
                    @if($product->status)
                    <span class="badge badge-success">✓ Tersedia</span>
                    @else
                    <span class="badge" style="background: #dc3545; color: white;">✗ Tidak Tersedia</span>
                    @endif
                </div>
                
                <h1 class="product-title">{{ $product->name }}</h1>
                
                @if($product->price)
                <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                @endif
                
                <div>
                    <h3 style="margin-bottom: 15px;">📝 Deskripsi Produk</h3>
                    <div class="product-description">{{ $product->description }}</div>
                </div>
                
                <div>
                    <h3 style="margin-bottom: 15px;">📋 Spesifikasi</h3>
                    <table class="product-specs">
                        <tr>
                            <td>Kategori</td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                @if($product->status)
                                <span style="color: #28a745;">✓ Tersedia</span>
                                @else
                                <span style="color: #dc3545;">✗ Tidak Tersedia</span>
                                @endif
                            </td>
                        </tr>
                        @if($product->price)
                        <tr>
                            <td>Harga</td>
                            <td style="color: #667eea; font-weight: bold;">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        </tr>
                        @endif
                    </table>
                </div>
                
                <!-- WHATSAPP BUTTON -->
                <div style="display: grid; gap: 10px;">
                    <a href="https://wa.me/{{ $setting->whatsapp ?? '' }}?text=Halo, saya tertarik dengan produk {{ $product->name }}" 
                       class="btn btn-success" 
                       target="_blank"
                       style="padding: 15px; font-size: 1.1rem; text-align: center;">
                        💬 Hubungi via WhatsApp
                    </a>
                    <a href="{{ route('catalog') }}" class="btn" style="padding: 15px; text-align: center; background: white; border: 2px solid #667eea; color: #667eea;">
                        ← Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
