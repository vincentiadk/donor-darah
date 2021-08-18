<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Reseptor;
use Illuminate\Http\Request;

class NeedBloodController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Membutuhkan Darah',
            'content' => 'needblood',
            'logs' => Helper::getLogs(session('id')),
        ];
        if (request()->header('X-PJAX')) {
            return view('needblood', ['data' => $data]);
        } else {
            return view('layout.index', ['data' => $data]);
        }

    }

    public function datatable(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $totalData = Reseptor::count();
        $search = $request->input('search.value');

        $filtered = Reseptor::whereHas('detail', function ($q) use ($search) {
            $q->where("nama_ktp", "LIKE", "%$search%")
                ->orWhere("instansi", "LIKE", "%$search%");
            if(strlen($search) > 3) {
                if (strtolower(str_contains($search, "laki"))) {
                    $q->orWhere("jenis_kelamin", "l");
                }
                if (strtolower(str_contains($search, "peremp"))) {
                    $q->orWhere("jenis_kelamin", "p");
                }
            }
        })->orWhereHas("detail.provinsi", function ($q) use ($search) {
            $q->where("name", "LIKE", "%$search%");
        })->orWhereHas("detail.kabupaten", function ($q) use ($search) {
            $q->where("name", "LIKE", "%$search%");
        })->orWhereHas("detail.kecamatan", function ($q) use ($search) {
            $q->where("name", "LIKE", "%$search%");
        });
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
                    $val->createdBy && $val->createdBy->donor && ($val->createdBy->donor->whatsapp != "") ? '<a href="https://api.whatsapp.com/send?phone=' . $val->createdBy->donor->whatsapp . 'text=Halo%2C%20saya%20bisa%20membantu%20mendonorkan%20darah%20untuk%20' . $val->detail->nama_ktp . '">WA</a>' : '',
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
