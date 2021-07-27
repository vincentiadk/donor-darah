<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\Donor;

class DashboardController extends Controller
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
        return view('layout.index', ['data' => $data]);
    }
}
