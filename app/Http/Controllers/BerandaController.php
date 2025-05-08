<?php

namespace App\Http\Controllers;

use App\Models\Gallery; // Import model Gallery
use App\Models\SocialLink;
use App\Models\Profile;
use App\Models\Carousel;

class BerandaController extends Controller
{
   

    public function index()
    {
        $carousels = Carousel::latest()->take(4)->get();
        $galleries = Gallery::all();
        $socialLinks = SocialLink::all()->keyBy('platform');
        $profile = Profile::latest()->first();

        return view('beranda', compact('galleries', 'socialLinks', 'profile','carousels'));
    }
    
}
