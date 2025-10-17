@extends('layouts.app')
@section('title', 'Form Handling')
@section('sidebar-links')
<li><a href="{{ route('hr.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
<li><a href="{{ route('hr.employee-management') }}" class="nav-link text-white">Employee Management</a></li>
<li><a href="{{ route('hr.form-handling') }}" class="nav-link text-white active">Form Handling</a></li>
<li><a href="{{ route('hr.logs') }}" class="nav-link text-white">Logs</a></li>
<li><a href="{{ route('hr.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'Employee Grading Forms')

@section('content')
<div class="card p-3 shadow">
  <h5>Submitted Forms</h5>
  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>Employee</th><th>Date</th><th>Status</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ali Khan</td><td>12 Oct 2025</td><td>Pending</td>
        <td><button class="btn btn-primary btn-sm">Review</button></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
