@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="table-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Produk</h2>
        <a href="{{ route('produk.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Produk
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Filter Form Sederhana -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('produk.filter') }}" class="row g-3">
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="all">Semua Status</option>
                        <option value="bisa dijual" selected>Bisa Dijual</option>
                        <option value="tidak bisa dijual">Tidak Bisa Dijual</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="kategori" class="form-select">
                        <option value="all">Semua Kategori</option>
                        @php
                        $kategoriList = App\Models\Kategori::all();
                        @endphp
                        @foreach($kategoriList as $kategori)
                        <option value="{{ $kategori->nama_kategori }}">
                            {{ $kategori->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama produk...">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>

            <div class="mt-2">
                <small class="text-muted">
                    <i class="bi bi-info-circle"></i> Default: menampilkan produk dengan status "bisa dijual"
                </small>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="produkTable" class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $item)
                <tr>
                    <td>{{ $item->id_produk }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->kategori->nama_kategori }}</td>
                    <td>
                        <span class="badge bg-{{ $item->status->nama_status == 'bisa dijual' ? 'success' : 'danger' }}">
                            {{ $item->status->nama_status }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('produk.edit', $item->id_produk) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form id="delete-form-{{ $item->id_produk }}"
                                action="{{ route('produk.destroy', $item->id_produk) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn btn-sm btn-danger"
                                    onclick="confirmDelete(event, 'delete-form-{{ $item->id_produk }}')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Inisialisasi DataTables sekali saja
    $(document).ready(function() {
        initDataTable();

        // Saat form filter di-submit, hancurkan DataTables
        $('#filterForm').on('submit', function() {
            if ($.fn.DataTable.isDataTable('#produkTable')) {
                $('#produkTable').DataTable().destroy();
            }
        });
    });

    function initDataTable() {
        $('#produkTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
            },
            pageLength: 10,
            order: [
                [0, 'asc']
            ]
        });
    }
</script>
@endsection