@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h1 style="font-size: 2rem; font-weight: bold;">Manajemen Produk</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">➕ Tambah Produk</a>
</div>

<div class="card">
    <div class="card-body">
        @if($products->count() > 0)
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th width="80">Gambar</th>
                        <th>Nama Produk</th>
                        <th width="150">Kategori</th>
                        <th width="120">Harga</th>
                        <th width="100">Status</th>
                        <th width="120" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                    <tr>
                        <td>{{ $products->firstItem() + $index }}</td>
                        <td>
                            @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px; display: block;">
                            @else
                            <div style="width: 60px; height: 60px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 5px; font-size: 1.5rem;">
                                📦
                            </div>
                            @endif
                        </td>
                        <td>
                            <div style="font-weight: bold; margin-bottom: 5px;">{{ $product->name }}</div>
                            <small style="color: #666;">{{ Str::limit($product->description, 60) }}</small>
                        </td>
                        <td>
                            <span style="background: #667eea; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td>
                            @if($product->price)
                            <strong style="color: #667eea;">Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
                            @else
                            <span style="color: #999;">-</span>
                            @endif
                        </td>
                        <td>
                            @if($product->status)
                            <span style="background: #28a745; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                                ✓ Aktif
                            </span>
                            @else
                            <span style="background: #dc3545; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                                ✗ Nonaktif
                            </span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('admin.products.edit', $product) }}" 
                               class="btn btn-sm" 
                               style="background: #ffc107; color: #333; padding: 5px 10px; margin-right: 5px;"
                               title="Edit">
                                ✏️
                            </a>
                            <form method="POST" 
                                  action="{{ route('admin.products.destroy', $product) }}" 
                                  style="display: inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->name }}?\n\nData yang dihapus tidak dapat dikembalikan!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger" 
                                        style="padding: 5px 10px;"
                                        title="Hapus">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($products->hasPages())
        <div style="margin-top: 20px; text-align: center;">
            {{ $products->links() }}
        </div>
        @endif
        @else
        <div style="text-align: center; padding: 60px 20px;">
            <div style="font-size: 5rem; margin-bottom: 15px; opacity: 0.3;">📦</div>
            <h3 style="margin-bottom: 10px;">Belum Ada Produk</h3>
            <p style="color: #666; margin-bottom: 20px;">Tambahkan produk pertama Anda untuk mulai berjualan</p>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">➕ Tambah Produk</a>
        </div>
        @endif
    </div>
</div>
@endsection
