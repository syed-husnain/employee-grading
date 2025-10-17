@extends('layouts.app')
@section('title', 'Scorecard')
@section('sidebar-links')
<li><a href="{{ route('employee.profile') }}" class="nav-link text-white">Profile</a></li>
<li><a href="{{ route('employee.form') }}" class="nav-link text-white">Grading Form</a></li>
<li><a href="{{ route('employee.scorecard') }}" class="nav-link text-white active">Scorecard</a></li>
<li><a href="{{ route('employee.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'My Scorecard')

@section('content')
<div class="card p-3 shadow">
  <table class="table table-bordered">
    <thead class="table-dark"><tr><th>Criteria</th><th>Grade</th><th>Weight</th><th>Verified</th><th>Contribution</th></tr></thead>
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
