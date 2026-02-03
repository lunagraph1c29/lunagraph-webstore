@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
<div style="margin-bottom: 30px;">
    <nav style="margin-bottom: 15px; color: #666;">
        <a href="{{ route('admin.dashboard') }}" style="color: #666;">Dashboard</a> / 
        <span>Pengaturan</span>
    </nav>
    <h1 style="font-size: 2rem; font-weight: bold;">Pengaturan Website</h1>
</div>

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="grid grid-2">
        <div>
            <div class="card">
                <div class="card-header">Informasi Umum</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama Website <span style="color: red;">*</span></label>
                        <input type="text" 
                               name="site_name" 
                               class="form-control" 
                               value="{{ old('site_name', $setting->site_name ?? '') }}" 
                               placeholder="Contoh: Toko Saya"
                               required 
                               autofocus>
                        @error('site_name')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                        <small style="color: #666;">Nama ini akan muncul di header website dan title browser</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Deskripsi Website <span style="color: red;">*</span></label>
                        <textarea name="description" 
                                  class="form-control" 
                                  rows="4" 
                                  placeholder="Jelaskan tentang website/bisnis Anda..."
                                  required>{{ old('description', $setting->description ?? '') }}</textarea>
                        @error('description')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                        <small style="color: #666;">Deskripsi akan tampil di halaman About dan meta description</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Nomor WhatsApp <span style="color: red;">*</span></label>
                        <input type="text" 
                               name="whatsapp" 
                               class="form-control" 
                               value="{{ old('whatsapp', $setting->whatsapp ?? '') }}" 
                               placeholder="628123456789"
                               required>
                        @error('whatsapp')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                        <small style="color: #666;">Format: 628xxx (tanpa + atau spasi). Contoh: 628123456789</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Logo Website (Opsional)</label>
                        
                        @if(isset($setting->logo) && $setting->logo)
                        <div style="margin-bottom: 15px;">
                            <p style="font-weight: 600; margin-bottom: 10px;">Logo Saat Ini:</p>
                            <img src="{{ asset('storage/' . $setting->logo) }}" 
                                 alt="Logo" 
                                 style="max-width: 200px; max-height: 100px; border-radius: 10px; border: 2px solid #ddd;">
                        </div>
                        @endif
                        
                        <input type="file" 
                               name="logo" 
                               class="form-control" 
                               accept="image/*"
                               onchange="previewLogo(event)">
                        @error('logo')
                        <div style="color: #dc3545; font-size: 0.9rem; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                        <small style="color: #666;">Format: PNG (background transparan lebih baik). Maksimal 2MB. Rekomendasi ukuran: 200x60px</small>
                        
                        <div id="logoPreview" style="margin-top: 15px; display: none;">
                            <p style="font-weight: 600; margin-bottom: 10px;">Preview Logo Baru:</p>
                            <img id="preview" src="" alt="Preview" style="max-width: 200px; max-height: 100px; border-radius: 10px; border: 2px solid #667eea;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div>
            <div class="card" style="background: #f8f9fa;">
                <div class="card-header">💡 Tips Pengaturan</div>
                <div class="card-body">
                    <ul style="margin-left: 20px; line-height: 1.8;">
                        <li>Nama website sebaiknya singkat dan mudah diingat</li>
                        <li>Deskripsi yang baik membantu SEO website Anda</li>
                        <li>Pastikan nomor WhatsApp aktif dan bisa dihubungi</li>
                        <li>Logo dengan background transparan terlihat lebih profesional</li>
                        <li>Perubahan akan langsung terlihat di seluruh website</li>
                    </ul>
                </div>
            </div>
            
            <div class="card" style="margin-top: 20px; border: 1px solid #ffc107;">
                <div class="card-header" style="background: #fff3cd;">⚠️ Perhatian</div>
                <div class="card-body" style="background: #fff3cd;">
                    <ul style="margin-left: 20px; line-height: 1.8; color: #856404;">
                        <li>Semua perubahan akan langsung diterapkan</li>
                        <li>Pastikan data yang diisi sudah benar</li>
                        <li>Jangan gunakan nomor WhatsApp yang tidak aktif</li>
                    </ul>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px;">
                💾 Simpan Pengaturan
            </button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    function previewLogo(event) {
        const file = event.target.files[0];
        const previewDiv = document.getElementById('logoPreview');
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
