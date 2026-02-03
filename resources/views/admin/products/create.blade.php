@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div style="margin-bottom: 30px;">
    <nav style="margin-bottom: 15px; color: #666;">
        <a href="{{ route('admin.dashboard') }}" style="color: #666;">Dashboard</a> / 
        <a href="{{ route('admin.products.index') }}" style="color: #666;">Produk</a> / 
        <span>Tambah</span>
    </nav>
    <h1 style="font-size: 2rem; font-weight: bold;">Tambah Produk Baru</h1>
</div>

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf
    
    <div class="grid grid-2">
        <div>
            <div class="card">
                <div class="card-header">Informasi Produk</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama Produk <span style="color: red;">*</span></label>
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               value="{{ old('name') }}" 
                               placeholder="Contoh: Laptop ASUS ROG"
                               required 
                               autofocus>
                        @error('name')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Kategori <span style="color: red;">*</span></label>
                        <select name="category_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Deskripsi <span style="color: red;">*</span></label>
                        <textarea name="description" 
                                  class="form-control" 
                                  rows="5" 
                                  placeholder="Jelaskan detail produk Anda..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Harga (Opsional)</label>
                        <input type="number" 
                               name="price" 
                               class="form-control" 
                               value="{{ old('price') }}" 
                               placeholder="0"
                               min="0"
                               step="1">
                        @error('price')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                        <small style="color: #666;">Kosongkan jika tidak ingin menampilkan harga</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Gambar Produk (Opsional)</label>
                        <input type="file" 
                               name="image" 
                               class="form-control" 
                               accept="image/*"
                               onchange="previewImage(event)">
                        @error('image')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                        <small style="color: #666;">Format: JPG, PNG, WEBP. Maksimal 2MB</small>
                        
                        <div id="imagePreview" style="margin-top: 15px; display: none;">
                            <p style="font-weight: 600; margin-bottom: 10px;">Preview:</p>
                            <img id="preview" src="" alt="Preview" style="max-width: 100%; height: auto; border-radius: 10px; border: 2px solid #ddd;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" 
                                   name="status" 
                                   value="1" 
                                   {{ old('status', 1) ? 'checked' : '' }}
                                   style="width: 20px; height: 20px; margin-right: 10px; cursor: pointer;">
                            <span class="form-label" style="margin: 0;">Produk Aktif</span>
                        </label>
                        <small style="color: #666;">Centang untuk menampilkan produk di website</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div>
            <div class="card" style="background: #f8f9fa;">
                <div class="card-header">💡 Tips</div>
                <div class="card-body">
                    <ul style="margin-left: 20px; line-height: 1.8;">
                        <li>Gunakan nama produk yang jelas dan deskriptif</li>
                        <li>Pilih kategori yang sesuai untuk memudahkan pencarian</li>
                        <li>Tulis deskripsi lengkap agar pembeli paham produk Anda</li>
                        <li>Upload gambar berkualitas bagus (minimal 800x800px)</li>
                        <li>Harga bisa dikosongkan jika ingin dihubungi dulu</li>
                    </ul>
                </div>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 20px;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">💾 Simpan Produk</button>
                <a href="{{ route('admin.products.index') }}" class="btn" style="background: #6c757d; color: white; width: 100%; text-align: center;">❌ Batal</a>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const previewDiv = document.getElementById('imagePreview');
        const preview = document.getElementById('preview');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewDiv.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        } else {
            previewDiv.style.display = 'none';
        }
    }
</script>
@endsection
