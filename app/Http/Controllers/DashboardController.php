<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();

        $produkBisaDijual = Produk::whereHas('status', function ($query) {
            $query->where('nama_status', 'bisa dijual');
        })->count();

        $produkTidakDijual = Produk::whereHas('status', function ($query) {
            $query->where('nama_status', 'tidak bisa dijual');
        })->count();

        $totalKategori = Kategori::count();

        $kategoriWithCount = Kategori::withCount(['produk' => function ($query) {
            $query->whereHas('status', function ($q) {
                $q->where('nama_status', 'bisa dijual');
            });
        }])->get();

        return view('welcome', compact(
            'totalProduk',
            'produkBisaDijual',
            'produkTidakDijual',
            'totalKategori',
            'kategoriWithCount',
        ));
    }
}
