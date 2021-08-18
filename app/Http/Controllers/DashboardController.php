<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $donor = User::find(session('id'))->donor;
        $data = [
            'title' => 'Data Diri',
            'content' => 'profile',
            'donor' => $donor,
            'logs' => Helper::getLogs(session('id')),
        ];
        
        if( request()->header('X-PJAX') ) {
            return view('profile', ['data' => $data]);
        } else {
            return view('layout.index', ['data' => $data]);
        }
    }
}
