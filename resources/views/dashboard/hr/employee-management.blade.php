@extends('layouts.app')
@section('title', 'Employee Management')
@section('sidebar-links')
<li><a href="{{ route('hr.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
<li><a href="{{ route('hr.employee-management') }}" class="nav-link text-white active">Employee Management</a></li>
<li><a href="{{ route('hr.form-handling') }}" class="nav-link text-white">Form Handling</a></li>
<li><a href="{{ route('hr.logs') }}" class="nav-link text-white">Logs</a></li>
<li><a href="{{ route('hr.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'Employee Management')

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
