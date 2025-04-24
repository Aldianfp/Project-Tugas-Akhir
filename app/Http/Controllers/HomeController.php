<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::first();
        if (!$companies) {
            abort(404, "Data Tidak ada!");
        }

        $misi = $companies['misi'] ?? null;
        $kebijakan = $companies['kebijakan'] ?? null;
        $jasapelayanan = $companies['jasapelayanan'] ?? null;
        $visi = $companies['visi'] ?? null;

        if (is_null($misi) || is_null($kebijakan) || is_null($jasapelayanan) || is_null($visi)) {
            abort(500, "Data Tidak ada!");
        }

        $misiArray = explode('.', $companies['misi']);
        $kebijakanArray = explode('.', $companies['kebijakan']);
        $jasapelayananArray = explode('.', $companies['jasapelayanan']);

        return view('frontend.pages.home', [
            'title' => 'Home',
            'companies' => $companies,
            'visi' => $companies['visi'],
            'misi' => $companies['misi'],
            'kebijakan' => $companies['kebijakan'],
            'jasapelayanan' => $companies['jasapelayanan'],

            'misisplit' => $misiArray,
            'kebijakansplit' => $kebijakanArray,
            'jasapelayanansplit' => $jasapelayananArray,


        ]);
    }
}
