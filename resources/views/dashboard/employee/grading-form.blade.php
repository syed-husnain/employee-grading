@extends('layouts.app')
@section('title', 'Grading Form')

{{-- Employee Layout Configuration --}}
@section('sidebar-color', 'linear-gradient(180deg, #6a11cb, #2575fc)')
@section('role-title', 'Employee Dashboard')
@section('role-name', 'Employee')

{{-- Sidebar Links --}}
@section('sidebar-links')
<li><a href="{{ route('employee.profile') }}" class="nav-link text-white"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
<li><a href="{{ route('employee.form') }}" class="nav-link text-white active"><i class="bi bi-pencil-square me-2"></i>Grading Form</a></li>
<li><a href="{{ route('employee.scorecard') }}" class="nav-link text-white"><i class="bi bi-card-checklist me-2"></i>Scorecard</a></li>
<li><a href="{{ route('employee.master-data') }}" class="nav-link text-white"><i class="bi bi-database me-2"></i>Master Data</a></li>
@endsection

{{-- Page Title --}}
@section('page-title', 'Fill Grading Form')

{{-- Page Content --}}
@section('content')
<div class="card p-4 shadow">
  <form>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label>Education</label>
        <select class="form-select">
          <option>Bachelor</option>
          <option>Masters</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label>Experience (Years)</label>
        <input type="number" class="form-control">
      </div>
    </div>

    <div class="mb-3">
      <label>Certificates (Upload)</label>
      <input type="file" class="form-control" multiple>
    </div>

    <div class="text-end">
      <button class="btn btn-success">Submit Form</button>
    </div>
  </form>
</div>
@endsection
