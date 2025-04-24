<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PersonilController extends Controller
{

    public function index()
    {
        $items = Personil::orderBy('nama', 'ASC')->get();
        return view('admin.pages.personil.index', [
            'title' => 'Personil',
            'items' => $items
        ]);
    }

    public function create()
    {
        $items = Personil::orderBy('nama', 'ASC')->get();
        return view('admin.pages.personil.create', [
            'title' => 'Tambah Personil',
            'personils' => $items,
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required'],
            'gambar' => ['required', 'image', 'max:2048'],
            'pid' => [],
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            $path = request()->file('gambar')->store('./storage/personil', 'public');
            $path = str_replace('storage/', '', $path);
            $data['gambar'] = $path;
            
            Personil::create($data);
            DB::commit();
            return redirect()->route('admin.personil.index')->with('success', 'Personil berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {

        $item = Personil::findOrFail($id);
        return view('admin.pages.personil.edit', [
            'title' => 'Edit Personil',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'nama' => ['required'],
            'gambar' => ['image', 'max:2048']
        ]);
        DB::beginTransaction();
        try {
            $item = Personil::findOrFail($id);
            $data = request()->all();
            if (request()->file('gambar')) {
                Storage::disk('public')->delete($item->gambar);
                $path = request()->file('gambar')->store('./storage/personil', 'public');
                $path = str_replace('./storage/', '', $path);
            
                $data['gambar'] = $path;
            }
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.personil.index')->with('success', 'Personil berhasil diupdate.');
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
            $item = Personil::findOrFail($id);
            Storage::disk('public')->delete($item->gambar);
            $item->delete();
            DB::commit();
            return redirect()->route('admin.personil.index')->with('success', 'Personil berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
