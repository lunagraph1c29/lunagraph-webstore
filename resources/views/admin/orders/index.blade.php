@extends('layouts.admin')

@section('title', 'Data Order')

@section('content')
<div class="card">
    <div class="card-header">📦 Data Order</div>
    <div class="card-body">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>Rp {{ number_format($order->price,0,',','.') }}</td>
                    <td>
                        <span class="badge">
                            {{ strtoupper($order->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}"
                           class="btn btn-sm btn-info">
                           Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
</div>
@endsection


