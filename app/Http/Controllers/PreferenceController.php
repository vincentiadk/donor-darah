<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\LocationPreference;
use App\Models\User;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(session('id'));
        $location_preferens = LocationPreference::where('donor_id', $user->userable_id)->get();
        $data = [
            'title' => 'Kesediaan Mendonorkan Darah',
            'content' => 'preference',
            'location_preferens' => $location_preferens,
            'donor' => $user->donor,
            'logs' => Helper::getLogs(session('id')),
        ];
        return view('layout.index', ['data' => $data]);
    }

    public function store()
    {
        $user = User::findOrFail(session('id'));
        $donor = $user->donor;
        if (request('type') == 'location') {
            LocationPreference::firstOrCreate([
                'donor_id' => $user->userable_id,
                'kabupaten_code' => request('kabupaten_code'),
            ], [
                'kabupaten_code' => request('kabupaten_code'),
            ]);
        }
        if (request('is_donor_biasa')) {
            $donor->update(['is_donor_biasa' => request('is_donor_biasa')]);
        }
        if (request('is_donor_plasma')) {
            $donor->update(['is_donor_plasma' => request('is_donor_plasma')]);
        }
        $response = [
            'status' => 200,
            'message' => 'Berhasil menyimpan',
        ];
        return response()->json($response);
    }

    public function deleteLocation()
    {
        \Log::info(request('donor_id'));
        \Log::info(request('kabupaten_code'));
        $locs = LocationPreference::where('donor_id', request('donor_id'))
            ->where('kabupaten_code', request('kabupaten_code'))
            ->delete();

        $response = [
            'status' => 200,
            'message' => 'Berhasil menghapus',
        ];
        return response()->json($response);
    }
}
