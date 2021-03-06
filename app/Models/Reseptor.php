<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseptor extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'created_by'
    ];

    public function detail()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
