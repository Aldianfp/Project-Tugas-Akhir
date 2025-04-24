<?php

namespace App\Http\Controllers\Admin;

use App\Models\Personil;
use App\Models\Pemasukan;
use App\Models\Peralatan;
use App\Models\Portofolio;
use App\Models\Pengeluaran;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->role);
        $count = [
            'peralatan' => Peralatan::count(),
            'personil' => Personil::count(),
            'portofolio' => Portofolio::count(),
            'pengeluaran' => Pengeluaran::count(),
            'pemasukan' => Pemasukan::count()
        ];
        return view('admin.pages.dashboard', [
            'title' => 'Dashboard',
            'count' => $count
        ]);
    }
}
