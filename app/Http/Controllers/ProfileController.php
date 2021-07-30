<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helper\Helper;
use App\Models\Donor;
use App\Models\LocationPreference;

class ProfileController extends Controller
{
    public function index()
    {
        $donor = Donor::find(session('id'));
        $data = [
            'title' => 'Data Diri',
            'content' => 'profile',
            'donor' => $donor,
            'logs' => Helper::getLogs(session('id')),
        ];
        return view('profile', ['data' => $data]);
    }

    public function store()
    {
        $donor = Donor::findOrFail(session('id'));
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });
        Validator::extend(
            'telp', function ($attr, $value) {
                if (substr($value, 0, 2) === "62") {
                    return true;
                } else {
                    return false;
                }
            });
        $message = '';
        $validator = Validator::make(request()->all(), [
            "nama_ktp" => "required",
            "no_ktp" => "required|numeric|min:16|unique:donors,no_ktp," . $donor->id,
            "email" => "required|email|unique:users,email," . $donor->user->id,
            "whatsapp" => "numeric|without_spaces|telp|unique:donors,whatsapp," . $donor->id,
            "no_telp" => "numeric|without_spaces|telp|unique:users,no_telp," . $donor->user->id
        ], [
            "nama_ktp.required" => "Nama sesuai KTP wajib di isi!",
            "no_ktp.required" => "Nomor KTP wajib di isi!",
            "no_ktp.unique" => "Nomor KTP telah ada!",
            "no_ktp.min" => "Nomor KTP minimum 16 digit!",
            "no_ktp.numeric" => "Nomor KTP harus berupa angka!",
            "whatsapp.numeric" => "Nomor Whatsapp harus berupa angka!",
            "whatsapp.unique" => "Nomor Whatsapp sudah ada!",
            "whatsapp.telp" => "Nomor Whatsapp harus diawali angka 62",
            "email.required" => "Email wajib di isi!",
            "email.unique" => "Email telah terdaftar!",
            "email.email" => "Email tidak valid!",
            "no_telp.unique"   => "Nomor Telepon sudah terdaftar!",
            "no_telp.numeric"   => "Nomor Telepon harus berupa angka!",
            "no_telp.telp"  => "Nomor Telepon harus diawali angka 62",
            
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => 422,
                'error' => $validator->errors(),
            ];
        } else {
            $donor->update([
                'nama_ktp' => request('nama_ktp'),
                'nama_panggilan' => request('nama_panggilan'),
                'no_ktp' => request('no_ktp'),
                'tanggal_lahir' => request('tanggal_lahir'),
                'jenis_kelamin' => request('jenis_kelamin'),
                'email' => request('email'),
                'whatsapp' => request('whatsapp'),
                'provinsi_code' => request('provinsi_code'),
                'kabupaten_code' => request('kabupaten_code'),
                'kelurahan_code' => request('kelurahan_code'),
                'kecamatan_code' => request('kecamatan_code'),
            ]);
            if(request('kabupaten_code') != "") {
                LocationPreference::firstOrCreate([
                    'donor_id' => $donor->id,
                    'kabupaten_code' => request('kabupaten_code'),
                ], [
                    'kabupaten_code' => request('kabupaten_code'),
                ]);
            }
            $user = $donor->user;
            $user->update([
                'no_telp' => request('no_telp'),
                'email' => request('email')
            ]);
            $response = [
                'status' => 200,
                'message' => 'Berhasil menyimpan',
            ];
        }
        return response()->json($response);
    }
}
