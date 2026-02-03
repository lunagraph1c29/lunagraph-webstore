<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Home Page
    public function home()
    {
        $setting = Setting::first();
        $products = Product::where('status', 1)
                          ->with('category')
                          ->latest()
                          ->limit(6)
                          ->get();
        
        return view('public.home', compact('setting', 'products'));
    }

    // Catalog Page
    public function catalog(Request $request)
    {
        $setting = Setting::first();
        $categories = Category::withCount('products')->get();
        
        $query = Product::where('status', 1)->with('category');
        
        // Filter by category
        if ($request->category && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }
        
        $products = $query->latest()->paginate(9);
        
        return view('public.catalog', compact('setting', 'products', 'categories'));
    }

    // Product Detail
    public function detail($id)
    {
        $setting = Setting::first();
        $product = Product::with('category')->findOrFail($id);
        
        return view('public.detail', compact('setting', 'product'));
    }

    // About Page
    public function about()
    {
        $setting = Setting::first();
        
        return view('public.about', compact('setting'));
    }

    // Contact Page
    public function contact()
    {
        $setting = Setting::first();
        
        return view('public.contact', compact('setting'));
    }
}
