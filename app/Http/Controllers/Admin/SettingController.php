<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'description' => 'required',
            'whatsapp' => 'required|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $setting = Setting::first();
        $data = $request->all();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($setting && $setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        // Update or create
        if ($setting) {
            $setting->update($data);
        } else {
            Setting::create($data);
        }

        return redirect()->route('admin.settings.index')
                        ->with('success', 'Pengaturan berhasil diupdate');
    }
}
