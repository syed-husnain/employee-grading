@extends('layouts.app')
@section('title', 'CEO Dashboard')
@section('sidebar-links')
<li><a href="{{ route('ceo.dashboard') }}" class="nav-link text-white active">Dashboard</a></li>
<li><a href="{{ route('ceo.insights') }}" class="nav-link text-white">Insights</a></li>
<li><a href="{{ route('ceo.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-3">
  <div class="col-md-3"><div class="card p-3 text-center shadow">Total Employees: 120</div></div>
  <div class="col-md-3"><div class="card p-3 text-center shadow">Avg. Score: 87%</div></div>
  <div class="col-md-3"><div class="card p-3 text-center shadow">Promotion Eligible: 15</div></div>
  <div class="col-md-3"><div class="card p-3 text-center shadow">Bonus Eligible: 22</div></div>
</div>

<div class="mt-5 row">
  <div class="col-md-6">
    <div class="card p-3 shadow">
      <h5>Department Performance</h5>
      <canvas id="deptPerformanceChart"></canvas>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card p-3 shadow">
      <h5>Grade Distribution</h5>
      <canvas id="gradeDistributionChart"></canvas>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
const deptCtx = document.getElementById('deptPerformanceChart').getContext('2d');
new Chart(deptCtx, {
  type: 'bar',
  data: {
    labels: ['Finance', 'HR', 'IT', 'Operations', 'Sales'],
    datasets: [{
      label: 'Avg Score (%)',
      data: [85, 78, 90, 83, 88],
      backgroundColor: 'rgba(54, 162, 235, 0.6)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: { beginAtZero: true, max: 100 }
    }
  }
});

const gradeCtx = document.getElementById('gradeDistributionChart').getContext('2d');
new Chart(gradeCtx, {
  type: 'pie',
  data: {
    labels: ['A', 'B', 'C', 'D'],
    datasets: [{
      label: 'Grade Count',
      data: [30, 45, 25, 10],
      backgroundColor: [
        'rgba(75, 192, 192, 0.6)',
        'rgba(255, 205, 86, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(153, 102, 255, 0.6)'
      ],
      borderColor: '#fff',
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
