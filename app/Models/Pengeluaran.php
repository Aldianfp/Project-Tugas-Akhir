<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $guarded = ['id'];

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class);
    }

    // public function kategori()
    // {
    //     return $this->belongsTo(KategoriPengeluaran::class, 'kategori_pengeluaran_id', 'id');
    // }
}
