<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helper\Helper;
use App\Models\Donor;
use App\Models\DonorHistory;
use App\Http\Controllers\Traits\History;

class DonorHistoryController extends Controller
{
    use History;

    public function index()
    {
        $data = [
            'title' => 'Riwayat Donor Darah',
            'content' => 'donorhistory',
            'logs' => Helper::getLogs(session('id')),
        ];
        if( request()->header('X-PJAX') ) {
            return view('donorhistory', ['data' => $data]);
        } else {
            return view('layout.index', ['data' => $data]);
        }
    }

    public function show()
    {
        if (request('id') > 0) {
            $donorhistory = DonorHistory::findOrFail(request('id'));
        } else {
            $donorhistory = new DonorHistory;
        }
        $data = [
            'title' => 'Tambah Riwayat Donor Darah',
            'content' => 'donorhistory-form',
            'logs' => Helper::getLogs(session('id')),
            'donorhistory'  => $donorhistory
        ];
        if( request()->header('X-PJAX') ) {
            return view('donorhistory-form', ['data' => $data]);
        } else {
            return view('layout.index', ['data' => $data]);
        }
    }

    public function datatable(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $totalData = DonorHistory::where('donor_id', session('id'))->count();
        $search = $request->input('search.value');

        $filtered = DonorHistory::where('donor_id', session('id'));
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
                    $val->jenisDonor(),
                    '<a href="' . url('admin/donor-history/show?id=' . $val->id) . '" class="btn btn-success page">Ubah</a><a href="#" onclick="delHistory('.$val->id.')" class="btn btn-danger">Hapus</a>',
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
            if(request('id') > 0) {
                $donorhistory = DonorHistory::findOrFail(request('id'));
                $donorhistory->update([
                    'tanggal_donor'=> request('tanggal_donor'),
                    'instansi' => request('instansi'),
                    'reseptor_id'=> request('reseptor_id'),
                    'jenis_donor' => request('jenis_donor')
                ]);
                $this->onChange("riwayat donor", session('id'));
            } else {
                DonorHistory::create([
                    'donor_id' => request('donor_id'),
                    'tanggal_donor'=> request('tanggal_donor'),
                    'instansi' => request('instansi'),
                    'reseptor_id'=> request('reseptor_id'),
                    'jenis_donor' => request('jenis_donor')
                ]);
                $this->onCreate("riwayat donor", session('id'));
            }
            $response = [
                'status' => 200,
                'message' => 'Berhasil menyimpan',
            ];
        }
        return response()->json($response);
    }

    public function delete()
    {
        DonorHistory::where('id', request('id'))
            ->delete();
        $this->onDelete("riwayat donor", session('id'));
        $response = [
            'status' => 200,
            'message' => 'Berhasil menghapus',
        ];
        return response()->json($response);
    }
}