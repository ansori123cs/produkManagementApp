<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::with(['kategori', 'status'])
            ->whereHas('status', function ($query) {
                $query->where('nama_status', 'bisa dijual');
            })
            ->get();

        return view('produk.index', compact('produk'));
    }

    public function filter(Request $request)
    {
        $query = Produk::with(['kategori', 'status']);

        if ($request->has('status') && $request->status !== 'all') {
            $query->whereHas('status', function ($q) use ($request) {
                $q->where('nama_status', $request->status);
            });
        } else {
            $query->whereHas('status', function ($q) {
                $q->where('nama_status', 'bisa dijual');
            });
        }

        if ($request->has('kategori') && $request->kategori !== 'all') {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('nama_kategori', $request->kategori);
            });
        }

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        $produk = $query->orderBy('id_produk')->get();
        $kategoriList = Kategori::all();

        return view('produk.index', compact('produk', 'kategoriList'));
    }


    public function create()
    {
        $kategori = Kategori::all();
        $status = Status::all();
        return view('produk.create', compact('kategori', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|integer|unique:produk,id_produk',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'status_id' => 'required|exists:status,id_status',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        $status = Status::all();
        return view('produk.edit', compact('produk', 'kategori', 'status'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'id_produk' => 'required|integer|unique:produk,id_produk,' . $produk->id_produk . ',id_produk',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'status_id' => 'required|exists:status,id_status',
        ]);

        $produk->update($request->all());

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
