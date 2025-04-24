<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{

    public function index()
    {
        $items = Type::orderBy('nama', 'ASC')->get();
        return view('admin.pages.type.index', [
            'title' => 'Type',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('admin.pages.type.create', [
            'title' => 'Tambah Type'
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            Type::create($data);
            DB::commit();
            return redirect()->route('admin.type.index')->with('success', 'Type berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {

        $item = Type::findOrFail($id);
        return view('admin.pages.type.edit', [
            'title' => 'Edit Type',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'nama' => ['required']
        ]);
        DB::beginTransaction();
        try {
            $item = Type::findOrFail($id);
            $data = request()->all();
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.type.index')->with('success', 'Type berhasil diupdate.');
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
            $item = Type::findOrFail($id);
            $item->delete();
            DB::commit();
            return redirect()->route('admin.type.index')->with('success', 'Type berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
