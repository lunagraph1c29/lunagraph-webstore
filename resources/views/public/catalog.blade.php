@extends('layouts.public')

@section('title', 'Katalog Produk - ' . ($setting->site_name ?? 'Katalog Produk'))

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0;
    }
    
    .catalog-layout {
        display: grid;
        grid-template-columns: 250px 1fr;
        gap: 30px;
        margin-top: 40px;
    }
    
    .sidebar {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        height: fit-content;
        position: sticky;
        top: 100px;
    }
    
    .sidebar h3 {
        margin-bottom: 20px;
        color: #667eea;
    }
    
    .filter-list {
        list-style: none;
    }
    
    .filter-list li {
        margin-bottom: 10px;
    }
    
    .filter-list a {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-radius: 5px;
        color: #555;
        transition: all 0.3s;
    }
    
    .filter-list a:hover,
    .filter-list a.active {
        background: #667eea;
        color: white;
    }
    
    .filter-count {
        background: rgba(0,0,0,0.1);
        padding: 2px 8px;
        border-radius: 10px;
        font-size: 0.85rem;
    }
    
    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    
    @media (max-width: 768px) {
        .catalog-layout {
            grid-template-columns: 1fr;
        }
        
        .sidebar {
            position: static;
        }
        
        .products-grid {
            grid-template-columns: 1fr;
        }
    }
    
    @media (min-width: 769px) and (max-width: 1024px) {
        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection

@section('content')
<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container">
        <h1 style="font-size: 2.5rem; margin-bottom: 10px;">Katalog Produk</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Jelajahi semua produk kami</p>
    </div>
</div>

<!-- CATALOG SECTION -->
<section class="section">
    <div class="container">
        <div class="catalog-layout">
            <!-- SIDEBAR FILTER -->
            <aside class="sidebar">
                <h3>🔍 Filter Kategori</h3>
                <ul class="filter-list">
                    <li>
                        <a href="{{ route('catalog') }}" class="{{ !request('category') ? 'active' : '' }}">
                            <span>Semua Produk</span>
                            <span class="filter-count">{{ \App\Models\Product::where('status', 1)->count() }}</span>
                        </a>
                    </li>
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('catalog', ['category' => $category->id]) }}" 
                           class="{{ request('category') == $category->id ? 'active' : '' }}">
                            <span>{{ $category->name }}</span>
                            <span class="filter-count">{{ $category->products->where('status', 1)->count() }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
            
            <!-- PRODUCTS GRID -->
            <div>
                @if($products->count() > 0)
                <div class="products-grid">
                    @foreach($products as $product)
                    <div class="card">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img" style="height: 200px;">
                        @else
                        <div style="height: 200px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                            📦
                        </div>
                        @endif
                        <div class="card-body">
                            <span class="badge badge-primary">{{ $product->category->name }}</span>
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="card-text">{{ substr($product->description, 0, 60) }}...</p>
                            @if($product->price)
                            <p style="color: #667eea; font-size: 1.3rem; font-weight: bold; margin-bottom: 15px;">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            @endif
                            <a href="{{ route('product.detail', $product->id) }}" class="btn btn-primary" style="width: 100%;">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- PAGINATION -->
                @if($products->hasPages())
                <div style="margin-top: 40px;">
                    <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
                        @if($products->onFirstPage())
                        <span style="padding: 10px 15px; background: #e9ecef; border-radius: 5px; color: #6c757d;">← Previous</span>
                        @else
                        <a href="{{ $products->previousPageUrl() }}" style="padding: 10px 15px; background: #667eea; color: white; border-radius: 5px;">← Previous</a>
                        @endif
                        
                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <a href="{{ $url }}" 
                           style="padding: 10px 15px; border-radius: 5px; {{ $page == $products->currentPage() ? 'background: #667eea; color: white;' : 'background: white; color: #667eea; border: 1px solid #667eea;' }}">
                            {{ $page }}
                        </a>
                        @endforeach
                        
                        @if($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" style="padding: 10px 15px; background: #667eea; color: white; border-radius: 5px;">Next →</a>
                        @else
                        <span style="padding: 10px 15px; background: #e9ecef; border-radius: 5px; color: #6c757d;">Next →</span>
                        @endif
                    </div>
                </div>
                @endif
                @else
                <div style="text-align: center; padding: 80px 20px; background: #f8f9fa; border-radius: 10px;">
                    <div style="font-size: 5rem; margin-bottom: 20px;">📭</div>
                    <h3>Tidak Ada Produk</h3>
                    <p style="color: #666; margin-bottom: 20px;">Belum ada produk dalam kategori ini</p>
                    <a href="{{ route('catalog') }}" class="btn btn-primary">Lihat Semua Produk</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
