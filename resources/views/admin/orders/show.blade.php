@extends('layouts.admin')

@section('title','Detail Order')

@section('content')
<div class="card">
    <div class="card-header">
        🧾 Detail Order #{{ $order->id }}
    </div>

    <div class="card-body">
        <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Telepon:</strong> {{ $order->phone }}</p>
        <p><strong>Alamat:</strong> {{ $order->address }}</p>
        <p><strong>Produk:</strong> {{ $order->product->name }}</p>
        <p><strong>Total:</strong> Rp {{ number_format($order->price,0,',','.') }}</p>
        <p><strong>Status:</strong> {{ strtoupper($order->status) }}</p>

        @if($order->status === 'pending')
        <form method="POST" action="{{ route('admin.orders.paid',$order->id) }}">
            @csrf
            @method('PUT')
            <button class="btn btn-success">
                ✔ Tandai Lunas
            </button>
        </form>
        @endif

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">
            ← Kembali
        </a>
    </div>
</div>
@endsection


