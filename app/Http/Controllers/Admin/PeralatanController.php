<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use App\Models\Peralatan;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeralatanController extends Controller
{
    public function index()
    {
        $items = Peralatan::orderBy('nama', 'ASC')->get();
        return view('admin.pages.peralatan.index', [
            'title' => 'Peralatan',
            'items' => $items
        ]);
    }

    public function create()
    {
        $merks = Merk::orderBy('nama', 'ASC')->get();
        $types = Type::orderBy('nama', 'ASC')->get();
        return view('admin.pages.peralatan.create', [
            'title' => 'Tambah Peralatan',
            'merks' => $merks,
            'types' => $types
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required'],
            'merk_id' => ['required'],
            'type_id' => ['required'],
            'deskripsi' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            Peralatan::create($data);
            DB::commit();
            return redirect()->route('admin.peralatan.index')->with('success', 'Peralatan berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $merks = Merk::orderBy('nama', 'ASC')->get();
        $types = Type::orderBy('nama', 'ASC')->get();
        $item = Peralatan::findOrFail($id);
        return view('admin.pages.peralatan.edit', [
            'title' => 'Edit Peralatan',
            'item' => $item,
            'merks' => $merks,
            'types' => $types
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'nama' => ['required'],
            'merk_id' => ['required'],
            'type_id' => ['required'],
            'deskripsi' => ['required']
        ]);
        DB::beginTransaction();
        try {
            $item = Peralatan::findOrFail($id);
            $data = request()->all();
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.peralatan.index')->with('success', 'Peralatan berhasil diupdate.');
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
            $item = Peralatan::findOrFail($id);
            $item->delete();
            DB::commit();
            return redirect()->route('admin.peralatan.index')->with('success', 'Peralatan berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
