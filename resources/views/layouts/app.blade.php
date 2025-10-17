<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f6f8fa;
      font-family: 'Inter', sans-serif;
    }

    .sidebar {
      width: 250px;
      min-height: 100vh;
      color: #fff;
      background: var(--sidebar-color);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .sidebar h5 {
      text-align: center;
      font-weight: 600;
      margin: 1rem 0;
    }

    .nav-link {
      color: #fff;
      font-weight: 500;
      padding: 0.7rem 1.2rem;
      border-radius: 8px;
      transition: background 0.2s;
    }

    .nav-link:hover,
    .nav-link.active {
      background: rgba(255, 255, 255, 0.2);
    }

    main {
      flex-grow: 1;
      padding: 2rem;
    }

    .topbar {
      background: #fff;
      border-bottom: 1px solid #ddd;
      padding: 0.8rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .role-badge {
      font-size: 0.85rem;
      font-weight: 600;
      padding: 0.4rem 0.8rem;
      border-radius: 1rem;
    }

    .btn-logout {
      background: #dc3545;
      color: #fff;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar" style="--sidebar-color:@yield('sidebar-color')">
    <div>
      <h5><i class="bi bi-speedometer2 me-2"></i> @yield('role-title')</h5>
      <ul class="nav flex-column">
        @yield('sidebar-links')
      </ul>
    </div>
    <div class="p-3">
      <div class="small">Logged in as:</div>
      <span class="role-badge bg-light text-dark">@yield('role-name')</span>
    </div>
  </div>

  <!-- Main content -->
  <div class="w-100">
    <div class="topbar">
      <h4>@yield('page-title')</h4>
      <div class="d-flex align-items-center">
        <i class="bi bi-person-circle fs-4 me-2"></i>
        <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
      </div>
    </div>

    <main>
      @yield('content')
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')
</body>
</html>
