@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div style="margin-bottom: 30px;">
    <nav style="margin-bottom: 15px;">
        <a href="{{ route('admin.dashboard') }}" style="color: #666;">Dashboard</a> / 
        <a href="{{ route('admin.categories.index') }}" style="color: #666;">Kategori</a> / 
        <span>Tambah</span>
    </nav>
    <h1 style="font-size: 2rem; font-weight: bold;">Tambah Kategori Baru</h1>
</div>

<div class="grid grid-2">
    <div>
        <div class="card">
            <div class="card-header">
                Informasi Kategori
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Nama Kategori <span style="color: red;">*</span></label>
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               value="{{ old('name') }}"
                               placeholder="Contoh: Elektronik, Fashion, Makanan"
                               required>
                        @error('name')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                        <div style="color: #666; font-size: 0.9rem; margin-top: 5px;">
                            Masukkan nama kategori untuk mengelompokkan produk
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-primary">
                            💾 Simpan Kategori
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
                ℹ️ Informasi
            </div>
            <div class="card-body">
                <ul style="margin-left: 20px; line-height: 1.8;">
                    <li>Kategori digunakan untuk mengelompokkan produk</li>
                    <li>Nama kategori harus unik</li>
                    <li>Kategori dapat diedit atau dihapus nanti</li>
                    <li>Setiap produk harus memiliki kategori</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
