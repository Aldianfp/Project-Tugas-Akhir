<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $guarded = ['id'];

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class);
    }


    public function showData()
    {
        $portofolio = DB::table('pemasukan')
            ->leftJoin('portofolio', 'pemasukan.proyek_id', '=', 'portofolio.id')
            ->get();

        return $portofolio;
    }
}
