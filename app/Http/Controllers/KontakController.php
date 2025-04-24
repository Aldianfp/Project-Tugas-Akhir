<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $contact = Kontak::first();

        if (is_null($contact)) {
            abort(404, "Tidak Ada Data !");
        }
        return view('frontend.pages.kontak', [
            'titla' => 'Kontak',
            'contact' => $contact
        ]);
    }
}
