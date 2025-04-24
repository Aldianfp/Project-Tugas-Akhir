<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Proyek;
use App\Models\Portofolio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $data_proyek = Portofolio::orderBy('nama', 'ASC')->get();
        return view('admin.pages.laporan-keuangan.index', [
            'title' => 'Laporan Keuangan',
            'data_proyek' => $data_proyek
        ]);
    }


    public function preview()
    {
        request()->validate([
            'proyek_id' => ['required']
        ]);

        $proyek = Portofolio::findOrFail(request('proyek_id'));
        $data_pemasukan = Pemasukan::where('proyek_id', $proyek->id);
        $data_pengeluaran = Pengeluaran::where('proyek_id', $proyek->id);

        if (request('tanggal_awal') && request('tanggal_akhir')) {
            $data_pemasukan->whereBetween('tanggal', [request('tanggal_awal'), request('tanggal_akhir')]);
            $data_pengeluaran->whereBetween('tanggal', [request('tanggal_awal'), request('tanggal_akhir')]);
        } elseif (request('tanggal_awal') && !request('tanggal_akhir')) {
            $data_pemasukan->whereDate('tanggal', request('tanggal_awal'));
            $data_pengeluaran->whereDate('tanggal', request('tanggal_awal'));
        } else {
            $data_pemasukan->whereNotNull('id');
            $data_pengeluaran->whereNotNull('id');
        }

        $pemasukan = $data_pemasukan->latest()->get();
        $pengeluaran = $data_pengeluaran->latest()->get();

        // Generate PDF untuk preview
        $pdf = Pdf::loadView('admin.pages.laporan-keuangan.print', [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'kategori' => request('kategori'),
            'proyek' => $proyek
        ]);

        return $pdf->stream('Laporan Keuangan.pdf');
    }

    // public function print()
    // {
    //     request()->validate([
    //         'proyek_id' => ['required']
    //     ]);

    //     $proyek = Portofolio::findOrFail(request('proyek_id'));
    //     $data_pemasukan = Pemasukan::where('proyek_id', $proyek->id);
    //     $data_pengeluaran = Pengeluaran::where('proyek_id', $proyek->id);
    //     if (request('tanggal_awal') && request('tanggal_akhir')) {
    //         $data_pemasukan->whereBetween('tanggal', [request('tanggal_awal'), request('tanggal_akhir')]);
    //         $data_pengeluaran->whereBetween('tanggal', [request('tanggal_awal'), request('tanggal_akhir')]);
    //     } elseif (request('tanggal_awal') && !request('tanggal_akhir')) {
    //         $data_pemasukan->whereDate('tanggal', request('tanggal_awal'));
    //         $data_pengeluaran->whereDate('tanggal', request('tanggal_awal'));
    //     } else {
    //         $data_pemasukan->whereNotNull('id');
    //         $data_pengeluaran->whereNotNull('id');
    //     }
    //     $pemasukan = $data_pemasukan->latest()->get();
    //     $pengeluaran = $data_pengeluaran->latest()->get();

    //     // dd($proyek);
    //     $pdf = Pdf::loadView('admin.pages.laporan-keuangan.print', [
    //         'pemasukan' => $pemasukan,
    //         'pengeluaran' => $pengeluaran,
    //         'kategori' => request('kategori'),
    //         'proyek' => $proyek
    //     ]);
    //     return $pdf->stream('invoice.pdf');
    // }
}
