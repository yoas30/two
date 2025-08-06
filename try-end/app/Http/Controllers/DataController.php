<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
        public function tampilData()
        {
            $response = Http::get('http://localhost:8080/operators');

            //cek request
            if ($response->successful()) { 
                // $ambilData = $response->json(); //ubah ke array
                 $ambilData = collect($response->json())->sortBy('nama')->values(); // ubah ke array dan urutkan berdasarkan 'nama'
                return view('data.index', compact('ambilData')); //kirim data ke view
            } else {
                return $response->json(['error' => 'Gagal mengambil data dari API'], 500);
            } 
        }
}