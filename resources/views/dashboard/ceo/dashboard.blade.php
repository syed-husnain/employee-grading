@extends('layouts.app')
@section('title', 'CEO Dashboard')
@section('sidebar-links')
<li><a href="{{ route('ceo.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
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

<div class="mt-4">
  <h5>Performance by Department</h5>
  <canvas id="deptChart"></canvas>
</div>
@endsection
