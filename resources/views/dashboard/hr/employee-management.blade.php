@extends('layouts.app')
@section('title', 'Employee Management')

{{-- HR Layout Configuration --}}
@section('sidebar-color', 'linear-gradient(180deg, #264653, #2a9d8f)')
@section('role-title', 'HR Panel')
@section('role-name', 'Human Resources')

{{-- Sidebar Links --}}
@section('sidebar-links')
<li><a href="{{ route('hr.dashboard') }}" class="nav-link text-white"><i class="bi bi-people me-2"></i>Dashboard</a></li>
<li><a href="{{ route('hr.employee-management') }}" class="nav-link text-white active"><i class="bi bi-person-lines-fill me-2"></i>Employee Management</a></li>
<li><a href="{{ route('hr.form-handling') }}" class="nav-link text-white"><i class="bi bi-ui-checks-grid me-2"></i>Form Handling</a></li>
<li><a href="{{ route('hr.logs') }}" class="nav-link text-white"><i class="bi bi-journal-text me-2"></i>Logs</a></li>
<li><a href="{{ route('hr.master-data') }}" class="nav-link text-white"><i class="bi bi-database me-2"></i>Master Data</a></li>
@endsection

{{-- Page Title --}}
@section('page-title', 'Employee Management')

{{-- Page Content --}}
@section('content')
<div class="card p-3 shadow">
  <div class="d-flex justify-content-between mb-3">
    <h5>Employee List</h5>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add Employee</button>
  </div>
  
  <table class="table table-hover">
    <thead class="table-dark">
      <tr>
        <th>Name</th><th>Department</th><th>Designation</th><th>Status</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ali Khan</td><td>Finance</td><td>Analyst</td><td>Active</td>
        <td>
          <button class="btn btn-sm btn-info">Edit</button>
          <button class="btn btn-sm btn-danger">Deactivate</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Add New Employee</h5></div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label>Department</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label>Designation</label>
            <input type="text" class="form-control">
          </div>
          <button class="btn btn-success w-100">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
