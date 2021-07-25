<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'kabupaten_code',
    ];

    protected function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    protected function location()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_code');
    }
}
