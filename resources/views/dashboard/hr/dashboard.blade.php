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
  <div class="col-md-3"><div class="card p-3 shadow text-center">Pending Reviews: 8</div></div>
  <div class="col-md-3"><div class="card p-3 shadow text-center">Verified Forms: 35</div></div>
  <div class="col-md-3"><div class="card p-3 shadow text-center">Total Employees: 120</div></div>
  <div class="col-md-3"><div class="card p-3 shadow text-center">Active Employees: 115</div></div>
</div>

<div class="mt-4">
  <h5>Department-Wise Score Overview</h5>
  <canvas id="hrDeptChart"></canvas>
</div>
@endsection
