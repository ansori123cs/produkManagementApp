<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Total semua produk
        $totalProduk = Produk::count();

        // Produk yang bisa dijual
        $produkBisaDijual = Produk::whereHas('status', function ($query) {
            $query->where('nama_status', 'bisa dijual');
        })->count();

        // Produk yang tidak bisa dijual
        $produkTidakDijual = Produk::whereHas('status', function ($query) {
            $query->where('nama_status', 'tidak bisa dijual');
        })->count();

        // Total kategori
        $totalKategori = Kategori::count();

        // List semua kategori dengan jumlah produk
        $kategoriWithCount = Kategori::withCount(['produk' => function ($query) {
            $query->whereHas('status', function ($q) {
                $q->where('nama_status', 'bisa dijual');
            });
        }])->get();


        // Statistik harga


        return view('welcome', compact(
            'totalProduk',
            'produkBisaDijual',
            'produkTidakDijual',
            'totalKategori',
            'kategoriWithCount',
        ));
    }
}
