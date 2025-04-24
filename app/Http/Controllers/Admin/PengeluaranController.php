<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriPengeluaran;
use App\Models\Pengeluaran;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    public function index()
    {

        $items =  DB::table('pengeluaran')
            ->select('pengeluaran.id as pengeluaran_id', 'portofolio.id as portofolio_id', "kode", "tanggal", "uraian", "jumlah", "nama")
            ->leftJoin('portofolio', 'pengeluaran.proyek_id', '=', 'portofolio.id')
            ->get();

        return view('admin.pages.pengeluaran.index', [
            'title' => 'Pengeluaran',
            'items' => $items
        ]);
    }

    public function create()
    {
        $proyeks = Portofolio::latest()->get();
        return view('admin.pages.pengeluaran.create', [
            'title' => 'Tambah Pengeluaran',
            'proyeks' => $proyeks,
        ]);
    }

    public function store()
    {
        request()->validate([
            'proyek_id' => ['required'],
            'jumlah' => ['required'],
            'tanggal' => ['required'],
            'uraian' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();

            // Create Pemasukan entry
            $pengeluaran = Pengeluaran::create($data);
            DB::commit();

            // Generate kode after pemasukan is created
            $id_pengeluaran = $pengeluaran->id;
            $kode = "PL" . str_pad($id_pengeluaran, 6, '0', STR_PAD_LEFT);
            $pengeluaran->kode = $kode;
            $pengeluaran->update();

            return redirect()->route('admin.pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $item = Pengeluaran::findOrFail($id);
        return view('admin.pages.pengeluaran.edit', [
            'title' => 'Edit Pengeluaran',
            'item' => $item,
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'jumlah' => ['required'],
            'tanggal' => ['required'],
            'uraian' => ['required']
        ]);
        DB::beginTransaction();
        try {
            $item = Pengeluaran::findOrFail($id);
            $data = request()->all();
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.pengeluaran.index')->with('success', 'Pengeluaran berhasil diupdate.');
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
            // Temukan record berdasarkan ID
            $item = DB::table('pengeluaran')->where('id', $id)->first();

            // Jika record tidak ditemukan, lemparkan pengecualian
            if (!$item) {
                throw new \Exception("Data dengan ID $id tidak ditemukan.");
            }

            // Hapus record berdasarkan ID
            DB::table('pengeluaran')->where('id', $id)->delete();

            DB::commit();
            return redirect()->route('admin.pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }
}
