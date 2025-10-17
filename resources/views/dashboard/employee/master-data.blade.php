@extends('layouts.app')
@section('title', 'Master Data')
@section('sidebar-links')
<li><a href="{{ route('ceo.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
<li><a href="{{ route('ceo.insights') }}" class="nav-link text-white">Insights</a></li>
<li><a href="{{ route('ceo.master-data') }}" class="nav-link text-white active">Master Data</a></li>
@endsection
@section('page-title', 'Master Data')

@section('content')
<table class="table table-bordered shadow">
  <thead class="table-dark">
    <tr><th>Criteria</th><th>Max Weight</th><th>Description</th></tr>
  </thead>
  <tbody>
    <tr><td>Education</td><td>30%</td><td>Degree level weightage</td></tr>
    <tr><td>Certificates</td><td>20%</td><td>Verified professional certifications</td></tr>
  </tbody>
</table>
@endsection
