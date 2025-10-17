@section('sidebar-color', 'linear-gradient(180deg, #6a11cb, #2575fc)')
@section('role-name', 'Employee')
@section('role-title', 'My Dashboard')


@extends('layouts.app')
@section('title', 'My Profile')
@section('sidebar-links')
<li><a href="{{ route('employee.profile') }}" class="nav-link text-white active"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
<li><a href="{{ route('employee.form') }}" class="nav-link text-white"><i class="bi bi-pencil-square me-2"></i>Grading Form</a></li>
<li><a href="{{ route('employee.scorecard') }}" class="nav-link text-white"><i class="bi bi-card-checklist me-2"></i>Scorecard</a></li>
<li><a href="{{ route('employee.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'Profile & Grading History')

@section('content')
<div class="card p-3 shadow">
  <h5>Personal Information</h5>
  <p><strong>Name:</strong> Ali Khan</p>
  <p><strong>Department:</strong> Finance</p>
  <p><strong>Designation:</strong> Analyst</p>

  <h6 class="mt-4">Grading History</h6>
  <table class="table table-striped">
    <thead><tr><th>Year</th><th>Total Score</th><th>Grade</th><th>Promotion</th><th>Bonus</th></tr></thead>
    <tbody><tr><td>2025</td><td>87</td><td>A</td><td>Eligible</td><td>Yes</td></tr></tbody>
  </table>
</div>
@endsection
