<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table      = 'kecamatan';
    protected $primaryKey = 'code';

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_code', 'code');
    }
}
