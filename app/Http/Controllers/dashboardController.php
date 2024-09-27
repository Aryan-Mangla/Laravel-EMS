<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class dashboardController extends Controller
{
    public function index()
    {
        $bannerCount = Banner::count(); // Get the number of banner images
        return view('dashboard', compact('bannerCount'));
    }
}
