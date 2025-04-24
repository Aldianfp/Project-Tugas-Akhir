<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    use HasFactory;
    protected $table = 'peralatan';
    protected $guarded = ['id'];

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
