<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - Aplikasi Produk</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

  <style>
    .main-content {
      padding: 20px 0;
    }

    .table-container {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .action-buttons {
      display: flex;
      gap: 5px;
    }

    .navbar {
      padding: 0.8rem 1rem;
    }

    .nav-link {
      border-radius: 5px;
      margin: 0 3px;
      padding: 8px 15px !important;
      transition: all 0.3s ease;
    }

    .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateY(-2px);
    }

    .nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
      font-weight: 600;
      position: relative;
    }

    .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 15px;
      right: 15px;
      height: 3px;
      background-color: white;
      border-radius: 2px;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
    }

    .navbar-text {
      font-size: 0.9rem;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard') }}">
        Management Produk
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Dashboard -->
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
              aria-current="{{ request()->routeIs('dashboard') ? 'page' : '' }}"
              href="{{ route('dashboard') }}">
              Dashboard
            </a>
          </li>

          <!-- Produk -->
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}"
              aria-current="{{ request()->routeIs('produk.*') ? 'page' : '' }}"
              href="{{ route('produk.index') }}">
              Produk
            </a>
          </li>


        </ul>

      </div>
    </div>
  </nav>

  <div class="container main-content">
    @yield('content')
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Auto-dismiss alerts after 3 seconds
    setTimeout(function() {
      $('.alert').fadeOut('slow');
    }, 3000);

    // SweetAlert confirmation for delete
    function confirmDelete(event, formId) {
      event.preventDefault();
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById(formId).submit();
        }
      });
    }
  </script>

  @yield('scripts')
</body>

</html>