<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $items = Portofolio::orderBy('nama', 'ASC')->get();
        return view('admin.pages.portofolio.index', [
            'title' => 'Portofolio',
            'items' => $items
        ]);
    }

    public function create()
    {

        return view('admin.pages.portofolio.create', [
            'title' => 'Tambah Portofolio'
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
            'tanggal_awal' => ['required', 'date'],
            'tanggal_akhir' => ['required', 'date'],
            'gambar' => ['required', 'array'],
            'gambar.*' => ['image'],
            'kontrak' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $slug = Str::slug(request()->nama, '_');
            $data_kontrak = request()->file('kontrak');
            $path = $data_kontrak->store('./storage/portofolio-gambar', 'public');
            $path = str_replace('./storage/', '', $path);
            $cek = $path;
            $kontrak = basename($cek);

            $data = request()->only(['nama', 'deskripsi', 'tanggal_awal', 'tanggal_akhir']);
            $data['slug'] = $slug;
            $data['kontrak'] = $kontrak;
            $data_gambar = request()->file('gambar');
            $portofolio = Portofolio::create($data);
            foreach ($data_gambar as $gambar) {
                $path = $gambar->store('./storage/portofolio-gambar', 'public');
                $path = str_replace('./storage/', '', $path);
                $portofolio->gambar()->create([
                    'gambar' => $path
                ]);
            }
            DB::commit();
            return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {

        $item = Portofolio::findOrFail($id);
        return view('admin.pages.portofolio.edit', [
            'title' => 'Edit Portofolio',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            $item = Portofolio::findOrFail($id);
            $data = request()->all();
            if (request()->file('kontrak')) {
                Storage::disk('public')->delete($item->kontrak);

                $path = request()->file('kontrak')->store('./storage/portofolio-gambar', 'public');
                $path = str_replace('./storage/portofolio-gambar', '', $path);

                $data['kontrak'] = $path;
            }
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil diupdate.');
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
            $item = Portofolio::findOrFail($id);
            $item->delete();
            DB::commit();
            return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
