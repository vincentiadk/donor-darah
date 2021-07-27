<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helper\Helper;
use App\Models\Donor;
use App\Models\DonorHistory;

class DonorHistoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Riwayat Donor Darah',
            'content' => 'donorhistory',
            'logs' => Helper::getLogs(session('id')),
        ];
        return view('donorhistory', ['data' => $data]);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Riwayat Donor Darah',
            'content' => 'donorhistory-add',
            'logs' => Helper::getLogs(session('id')),
        ];
        return view('donorhistory-add', ['data' => $data]);
    }

    public function datatable(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $totalData = DonorHistory::count();
        $search = $request->input('search.value');

        $filtered = DonorHistory::query();
        $totalFiltered = $filtered->count();

        $queryData = $filtered->offset($start)
            ->limit($length)
            ->get();
            
        $response['data'] = [];
        if ($queryData != false) {
            $nomor = $start + 1;
            foreach ($queryData as $val) {
                $response['data'][] = [
                    $nomor,
                    $val->tanggal_donor,
                    $val->instansi,
                    $val->jenis_donor(),
                    '<a href="#" class="btn btn-success">Ubah</a> <a href="#" class="btn btn-danger">Hapus</a>',
                    ];
                $nomor++;
            }
        }
        $response['recordsTotal'] = 0;
        if ($totalData != false) {
            $response['recordsTotal'] = $totalData;
        }

        $response['recordsFiltered'] = 0;
        if ($totalFiltered != false) {
            $response['recordsFiltered'] = $totalFiltered;
        }
        return response()->json($response);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            "tanggal_donor" => "required",
            "instansi"  => "required"
        ], [
            "tanggal_donor.required" => "Tanggal donor darah wajib diisi!",
            "instansi.required" => "Instansi/RS tempat donor darah wajib diisi!",
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => 422,
                'error' => $validator->errors(),
            ];
        } else {
            DonorHistory::create([
                'donor_id' => request('donor_id'),
                'tanggal_donor'=> request('tanggal_donor'),
                'instansi' => request('instansi'),
                'reseptor_id'=> request('reseptor_id'),
                'jenis_donor' => request('jenis_donor')
            ]);
            $response = [
                'status' => 200,
                'message' => 'Berhasil menyimpan',
            ];
        }
        return response()->json($response);
    }
}