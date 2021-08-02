<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (session('id')) {
            return redirect('admin/dashboard');
        } else {
            if (request()->has('_token')) {
                $username = request('username');
                $password = request('password');
                $fieldType = filter_var(request('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
                $query = User::where("$fieldType", $username)->whereNotNull('email_verified_at');

                if ($query->count() > 0) {
                    if ($query->first()->enable == 0) {
                        return redirect()->back()->with([
                            'failed' => 'Maaf, akun Anda tidak aktif.',
                        ]);
                    } else {
                        if (Hash::check($password, $query->first()->password)) {
                            $user = $query->first();
                            $time = now();
                            session([
                                'id' => $user->id,
                                'role_id' => $user->role_id,
                                'email' => $user->email,
                                'last_login' => $time,
                            ]);
                            $user->update([
                                'last_login' => $time,
                            ]);
                            Log::create([
                                'user_id' => session('id'),
                                'activity' => 'login',
                            ]);
                            return redirect('admin/dashboard');
                        } else {
                            return redirect()->back()->with([
                                'failed' => 'Maaf, password tidak sesuai.',
                            ]);
                        }
                    }
                } else {
                    return redirect()->back()->with([
                        'failed' => 'Maaf, username/email Anda tidak ditemukan',
                    ]);
                }
            } else {
                return view('login');
            }
        }
    }

    public function logout()
    {
        Log::create([
            'user_id' => session('id'),
            'activity' => 'logout',
        ]);
        session()->flush();
        return redirect('/login');
    }

    public function checkLogin()
    {
        if (session()->has('id')) {
            return "true";
        } else {
            return "false";
        }
    }

    public function registration()
    {
        if (request()->has('_token')) {
            $validator = Validator::make(request()->all(), [
                'nama_ktp' => "required",
                'email' => 'required|email|unique:users,email',
                'whatsapp' => 'required|numeric|unique:donors,whatsapp',
                'gol_darah' => 'required',
                'rhesus' => 'required',
                'password' => 'confirmed|required|min:6',
            ], [
                'nama_ktp.required' => 'Nama wajib diisi!',
                'email.required' => 'Email wajib diisi!',
                'email.unique' => 'Email Telah Terdaftar!',
                'whatsapp.required' => 'Nomor WhatsApp wajib diisi!',
                'whatsapp.numeric' => 'Nomor WhatsApp harus berupa angka!',
                'whatsapp.unique' => "Nomor Whatsapp sudah terdaftar!",
                'gol_darah.required' => 'Golongan darah wajib diisi!',
                'rhesus.required' => 'Rhesus wajib diisi!',
                'password.confirmed' => 'Password konfirmasi harus sama dengan password awal!',
                'password.required' => 'Password harus diisi!',
                'password.min' => 'Password minimal terdiri dari 6 karakter!',
            ]);
            if ($validator->fails()) {
                $response = [
                    'status' => 422,
                    'error' => $validator->errors(),
                ];
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator);
            }
            try {
                $donor = Donor::create([
                    'nama_ktp' => request('nama_ktp'),
                    'nama_panggilan' => count(explode(' ', request('nama_ktp'))) > 0 ? explode(' ', request('nama_ktp'))[0] : request('nama_ktp'),
                    'gol_darah' => request('gol_darah'),
                    'rhesus' => request('rhesus'),
                    'whatsapp' => '62' . request('whatsapp'),
                ]);
                $user = User::create([
                    'email' => request('email'),
                    'password' => Hash::make(request('password')),
                    'userable_id' => $donor->id,
                    'role_id' => 2,
                    'no_telp'   => '62' . request('whatsapp'),
                    'email_verified_at' => date('Y-m-d'),
                ]);
                $time = now();
                session([
                    'id' => $user->id,
                    'role_id' => $user->role_id,
                    'email' => $user->email,
                    'last_login' => $time,
                ]);
                $user->update([
                    'last_login' => $time,
                ]);
                Log::create([
                    'user_id' => session('id'),
                    'activity' => 'login',
                ]);
                return redirect('admin/dashboard');
            } catch (\Exception $e) {
                return redirect()->back()->with([
                    'failed' => 'Server Error, gagal daftar!',
                ]);
            }

        } else {
            return view('register');
        }
    }

}
