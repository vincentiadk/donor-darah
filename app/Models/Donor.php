<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $table = "donors";
    protected $fillable = [
        'nama_ktp',
        'nama_panggilan',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_ktp',
        'whatsapp',
        'gol_darah',
        'rhesus',
        'melahirkan_gugur',
        'tanggal_melahirkan_gugur',
        'diabetes',
        'hepatitis',
        'aids',
        'perokok',
        'covid',
        'tanggal_sembuh_covid',
        'vaksin',
        'jenis_vaksin',
        'tanggal_vaksin',
        'instansi',
        'peruntukan',
        'jenis_donor',
        'is_donor_biasa',
        'is_donor_plasma',
        'provinsi_code',
        'kabupaten_code',
        'kecamatan_code',
        'kelurahan_code',
    ];

    public function getAgeAttribute() 
    {
        return \Carbon\Carbon::parse($this->tanggal_lahir)->diffInYears(\Carbon\Carbon::now());
    }
    public function getTglLahirGugurAttribute() 
    {
        $tgl = $this->tanggal_melahirkan_gugur;
        if($this->tanggal_melahirkan_gugur == null) {
            $tgl = now();
        }
        return \Carbon\Carbon::parse($tgl)->diffInDays(\Carbon\Carbon::now());
    }
    public function getTglSembuhCovidAttribute() 
    {
        $tgl = $this->tanggal_sembuh_covid;
        if($this->tanggal_sembuh_covid == null) {
            $tgl = now();
        }
        return \Carbon\Carbon::parse($tgl)->diffInDays(\Carbon\Carbon::now());
    }
    public function donor_history()
    {
        return $this->hasMany(DonorHistory::class, 'donor_id');
    }
    public function location_preference()
    {
        return $this->hasMany(LocationPreference::class, 'donor_id');
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_code', 'code');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_code', 'code');
    }
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_code', 'code');
    }
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_code', 'code');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'userable_id');
    }
    public function jenis_kelamin()
    {
        if(strtolower($this->jenis_kelamin) == 'l') {
            return "Laki-laki";
        } else if(strtolower($this->jenis_kelamin) == 'p') {
            return "Perempuan";
        } else {
            return "";
        }
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
    public function jenis_vaksin()
    {
        if($this->jenis_vaksin == 1) {
            return "Sinovac";
        } else if($this->jenis_vaksin == 2) {
            return "Astra Zeneca";
        } else if($this->jenis_vaksin == 3) {
            return "Pfitzer";
        }  else if($this->jenis_vaksin == 4) {
            return "Moderna";
        } else {
            return "";
        }
    }
}
