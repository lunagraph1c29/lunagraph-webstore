@extends('layouts.public')

@section('title', 'Form Order - ' . $product->name)

@section('styles')
<style>
    .order-wrapper {
        max-width: 900px;
        margin: 40px auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .order-header {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 25px 30px;
    }

    .order-header h1 {
        margin: 0;
        font-size: 1.8rem;
    }

    .order-body {
        padding: 30px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .order-section h3 {
        margin-bottom: 15px;
        font-size: 1.2rem;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 8px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border-radius: 6px;
        border: 1px solid #ddd;
        font-size: 1rem;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .product-summary {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
    }

    .product-summary img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .product-summary h4 {
        margin-bottom: 10px;
    }

    .price {
        font-size: 1.4rem;
        font-weight: bold;
        color: #667eea;
        margin-bottom: 10px;
    }

    .order-footer {
        padding: 20px 30px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-submit {
        background: #28a745;
        color: white;
        padding: 12px 30px;
        border-radius: 6px;
        border: none;
        font-size: 1.1rem;
        cursor: pointer;
    }

    .btn-submit:hover {
        background: #218838;
    }

    @media (max-width: 768px) {
        .order-body {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="order-wrapper">

    <!-- HEADER -->
    <div class="order-header">
        <h1>🛒 Form Pemesanan Produk</h1>
    </div>

    <form action="{{ url('/order') }}" method="POST">
        @csrf

        <div class="order-body">
            <!-- DATA PEMBELI -->
            <div class="order-section">
                <h3>📋 Data Pembeli</h3>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="customer_name" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>No WhatsApp</label>
                    <input type="text" name="phone" required>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="address" required></textarea>
                </div>
            </div>

            <!-- RINGKASAN PRODUK -->
            <div class="order-section">
                <h3>📦 Detail Produk</h3>

                <div class="product-summary">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}">
                    @endif

                    <h4>{{ $product->name }}</h4>

                    <div class="price">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>

                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>

        <!-- HIDDEN DATA -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        

        <!-- FOOTER -->
        <div class="order-footer">
            <a href="{{ route('catalog') }}">← Kembali ke katalog</a>
            <button type="submit" class="btn-submit">
                Lanjut ke Pembayaran →
            </button>
        </div>
    </form>
</div>
@endsection


