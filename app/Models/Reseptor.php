<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseptor extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'create_by'
    ];

    public function detail()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
