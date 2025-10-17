@extends('layouts.app')
@section('title', 'Logs & Audit Trail')
@section('sidebar-links')
<li><a href="{{ route('hr.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
<li><a href="{{ route('hr.employee-management') }}" class="nav-link text-white">Employee Management</a></li>
<li><a href="{{ route('hr.form-handling') }}" class="nav-link text-white">Form Handling</a></li>
<li><a href="{{ route('hr.logs') }}" class="nav-link text-white active">Logs</a></li>
<li><a href="{{ route('hr.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'Logs & Audit Trail')

@section('content')
<table class="table table-bordered shadow">
  <thead class="table-dark">
    <tr>
      <th>Employee</th><th>Changed Field</th><th>Old Value</th><th>New Value</th><th>By</th><th>Date</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>Ali Khan</td><td>Grade</td><td>B</td><td>A</td><td>HR User</td><td>17-Oct-2025</td></tr>
  </tbody>
</table>
@endsection
