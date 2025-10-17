@extends('layouts.app')
@section('title', 'HR Dashboard')
@section('sidebar-links')
<li><a href="{{ route('hr.dashboard') }}" class="nav-link text-white active">Dashboard</a></li>
<li><a href="{{ route('hr.employee-management') }}" class="nav-link text-white">Employee Management</a></li>
<li><a href="{{ route('hr.form-handling') }}" class="nav-link text-white">Form Handling</a></li>
<li><a href="{{ route('hr.logs') }}" class="nav-link text-white">Logs</a></li>
<li><a href="{{ route('hr.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'HR Dashboard')

@section('content')
<div class="row g-3">
  <div class="col-md-3"><div class="card p-3 text-center shadow">Pending Reviews: 8</div></div>
  <div class="col-md-3"><div class="card p-3 text-center shadow">Verified Forms: 35</div></div>
  <div class="col-md-3"><div class="card p-3 text-center shadow">Total Employees: 120</div></div>
  <div class="col-md-3"><div class="card p-3 text-center shadow">Active Employees: 115</div></div>
</div>

<div class="mt-5 row">
  <div class="col-md-6">
    <div class="card p-3 shadow">
      <h5>Department-Wise Avg Scores</h5>
      <canvas id="hrDeptChart"></canvas>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card p-3 shadow">
      <h5>Pending vs Verified Forms</h5>
      <canvas id="formStatusChart"></canvas>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
const hrDeptCtx = document.getElementById('hrDeptChart').getContext('2d');
new Chart(hrDeptCtx, {
  type: 'line',
  data: {
    labels: ['Finance', 'HR', 'IT', 'Operations', 'Sales'],
    datasets: [{
      label: 'Avg Score (%)',
      data: [82, 74, 91, 85, 79],
      fill: true,
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgba(54, 162, 235, 1)',
      tension: 0.3
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: { beginAtZero: true, max: 100 }
    }
  }
});

const formStatusCtx = document.getElementById('formStatusChart').getContext('2d');
new Chart(formStatusCtx, {
  type: 'doughnut',
  data: {
    labels: ['Pending', 'Verified'],
    datasets: [{
      data: [8, 35],
      backgroundColor: [
        'rgba(255, 99, 132, 0.6)',
        'rgba(75, 192, 192, 0.6)'
      ],
      borderWidth: 2
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { position: 'bottom' }
    }
  }
});
</script>
@endpush
