<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helper\Helper;
use App\Models\Donor;
use App\Models\User;
use App\Http\Controllers\Traits\History;

class MedicalHistoryController extends Controller
{
    use History;

    public function index()
    {
        $user = User::findOrFail(session('id'));

        $data = [
            'title' => 'Riwayat Medis',
            'content' => 'medicalhistory',
            'donor' => $user->donor,
            'logs' => Helper::getLogs(session('id')),
        ];
        if( request()->header('X-PJAX') ) {
            return view('medicalhistory', ['data' => $data]);
        } else {
            return view('layout.index', ['data' => $data]);
        }
    }

    public function store()
    {
        $user = User::findOrFail(session('id'));
        $donor = $user->donor;
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
            "gol_darah" => "required",
            "rhesus" => "required",
        ], [
            "gol_darah.required" => "Golongan darah wajib dipilih!",
            "rhesus.required" => "Rhesus darah wajib dipilih!",
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => 422,
                'error' => $validator->errors(),
            ];
        } else {
            $donor->update([
                'gol_darah' => request('gol_darah'),
                'rhesus' => request('rhesus'),
                'melahirkan_gugur' => request('melahirkan_gugur'),
                'tanggal_melahirkan_gugur' => request('tanggal_melahirkan_gugur'),
                'diabetes' => request('diabetes'),
                'hepatitis' => request('hepatitis'),
                'aids' => request('aids'),
                'perokok' => request('perokok'),
                'covid' => request('covid'),
                'tanggal_sembuh_covid' => request('tanggal_sembuh_covid'),
                'vaksin' => request('vaksin'),
                'jenis_vaksin' => request('jenis_vaksin'),
                'tanggal_vaksin' => request('tanggal_vaksin'),
            ]);
            $this->onChange("data medis", session('id'));
            $response = [
                'status' => 200,
                'message' => 'Berhasil menyimpan',
            ];
        }
        return response()->json($response);
    }
}
