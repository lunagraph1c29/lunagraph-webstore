@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div style="margin-bottom: 30px;">
    <nav style="margin-bottom: 15px;">
        <a href="{{ route('admin.dashboard') }}" style="color: #666;">Dashboard</a> / 
        <a href="{{ route('admin.categories.index') }}" style="color: #666;">Kategori</a> / 
        <span>Edit</span>
    </nav>
    <h1 style="font-size: 2rem; font-weight: bold;">Edit Kategori</h1>
</div>

<div class="grid grid-2">
    <div>
        <div class="card">
            <div class="card-header">
                Informasi Kategori
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label class="form-label">Nama Kategori <span style="color: red;">*</span></label>
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               value="{{ old('name', $category->name) }}"
                               required>
                        @error('name')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-primary">
                            💾 Update Kategori
                        </button>
                        <a href="{{ route('admin.categories.index') }}" class="btn" style="background: #6c757d; color: white;">
                            ❌ Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div>
        <div class="card" style="background: #f8f9fa;">
            <div class="card-header">
                📊 Info Kategori
            </div>
            <div class="card-body">
                <table style="width: 100%; border: none;">
                    <tr>
                        <td style="padding: 10px 0; border: none;"><strong>Jumlah Produk</strong></td>
                        <td style="padding: 10px 0; border: none;">{{ $category->products->count() }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0; border: none;"><strong>Dibuat</strong></td>
                        <td style="padding: 10px 0; border: none;">{{ $category->created_at->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0; border: none;"><strong>Terakhir Update</strong></td>
                        <td style="padding: 10px 0; border: none;">{{ $category->updated_at->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
