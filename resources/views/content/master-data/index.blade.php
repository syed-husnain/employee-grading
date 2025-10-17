@extends('layouts/contentNavbarLayout')

@section('title', 'Master Data - NOX Limited')

@section('content')
<div class="row">
  <div class="col-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="card-title text-primary mb-3">Master Data Overview - NOX Limited Company</h4>
        <p class="text-muted mb-0">All grades, categories, and classifications used for employee evaluation.</p>
      </div>
    </div>
  </div>

  <!-- Education Grades -->
  <div class="col-lg-6 col-md-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h5 class="mb-0">Education Grade</h5>
        <span class="badge bg-light text-primary">Verified 100%</span>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th>Education</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr><td>Basics</td><td>1</td></tr>
            <tr><td>Diploma</td><td>2.5</td></tr>
            <tr><td>Bachelors</td><td>4</td></tr>
            <tr><td>Masters</td><td>5</td></tr>
            <tr><td>Ph.D</td><td>7</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Tech Certificate -->
  <div class="col-lg-6 col-md-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center bg-success text-white">
        <h5 class="mb-0">Tech Certificate Grade</h5>
        <span class="badge bg-light text-success">Relevant 100%</span>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th>Certificate</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr><td>None</td><td>0</td></tr>
            <tr><td>Less than 1 Year</td><td>1</td></tr>
            <tr><td>1 Year</td><td>2</td></tr>
            <tr><td>2 Year</td><td>3</td></tr>
            <tr><td>3 Year</td><td>4</td></tr>
            <tr><td>4 Year</td><td>5</td></tr>
            <tr><td>5 Year</td><td>6</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Experience - External -->
  <div class="col-lg-6 col-md-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
        <h5 class="mb-0">Experience - External</h5>
        <span class="badge bg-light text-info">Verified 100%</span>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th>Experience</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr><td>None</td><td>0</td></tr>
            <tr><td>Less than 1 Year</td><td>0</td></tr>
            <tr><td>1 Year</td><td>0.5</td></tr>
            <tr><td>2 Year</td><td>1</td></tr>
            <tr><td>3 Year</td><td>2.5</td></tr>
            <tr><td>4 Year</td><td>3</td></tr>
            <tr><td>5 Year</td><td>3.5</td></tr>
            <tr><td>6 Year</td><td>4</td></tr>
            <tr><td>7 Year</td><td>4.5</td></tr>
            <tr><td>8 Year</td><td>5</td></tr>
            <tr><td>9 Year</td><td>5.5</td></tr>
            <tr><td>10 Year</td><td>6</td></tr>
            <tr><td>More than 10 Year</td><td>7</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Main Categories -->
  <div class="col-lg-6 col-md-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-header bg-warning">
        <h5 class="mb-0 text-white">Main Categories</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th>Score</th>
              <th>Title</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr><td>72</td><td>CEO</td><td>Grade 1</td></tr>
            <tr><td>63</td><td>CFO</td><td>Grade 1</td></tr>
            <tr><td>54</td><td>Sr. Director</td><td>Grade 1</td></tr>
            <tr><td>48</td><td>Assistant Director</td><td>Grade 3</td></tr>
            <tr><td>36</td><td>Team Lead I</td><td>Grade 3</td></tr>
            <tr><td>27</td><td>Officer I</td><td>Grade 4</td></tr>
            <tr><td>18</td><td>Associates I</td><td>Grade 6</td></tr>
            <tr><td>9</td><td>Field Staff I</td><td>Grade 8</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Insurance Bracket -->
  <div class="col-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Insurance Bracket</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0 text-center">
          <thead class="table-light">
            <tr>
              <th>Grade Score</th>
              <th>Insurance Plan</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>27 ></td><td>Basic</td></tr>
            <tr><td>36 ></td><td>Standard</td></tr>
            <tr><td>45 ></td><td>Enhanced</td></tr>
            <tr><td>72 ></td><td>Premium</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
