@extends('layouts.app')
@section('title', 'Insights')

{{-- CEO UI Config --}}
@section('sidebar-color', 'linear-gradient(180deg, #1d3557, #457b9d)')
@section('role-title', 'CEO Dashboard')
@section('role-name', 'Chief Executive Officer')

{{-- Sidebar Links --}}
@section('sidebar-links')
<li><a href="{{ route('ceo.dashboard') }}" class="nav-link text-white"><i class="bi bi-house-door me-2"></i>Dashboard</a></li>
<li><a href="{{ route('ceo.insights') }}" class="nav-link text-white active"><i class="bi bi-bar-chart me-2"></i>Insights</a></li>
<li><a href="{{ route('ceo.master-data') }}" class="nav-link text-white"><i class="bi bi-database me-2"></i>Master Data</a></li>
@endsection

{{-- Page Title --}}
@section('page-title', 'Promotion & Bonus Insights')

{{-- Page Content --}}
@section('content')
<div class="card p-3 shadow">
  <div class="d-flex justify-content-between mb-3">
    <h5>Employee Insights</h5>
    <div>
      <select class="form-select">
        <option>Department</option>
        <option>Grade</option>
        <option>Location</option>
      </select>
    </div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th><th>Department</th><th>Grade</th><th>Bonus</th><th>Promotion</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>Ali Khan</td><td>Finance</td><td>A</td><td>Yes</td><td>Yes</td></tr>
    </tbody>
  </table>
</div>
@endsection
