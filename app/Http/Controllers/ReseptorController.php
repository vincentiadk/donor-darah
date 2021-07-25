<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Donor;
use App\Models\Reseptor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReseptorController extends Controller
{
    public function index()
    {
        $reseptor = Reseptor::where('created_by', session('id'))->get();
        $data = [
            'title' => 'Reseptor',
            'content' => 'reseptor',
            'reseptors' => $reseptor,
            'logs' => Helper::getLogs(session('id')),
        ];
        return view('layout.index', ['data' => $data]);
    }

    public function view($id)
    {
        $donor = Donor::findOrFail($id);
        $data = [
            'donor' => $donor,
        ];
        return view('reseptor-detail', ['data' => $data]);
    }

    public function donorPotential($id)
    {
        $reseptor = Donor::findOrFail($id);
        if ($reseptor->jenis_donor == 1) { // biasa
            $donors = Donor::where('gol_darah', $reseptor->gol_darah)
                ->where('rhesus', $reseptor->rhesus)
                ->whereHas('location_preference', function ($query) use ($reseptor) {
                    $query->where('kabupaten_code', $reseptor->kabupaten_code);
                })
                ->whereNot('id', $reseptor->id)
                ->get();
        } else {
            $donors = Donor::where('gol_darah', $reseptor->gol_darah)
                ->where('rhesus', $reseptor->rhesus)
                ->where('id', '!=', $reseptor->id)
                ->whereHas('location_preference', function ($query) use ($reseptor) {
                    $query->where('kabupaten_code', $reseptor->kabupaten_code);
                })
                ->where('covid', 1)
                ->get()->filter(function ($item) {
                return $item->tglsembuhcovid > 21;
                return $item->tglmelahirkangugur > 365;
            });
        }
        $data = [
            'donor' => $donors,
        ];
        return view('reseptor-potential', ['data' => $data]);
    }
    public function add()
    {
        $data = [
            'title' => 'Tambah Reseptor',
            'content' => 'reseptor-add',
            'logs' => Helper::getLogs(session('id')),
        ];
        return view('layout.index', ['data' => $data]);
    }
    public function store()
    {
        if (request('donor_id') > 0) {
            $reseptor = Donor::findOrFail(session('id'));
        } else {
            $reseptor = new Donor();
        }
        $message = '';
        $validator = Validator::make(request()->all(), [
            "gol_darah" => "required",
            "rhesus" => "required",
            "jenis_donor" => "required",
            "kabupaten_code" => "required",
            "province_code" => "required",
        ], [
            "nama_ktp.required" => "Nama sesuai KTP wajib di isi!",
            "no_ktp.required" => "Nomor KTP wajib di isi!",
            "no_ktp.unique" => "Nomor KTP telah ada!",
            "gol_darah.required" => "Golongan darah wajib dipilih!",
            "rhesus.required" => "Rhesus wajib dipilih!",
            "jenis_donor.required" => "Jenis donor darah wajib dipilih!",
            "province_code.required" => "Provinsi reseptor wajib dipilih!",
            "kabupaten_code.required" => "Kabupatan/Kota reseptor wajib dipilih!",
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => 422,
                'error' => $validator->errors(),
            ];
        } else {
            $donor = Donor::updateOrCreate([
                'id' => $reseptor->id,
            ], [
                'nama_ktp' => request('nama_ktp'),
                'nama_panggilan' => request('nama_panggilan'),
                'no_ktp' => request('no_ktp'),
                'tanggal_lahir' => request('tanggal_lahir'),
                'jenis_kelamin' => request('jenis_kelamin'),
                'provinsi_code' => request('provinsi_code'),
                'kabupaten_code' => request('kabupaten_code'),
                'kelurahan_code' => request('kelurahan_code'),
                'kecamatan_code' => request('kecamatan_code'),
                'gol_darah' => request('gol_darah'),
                'rhesus' => request('rhesus'),
                'peruntukan' => request('peruntukan'),
                'jenis_donor' => request('jenis_donor'),
                'instansi' => request('instansi'),
            ]);
            Reseptor::firstOrCreate([
                'donor_id' => $donor->id,
            ], [
                'created_by' => session('id'),
            ]);
            $response = [
                'status' => 200,
                'message' => 'Berhasil menyimpan',
            ];
        }
        return response()->json($response);
    }
}
