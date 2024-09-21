<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('banner', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {

            
            $originalName = $request->file('image')->getClientOriginalName();

            if (Storage::disk('public')->exists('banners/' . $originalName)) {
                
                return redirect()->route('banner.index')->with('error', 'An image with this name already exists. Please choose a different name.');
            }

          
            $path = $request->file('image')->storeAs('banners', $originalName, 'public');
    
           
            Banner::create([
                'image' => $path,
            ]);
    
            
            return redirect()->route('banner.index')->with('success', 'Banner image uploaded successfully');
        } else {
           
            return redirect()->route('banner.index')->with('error', 'No image was uploaded. Please try again.');
        }
    }

    public function destroy(Banner $banner)
    {
       
        Storage::disk('public')->delete($banner->image);
    
        
        $banner->delete();
    
       
        return redirect()->route('banner.index')->with('success', 'Banner image deleted successfully');
    }
        
    public function bulkDelete(Request $request)
    {
        $bannerIds = $request->input('banners', []);

        // Fetch the banners to delete
        $banners = Banner::whereIn('id', $bannerIds)->get();

        // Delete files from storage and records from database
        foreach ($banners as $banner) {
            Storage::disk('public')->delete($banner->image);
            $banner->delete();
        }

        return redirect()->route('banner.index')->with('success', 'Selected banners deleted successfully');
    }
}
