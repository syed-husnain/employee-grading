@extends('layouts.app')
@section('title', 'Master Data')

{{-- CEO UI Config --}}
@section('sidebar-color', 'linear-gradient(180deg, #1d3557, #457b9d)')
@section('role-title', 'CEO Dashboard')
@section('role-name', 'Chief Executive Officer')

{{-- Sidebar Links --}}
@section('sidebar-links')
<li><a href="{{ route('ceo.dashboard') }}" class="nav-link text-white"><i class="bi bi-house-door me-2"></i>Dashboard</a></li>
<li><a href="{{ route('ceo.insights') }}" class="nav-link text-white"><i class="bi bi-bar-chart me-2"></i>Insights</a></li>
<li><a href="{{ route('ceo.master-data') }}" class="nav-link text-white active"><i class="bi bi-database me-2"></i>Master Data</a></li>
@endsection

{{-- Page Title --}}
@section('page-title', 'Master Data')

{{-- Page Content --}}
@section('content')
<div class="card p-4 shadow">
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr><th>Criteria</th><th>Max Weight</th><th>Description</th></tr>
    </thead>
    <tbody>
      <tr><td>Education</td><td>30%</td><td>Degree level weightage</td></tr>
      <tr><td>Certificates</td><td>20%</td><td>Verified professional certifications</td></tr>
    </tbody>
  </table>
</div>
@endsection
