<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use App\Models\PortofolioGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortofolioGambarController extends Controller
{
    public $portofolio;
    public $portofolio_id;
    public function __construct()
    {
        $this->portofolio_id = request('portofolio_id');
        $this->portofolio = Portofolio::findOrFail(request('portofolio_id'));
    }
    public function index()
    {
        $items = PortofolioGambar::where('portofolio_id', $this->portofolio_id)->get();
        return view('admin.pages.portofolio-gambar.index', [
            'title' => 'Portofolio',
            'items' => $items,
            'portofolio' => $this->portofolio
        ]);
    }

    public function create()
    {
        return view('admin.pages.portofolio-gambar.create', [
            'title' => 'Tambah Portofolio'
        ]);
    }

    public function store()
    {
        request()->validate([
            'gambar' => ['required', 'array'],
            'gambar.*' => ['image'],
        ]);

        DB::beginTransaction();
        try {
            $data_gambar = request()->file('gambar');
            foreach ($data_gambar as $gambar) {
                $path = $gambar->store('./storage/portofolio-gambar', 'public');
                $path = str_replace('./storage/', '', $path);
                $this->portofolio->gambar()->create([
                    'gambar' => $path
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.portofolio-gambar.index', [
                'portofolio_id' => $this->portofolio_id
            ])->with('success', 'Gambar berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy()
    {
        DB::beginTransaction();
        try {
            $item = PortofolioGambar::findOrFail(request('id'));
            Storage::disk('public')->delete($item->gambar);
            $item->delete();
            DB::commit();
            return redirect()->route('admin.portofolio-gambar.index', [
                'portofolio_id' => $this->portofolio_id
            ])->with('success', 'Gambar berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
