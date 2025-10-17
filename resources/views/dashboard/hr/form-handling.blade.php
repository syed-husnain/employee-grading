@extends('layouts.app')
@section('title', 'Form Handling')

{{-- HR Layout Configuration --}}
@section('sidebar-color', 'linear-gradient(180deg, #264653, #2a9d8f)')
@section('role-title', 'HR Panel')
@section('role-name', 'Human Resources')

{{-- Sidebar Links --}}
@section('sidebar-links')
<li><a href="{{ route('hr.dashboard') }}" class="nav-link text-white"><i class="bi bi-people me-2"></i>Dashboard</a></li>
<li><a href="{{ route('hr.employee-management') }}" class="nav-link text-white"><i class="bi bi-person-lines-fill me-2"></i>Employee Management</a></li>
<li><a href="{{ route('hr.form-handling') }}" class="nav-link text-white active"><i class="bi bi-ui-checks-grid me-2"></i>Form Handling</a></li>
<li><a href="{{ route('hr.logs') }}" class="nav-link text-white"><i class="bi bi-journal-text me-2"></i>Logs</a></li>
<li><a href="{{ route('hr.master-data') }}" class="nav-link text-white"><i class="bi bi-database me-2"></i>Master Data</a></li>
@endsection

{{-- Page Title --}}
@section('page-title', 'Employee Grading Forms')

{{-- Page Content --}}
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
