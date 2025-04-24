<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyekController extends Controller
{
    public function index()
    {
        $items = Proyek::orderBy('nama', 'ASC')->get();
        return view('admin.pages.proyek.index', [
            'title' => 'Proyek',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('admin.pages.proyek.create', [
            'title' => 'Tambah Proyek'
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_akhir' => ['required', 'date'],
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            Proyek::create($data);
            DB::commit();
            return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {

        $item = Proyek::findOrFail($id);
        return view('admin.pages.proyek.edit', [
            'title' => 'Edit Proyek',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'nama' => ['required'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_akhir' => ['required', 'date'],
        ]);
        DB::beginTransaction();
        try {
            $item = Proyek::findOrFail($id);
            $data = request()->all();
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {

        DB::beginTransaction();
        try {
            $item = Proyek::findOrFail($id);
            $item->delete();
            DB::commit();
            return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
