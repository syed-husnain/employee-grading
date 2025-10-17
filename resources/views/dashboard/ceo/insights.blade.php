@extends('layouts.app')
@section('title', 'Insights')
@section('sidebar-links')
<li><a href="{{ route('ceo.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
<li><a href="{{ route('ceo.insights') }}" class="nav-link text-white active">Insights</a></li>
<li><a href="{{ route('ceo.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'Promotion & Bonus Insights')

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
