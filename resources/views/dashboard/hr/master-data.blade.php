@extends('layouts.app')
@section('title', 'Master Data')
@section('sidebar-links')
<li><a href="{{ route('hr.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
<li><a href="{{ route('hr.employee-management') }}" class="nav-link text-white">Employee Management</a></li>
<li><a href="{{ route('hr.form-handling') }}" class="nav-link text-white">Form Handling</a></li>
<li><a href="{{ route('hr.logs') }}" class="nav-link text-white">Logs</a></li>
<li><a href="{{ route('hr.master-data') }}" class="nav-link text-white active">Master Data</a></li>
@endsection
@section('page-title', 'Master Data Management')

@section('content')
<div class="card p-3 shadow">
  <table class="table table-bordered">
    <thead class="table-dark"><tr><th>Criteria</th><th>Weight</th><th>Action</th></tr></thead>
    <tbody>
      <tr><td>Experience</td><td>25%</td><td><button class="btn btn-sm btn-warning">Edit</button></td></tr>
    </tbody>
  </table>
</div>
@endsection
