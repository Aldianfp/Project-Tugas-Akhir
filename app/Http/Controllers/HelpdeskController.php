<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Helpdesk; // Model untuk superadmin




class HelpdeskController extends Controller
{
    public function index()
    {
        return view('frontend.pages.helpdesk');
    }

    public function simpanuser(Request $request)
    {

        $data = [
            'login' => $request->login,
            'keluhan' => $request->keluhan,
            'status' => 'Tiket Berhasil Dibuat',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $getLastTicket = DB::table('helpdesks')
            ->orderBy('no_tiket', 'desc')
            ->value('no_tiket');

        if ($getLastTicket) {
            $ex = explode('_', $getLastTicket);


            $nomor_tiket = 'TIC_YADINKARYA_' . ($ex[2] + 1);
            $data['no_tiket'] = $nomor_tiket;
        } else {
            $nomor_tiket = 'TIC_YADINKARYA_1';
            $data['no_tiket'] = $nomor_tiket;
        }

        Helpdesk::create($data);
        return redirect('/login')->with('success', "SIMPAN BAIK BAIK TIKET ANDA YAITU $nomor_tiket, Cek secara berkala di menu Cek Tiket");
    }

    public function cektiket()
    {
        return view('frontend.pages.cektiket');
    }

    public function prosescektiket(Request $request)
    {
        $getLastTicket = DB::table('helpdesks')
            ->where('no_tiket', $request->no_tiket)
            ->get();

        if ($getLastTicket->isEmpty()) {
            abort(404, "Tiket Tidak Tersedia !");
        }
        $data = $getLastTicket[0];

        $respon = $data->respon ? $data->respon : 'Admin Belum Memberi Tanggapan';

        return redirect('/login')->with(
            'success',

            "Tiket Anda $data->no_tiket, dengan status $data->status. Respon superadmin yaitu '$respon'"

        );
    }


    //ADMIN

    public function adminindex()
    {
        $tiket = DB::table('helpdesks')->get();
        $i = 0;

        return view('admin.pages.helpdesk.index', compact('tiket', 'i'));
    }

    public function adminjawabtiket($id)
    {
        $getLastTicket = DB::table('helpdesks')
            ->where('no_tiket', $id)
            ->get();
        $data = $getLastTicket[0];

        return view('admin.pages.helpdesk.jawabtiket', compact('id', 'data'));
    }

    public function respontiket(Request $request)
    {

        $data = [
            'status' => 'Tiket Sudah Dijawab',
            'respon' => $request->respon,
            'updated_at' => now(),
        ];

        Helpdesk::where('no_tiket', $request->no_tiket)
            ->update($data);

        return redirect()->route('admin.helpdesk.adminindex')->with('success', 'Tiket updated successfully.');
    }
}
