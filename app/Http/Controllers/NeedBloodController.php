<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\Reseptor;

class NeedBloodController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Membutuhkan Darah',
            'content' => 'needblood',
            'logs' => Helper::getLogs(session('id')),
        ];
        return view('needblood', ['data' => $data]);
    }

    public function datatable(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $totalData = Reseptor::count();
        $search = $request->input('search.value');

        $filtered = Reseptor::query();
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
                    $val->detail->nama_ktp,
                    $val->detail->jenis_kelamin(),
                    $val->detail->age,
                    $val->detail->jenis_donor(),
                    $val->detail->keperluan,
                    $val->detail->provinsi ? $val->detail->provinsi->name : "",
                    $val->detail->kabupaten ? $val->detail->kabupaten->name : "",
                    $val->detail->kecamatan ? $val->detail->kecamatan->name : "",
                    $val->detail->instansi,
                    $val->detail->whatsapp != "" ? '<a href="https://api.whatsapp.com/send?phone='.$val->detail->whatsapp.'text=Halo%2C%20saya%20bisa%20membantu%20mendonorkan%20darah.">WA</a>' : ''
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

}
