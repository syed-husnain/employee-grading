@extends('layouts.app')
@section('title', 'Scorecard')

{{-- Employee Layout Configuration --}}
@section('sidebar-color', 'linear-gradient(180deg, #6a11cb, #2575fc)')
@section('role-title', 'Employee Dashboard')
@section('role-name', 'Employee')

{{-- Sidebar Links --}}
@section('sidebar-links')
<li><a href="{{ route('employee.profile') }}" class="nav-link text-white"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
<li><a href="{{ route('employee.form') }}" class="nav-link text-white"><i class="bi bi-pencil-square me-2"></i>Grading Form</a></li>
<li><a href="{{ route('employee.scorecard') }}" class="nav-link text-white active"><i class="bi bi-card-checklist me-2"></i>Scorecard</a></li>
<li><a href="{{ route('employee.master-data') }}" class="nav-link text-white"><i class="bi bi-database me-2"></i>Master Data</a></li>
@endsection

{{-- Page Title --}}
@section('page-title', 'My Scorecard')

{{-- Page Content --}}
@section('content')
<div class="card p-3 shadow">
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>Criteria</th><th>Grade</th><th>Weight</th><th>Verified</th><th>Contribution</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>Education</td><td>A</td><td>30%</td><td>Yes</td><td>26%</td></tr>
    </tbody>
  </table>

  <div class="mt-3 text-end">
    <strong>Total Score: 87%</strong><br>
    <strong>Final Grade: A</strong><br>
    <span class="badge bg-success mt-2">Eligible for Bonus & Promotion</span>
  </div>
</div>
@endsection
