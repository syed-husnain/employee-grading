<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



</head>
<body class="bg-light">

  <!-- Sidebar -->
  <div class="d-flex">
    <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
      <h5 class="text-center mb-4">Employee Grading</h5>
      <ul class="nav flex-column">
        @yield('sidebar-links')
      </ul>
    </nav>

    <!-- Main Content -->
    <main class="p-4 w-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>@yield('page-title')</h3>
        <div>
          <a href="#" class="btn btn-outline-secondary">Profile</a>
          <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>
      </div>
      @yield('content')
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')

</body>
</html>
