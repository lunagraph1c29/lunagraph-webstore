@extends('layouts.public')

@section('title', 'Kontak - ' . ($setting->site_name ?? 'Katalog Produk'))

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0;
    }
    
    .contact-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-top: 40px;
    }
    
    .contact-card {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        text-align: center;
    }
    
    .contact-icon {
        font-size: 4rem;
        margin-bottom: 20px;
    }
    
    .contact-card h3 {
        font-size: 1.3rem;
        margin-bottom: 15px;
    }
    
    .contact-card p {
        color: #666;
        margin-bottom: 20px;
    }
    
    .hours-card {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        margin: 60px auto;
        max-width: 600px;
    }
    
    .hours-card h3 {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 30px;
    }
    
    .hours-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .hours-table tr {
        border-bottom: 1px solid #e9ecef;
    }
    
    .hours-table td {
        padding: 15px 0;
    }
    
    .hours-table td:first-child {
        font-weight: bold;
    }
    
    .hours-table td:last-child {
        text-align: right;
    }
    
    .faq-section {
        margin-top: 60px;
    }
    
    .faq-section h3 {
        text-align: center;
        font-size: 1.8rem;
        margin-bottom: 40px;
    }
    
    .accordion {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .accordion-item {
        background: white;
        border-radius: 10px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .accordion-header {
        padding: 20px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        transition: background 0.3s;
    }
    
    .accordion-header:hover {
        background: #f8f9fa;
    }
    
    .accordion-icon {
        transition: transform 0.3s;
    }
    
    .accordion-item.active .accordion-icon {
        transform: rotate(180deg);
    }
    
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    
    .accordion-content-inner {
        padding: 0 20px 20px;
        color: #555;
        line-height: 1.8;
    }
    
    .cta-section {
        background: #f8f9fa;
        padding: 60px 20px;
        text-align: center;
        border-radius: 10px;
        margin-top: 60px;
    }
    
    .cta-section h2 {
        font-size: 2rem;
        margin-bottom: 15px;
    }
    
    .cta-section p {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 30px;
    }
    
    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container">
        <h1 style="font-size: 2.5rem; margin-bottom: 10px;">Hubungi Kami</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Kami siap membantu Anda</p>
    </div>
</div>

<!-- CONTACT SECTION -->
<section class="section">
    <div class="container">
        <!-- CONTACT CARDS -->
        <div class="contact-grid">
            <div class="contact-card">
                <div class="contact-icon" style="color: #25D366;">💬</div>
                <h3>WhatsApp</h3>
                <p>{{ $setting->whatsapp ?? '-' }}</p>
                <a href="https://wa.me/{{ $setting->whatsapp ?? '' }}" class="btn btn-success" target="_blank">
                    Chat Sekarang
                </a>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon" style="color: #667eea;">📧</div>
                <h3>Email</h3>
                <p>info@{{ strtolower(str_replace(' ', '', $setting->site_name ?? 'katalogproduk')) }}.com</p>
                <a href="mailto:info@example.com" class="btn btn-primary">
                    Kirim Email
                </a>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon" style="color: #17a2b8;">📍</div>
                <h3>Lokasi</h3>
                <p>Indonesia</p>
                <button class="btn" style="background: #17a2b8; color: white;" onclick="alert('Fitur peta akan segera hadir!')">
                    Lihat Peta
                </button>
            </div>
        </div>
        
        <!-- BUSINESS HOURS -->
        <div class="hours-card">
            <h3>🕐 Jam Operasional</h3>
            <table class="hours-table">
                <tr>
                    <td>Senin - Jumat</td>
                    <td>08:00 - 17:00</td>
                </tr>
                <tr>
                    <td>Sabtu</td>
                    <td>08:00 - 14:00</td>
                </tr>
                <tr>
                    <td>Minggu</td>
                    <td style="color: #dc3545;">Tutup</td>
                </tr>
            </table>
        </div>
        
        <!-- FAQ SECTION -->
        <div class="faq-section">
            <h3>❓ Pertanyaan Umum (FAQ)</h3>
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        <span>Bagaimana cara memesan produk?</span>
                        <span class="accordion-icon">▼</span>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            Anda dapat memesan produk dengan menghubungi kami melalui WhatsApp. Pilih produk yang Anda inginkan, kemudian klik tombol "Hubungi via WhatsApp" pada halaman detail produk.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        <span>Apakah ada biaya pengiriman?</span>
                        <span class="accordion-icon">▼</span>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            Biaya pengiriman disesuaikan dengan lokasi tujuan. Silakan hubungi kami untuk informasi detail mengenai biaya pengiriman ke lokasi Anda.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        <span>Berapa lama waktu pengiriman?</span>
                        <span class="accordion-icon">▼</span>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            Waktu pengiriman bervariasi tergantung lokasi, biasanya 2-5 hari kerja untuk wilayah Jawa dan 5-10 hari kerja untuk luar Jawa.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section style="padding: 0 20px 80px;">
    <div class="container">
        <div class="cta-section">
            <h2>Masih Ada Pertanyaan?</h2>
            <p>Jangan ragu untuk menghubungi kami</p>
            <a href="https://wa.me/{{ $setting->whatsapp ?? '' }}" class="btn btn-success" target="_blank" style="padding: 15px 40px; font-size: 1.1rem;">
                💬 Chat via WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Accordion toggle function
    function toggleAccordion(header) {
        const item = header.parentElement;
        const content = item.querySelector('.accordion-content');
        const isActive = item.classList.contains('active');
        
        // Close all accordion items
        document.querySelectorAll('.accordion-item').forEach(el => {
            el.classList.remove('active');
            el.querySelector('.accordion-content').style.maxHeight = null;
        });
        
        // Open clicked item if it wasn't active
        if (!isActive) {
            item.classList.add('active');
            content.style.maxHeight = content.scrollHeight + 'px';
        }
    }
    
    // Open first accordion item by default
    window.addEventListener('DOMContentLoaded', function() {
        const firstAccordion = document.querySelector('.accordion-item .accordion-header');
        if (firstAccordion) {
            toggleAccordion(firstAccordion);
        }
    });
</script>
@endsection
