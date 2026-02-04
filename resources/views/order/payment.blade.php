@extends('layouts.public')

@section('title', 'Pembayaran QRIS')

@section('styles')
<style>
.payment-box {
    max-width: 600px;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,.1);
    text-align: center;
}

.payment-info {
    margin: 20px 0;
    text-align: left;
}

.qr-box img {
    width: 250px;
    border-radius: 10px;
    border: 1px solid #ddd;
}

.status {
    padding: 10px;
    border-radius: 6px;
    font-weight: bold;
}

.status.pending {
    background: #fff3cd;
    color: #856404;
}

.status.paid {
    background: #d4edda;
    color: #155724;
}
</style>
@endsection

@section('content')
<div class="payment-box">
    <h2>💳 Pembayaran QRIS</h2>
    <p>Silakan scan QR di bawah</p>

    <div class="payment-info">
        <p><strong>Produk:</strong> {{ $order->product->name }}</p>
        <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
        <p><strong>Total:</strong> Rp {{ number_format($order->price,0,',','.') }}</p>

        <p class="status {{ $order->status }}">
            Status: {{ strtoupper($order->status) }}
        </p>
    </div>

    <div class="qr-box">
        <img src="{{ asset('images/qris.png') }}" alt="QRIS">
    </div>

    <p style="color:#666;font-size:.9rem;">
        Setelah pembayaran berhasil, admin akan memverifikasi pesanan Anda.
    </p>

    <a href="{{ route('home') }}" class="btn btn-primary">
        Kembali ke Beranda
    </a>
</div>
@endsection


