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
        'jenis_donor'
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    public function reseptor()
    {
        return $this->belongsTo(Donor::class, 'reseptor_id');
    }

    public function jenis_donor()
    {
        if($this->jenis_donor == '1') {
            return "Biasa";
        } else if($this->jenis_donor == '2') {
            return "Plasma Kovalen";
        } else {
            return "";
        }
    }
}
