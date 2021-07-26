<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $Csv = new CsvToArray();
        $file = $file = public_path('website/csv/cities.csv');
        $header = ['code', 'provinsi_code', 'name', 'latitude', 'longitude'];
        $data = $Csv->csv_to_array($file, $header);
        $data = array_map(function ($arr) use ($now) {
            return $arr + ['created_at' => $now, 'updated_at' => $now];
        }, $data);

        $collection = collect($data);
        foreach ($collection->chunk(50) as $chunk) {
            DB::table('kabupaten')->insert($chunk->toArray());
        }
    }
}
