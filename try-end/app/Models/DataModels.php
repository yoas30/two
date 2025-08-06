<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class DataModels extends Model
{
    public function tampilData()
    {
        $response = Http::get('http://localhost:8000/aktivitas');
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch data'], 500);
        }
        return $response->json(['error', 'Gagal mengambil data']);
        
        $data = $response->json();
        view('data.index', compact('data'));
    }
}