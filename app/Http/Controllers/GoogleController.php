<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Log;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('email', $user->email)->first();

        if (!$finduser) {
            User::where('social_type', 'google')
                ->where('social_id', $user->id)
                ->first();
        }
        $time = now();
        if ($finduser) {
            session([
                'id' => $finduser->id,
                'username' => $finduser->username,
                'role_id' => $finduser->role_id,
                'email' => $finduser->email,
                'name' => $finduser->name,
                'last_login' => $time,
            ]);
            $finduser->update([
                'last_login' => $time,
                'social_type' => 'google',
                'social_id' => $user->id,
            ]);
            Log::create([
                'user_id' => session('id'),
                'activity' => 'login',
            ]);
            return redirect()->intended('admin/dashboard')->with(['success' => 'Sukses Login dengan Google!']);

        } else {
            $donor = Donor::create([
                'nama_ktp' => $user->name,
                'nama_panggilan' => $user->name,
            ]);
            $newUser = User::create([
                'email' => $user->email,
                'social_id' => $user->id,
                'social_type' => 'google',
                'role_id' => 2,
                'userable_id' => $donor->id,
            ]);

            session([
                'id' => $newUser->id,
                'username' => $newUser->username,
                'role_id' => $newUser->role_id,
                'email' => $newUser->email,
                'name' => $newUser->name,
                'last_login' => $time,
            ]);

            return redirect()->intended('admin/dashboard')->with(['success' => 'Sukses Login dengan Google!']);
        }
    }
}
