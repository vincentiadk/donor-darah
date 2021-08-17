<?php

namespace App\Http\Controllers\Traits;

use App\Models\Log;
use App\Models\User;

trait History 
{
    public function onCreate($text, $user_id)
    {
        Log::create([
            'user_id' => $user_id,
            'activity' => "menambah " . $text,
        ]);
    }

    public function onChange($text, $user_id)
    {
        Log::create([
            'user_id' => $user_id,
            'activity' => "mengubah " . $text,
        ]);
    }

    public function onDelete($text, $user_id)
    {
        Log::create([
            'user_id' => $user_id,
            'activity' => "menghapus " . $text,
        ]);
    }

}
