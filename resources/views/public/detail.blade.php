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
    .product-detail {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-top: 40px;
    }
    .product-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }
    .product-info {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    .product-title {
        font-size: 2.3rem;
        margin-bottom: 15px;
    }
    .product-price {
        color: #667eea;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 25px;
    }
</style>
@endsection

@section('content')
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

<section class="section">
    <div class="container">
        <div class="product-detail">
            <!-- IMAGE -->
            <div>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="product-image">
                @else
                    <div style="height:500px;display:flex;align-items:center;justify-content:center;background:#eee;">
                        📦
                    </div>
                @endif
            </div>

            <!-- INFO -->
            <div class="product-info">
                <h1 class="product-title">{{ $product->name }}</h1>

                @if($product->price)
                    <div class="product-price">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </div>
                @endif

                <p>{{ $product->description }}</p>

                <!-- BUTTON -->
                <div style="display:grid;gap:12px;margin-top:30px;">
                    <a href="{{ route('order.create', $product->id) }}"
                       class="btn btn-primary"
                       style="padding:14px;font-size:1.1rem;">
                        🛒 Order Sekarang
                    </a>

                    <a href="https://wa.me/{{ $setting->whatsapp ?? '' }}?text=Halo, saya tertarik dengan produk {{ $product->name }}"
                       class="btn btn-success"
                       target="_blank">
                        💬 WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


