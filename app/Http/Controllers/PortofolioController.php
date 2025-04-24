<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $items = Portofolio::latest()->get();
        return view('frontend.pages.portofolio.index', [
            'title' => 'Portofolio',
            'items' => $items
        ]);
    }

    public function show($slug)
    {
        // $item = Portofolio::findOrFail($slug);

        $item = Portofolio::where('slug', $slug)->first();

        $base_url = url('/');

        $url = $base_url.'/storage/portofolio-gambar/'.$item['kontrak'];

        
        // dd($url);
        return view('frontend.pages.portofolio.show', [
            'title' => 'Detail Portofolio',
            'item' => $item,
            'kontrak' => $url
        ]);
    }
}
