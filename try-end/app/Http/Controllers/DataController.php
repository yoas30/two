<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
        public function tampilDataOperators()
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

        public function destroyOperator($operator_id)
            {
                $response = Http::delete("http://localhost:8080/operators/$operator_id");

                if ($response->successful()) {
                    return redirect('/data')->with('success', 'Data berhasil dihapus');
                } else {
                    return back()->with('error', 'Gagal menghapus data');
                }
            }
        
        public function tampilDataAktivitas()
        {
            $response = Http::get('http://localhost:8080/aktivitas');

            //cek request
            if ($response->successful()) { 
                // $ambilData = $response->json(); //ubah ke array
                 $ambilDataAktivitas = collect($response->json())->sortBy('nama_alat')->values(); // ubah ke array dan urutkan berdasarkan 'nama'
                return view('data.aktivitas', compact('ambilDataAktivitas')); //kirim data ke view
            } else {
                return $response->json(['error' => 'Gagal mengambil data dari API'], 500);
            } 
        }

        public function destroyAktivitas($id)
            {
                $response = Http::delete("http://localhost:8080/aktivitas/$id");

                if ($response->successful()) {
                    return redirect('/aktivitas')->with('success', 'Data berhasil dihapus');
                } else {
                    return back()->with('error', 'Gagal menghapus data');
                }
            }

}