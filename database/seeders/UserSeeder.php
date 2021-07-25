<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            //    'name' => 'Super Admin',
                'password' => Hash::make('superadmin'),
                'email' => 'vincentiadksitanggang@gmail.com',
                'email_verified_at' => now(),
                'role_id' => '1',
                'userable_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            //    'name' => 'Donor',
                'password' => Hash::make('donor'),
                'email' => 'donor@gmail.com',
                'email_verified_at' => now(),
                'role_id' => '2',
                'userable_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('donors')->insert([
            [
                'nama_ktp' => 'Super Admin',
                'created_at' => now(),
                'updated_at' => now(),
                'jenis_kelamin' => 'P'
            ],
            [
                'nama_ktp' => 'Donor Satu',
                'created_at' => now(),
                'updated_at' => now(),
                'jenis_kelamin' => 'P'
            ]
        ]);
    }
}
