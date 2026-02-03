@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h1 style="font-size: 2rem; font-weight: bold;">Manajemen Kategori</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        ➕ Tambah Kategori
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($categories->count() > 0)
        <table>
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Produk</th>
                    <th>Dibuat</th>
                    <th width="150" style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                <tr>
                    <td>{{ $categories->firstItem() + $index }}</td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td>
                        <span style="background: #667eea; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                            {{ $category->products->count() }} produk
                        </span>
                    </td>
                    <td>{{ $category->created_at->format('d M Y') }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('admin.categories.edit', $category) }}" 
                           class="btn btn-sm" 
                           style="background: #ffc107; color: #333; padding: 5px 10px; margin-right: 5px;">
                            ✏️ Edit
                        </a>
                        <form method="POST" 
                              action="{{ route('admin.categories.destroy', $category) }}" 
                              style="display: inline;" 
                              onsubmit="return confirm('Yakin ingin menghapus kategori {{ $category->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger" 
                                    style="padding: 5px 10px;">
                                🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($categories->hasPages())
        <div style="margin-top: 20px; text-align: center;">
            {{ $categories->links() }}
        </div>
        @endif
        @else
        <div style="text-align: center; padding: 60px 20px;">
            <div style="font-size: 5rem; margin-bottom: 15px; opacity: 0.3;">🏷️</div>
            <h3 style="margin-bottom: 10px;">Belum Ada Kategori</h3>
            <p style="color: #666; margin-bottom: 20px;">Tambahkan kategori pertama Anda untuk mulai mengelola produk</p>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                ➕ Tambah Kategori
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
