@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Tambah Produk Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="id_produk" class="form-label">ID Produk *</label>
                    <input type="number" class="form-control @error('id_produk') is-invalid @enderror" 
                           id="id_produk" name="id_produk" value="{{ old('id_produk') }}" required>
                    @error('id_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="nama_produk" class="form-label">Nama Produk *</label>
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" 
                           id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}" required>
                    @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="harga" class="form-label">Harga *</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                               id="harga" name="harga" value="{{ old('harga') }}" required min="0" step="100">
                    </div>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="kategori_id" class="form-label">Kategori *</label>
                    <select class="form-select @error('kategori_id') is-invalid @enderror" 
                            id="kategori_id" name="kategori_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}" 
                                {{ old('kategori_id') == $kat->id_kategori ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="status_id" class="form-label">Status *</label>
                    <select class="form-select @error('status_id') is-invalid @enderror" 
                            id="status_id" name="status_id" required>
                        <option value="">Pilih Status</option>
                        @foreach($status as $stat)
                            <option value="{{ $stat->id_status }}" 
                                {{ old('status_id') == $stat->id_status ? 'selected' : '' }}>
                                {{ $stat->nama_status }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection