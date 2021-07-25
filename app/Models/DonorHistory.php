<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorHistory extends Model
{
    use HasFactory;
    protected $table = "donor_histories";
    protected $fillable = [
        'donor_id',
        'tanggal_donor',
        'instansi',
        'reseptor_id',
    ];

    protected function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    protected function reseptor()
    {
        return $this->belongsTo(Donor::class, 'reseptor_id');
    }
}
