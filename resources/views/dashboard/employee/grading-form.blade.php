@extends('layouts.app')
@section('title', 'Grading Form')
@section('sidebar-links')
<li><a href="{{ route('employee.profile') }}" class="nav-link text-white">Profile</a></li>
<li><a href="{{ route('employee.form') }}" class="nav-link text-white active">Grading Form</a></li>
<li><a href="{{ route('employee.scorecard') }}" class="nav-link text-white">Scorecard</a></li>
<li><a href="{{ route('employee.master-data') }}" class="nav-link text-white">Master Data</a></li>
@endsection
@section('page-title', 'Fill Grading Form')

@section('content')
<div class="card p-4 shadow">
  <form>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label>Education</label>
        <select class="form-select">
          <option>Bachelor</option><option>Masters</option>
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
