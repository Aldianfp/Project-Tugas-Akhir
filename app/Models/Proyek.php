<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;
    protected $table = 'proyek';
    protected $guarded = ['id'];
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date'
    ];
}
