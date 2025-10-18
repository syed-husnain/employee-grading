@extends('layouts/contentNavbarLayout')

@section('title', 'Master Data - NOX Limited')

@section('head')
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        /* Card hover */
        .card:hover { transform: scale(1.02); transition: transform 0.3s ease; }

        /* Table row hover */
        .table-hover tbody tr:hover { background-color: #f8f9fa; cursor: pointer; }

        /* Fix animation visibility */
        .animate__animated { opacity: 0; }
        .animate__animated.animate__fadeInDown,
        .animate__animated.animate__fadeInLeft,
        .animate__animated.animate__fadeInRight,
        .animate__animated.animate__fadeInUp { opacity: 1; }
    </style>
@endsection

@section('content')
<div class="container animate__animated animate__fadeIn">
    <div class="row gy-4">

        <!-- Overview -->
        <div class="col-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInDown animate__slower">
                <div class="card-body p-4">
                    <h4 class="card-title text-primary mb-3">Master Data Overview - NOX Limited Company</h4>
                    <p class="text-muted mb-0">All grades, categories, and classifications used for employee evaluation.</p>
                </div>
            </div>
        </div>

        <!-- Education Grade -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInLeft">
                <div class="card-header bg-gradient-purple" style="background: linear-gradient(135deg, #cbb4f1, #a281e5); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-book me-2"></i>Education Grade</h5>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-hover align-middle text-center">
                          <thead class="table-light">
                              <tr><th>Education</th><th>Grade</th></tr>
                          </thead>
                          <tbody>
                              <tr><td>Basics</td><td>1</td></tr>
                              <tr><td>Diploma</td><td>2.5</td></tr>
                              <tr><td>Bachelors</td><td>4</td></tr>
                              <tr><td>Masters</td><td>5</td></tr>
                              <tr><td>Ph.D</td><td>7</td></tr>
                              <tr><td>Verified</td><td>100%</td></tr>
                              <tr><td>UnVerified</td><td>25%</td></tr>
                              <tr><td>Relevant</td><td>100%</td></tr>
                              <tr><td>Irrelevant</td><td>20%</td></tr>
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tech Certificate -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInRight">
                <div class="card-header bg-gradient-green" style="background: linear-gradient(135deg, #b2f1c7, #7fd8a1); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-certificate me-2"></i>Tech Certificate Grade</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Certificate</th><th>Grade</th></tr></thead>
                        <tbody>
                            <tr><td>None</td><td>0</td></tr>
                            <tr><td>Less than 1 Year</td><td>1</td></tr>
                            <tr><td>1 Year</td><td>2</td></tr>
                            <tr><td>2 Year</td><td>3</td></tr>
                            <tr><td>3 Year</td><td>4</td></tr>
                            <tr><td>4 Year</td><td>5</td></tr>
                            <tr><td>5 Year</td><td>6</td></tr>
                            <tr><td>Verified</td><td>100%</td></tr>
                            <tr><td>UnVerified</td><td>25%</td></tr>
                            <tr><td>Relevant</td><td>100%</td></tr>
                            <tr><td>Irrelevant</td><td>20%</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Online Certificate -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInLeft">
                <div class="card-header" style="background: linear-gradient(135deg, #ffd6a5, #f9a826); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-laptop me-2"></i>Online Certificate Grade</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Certificate</th><th>Grade</th></tr></thead>
                        <tbody>
                            <tr><td>None</td><td>0</td></tr>
                            <tr><td>Short Course</td><td>1</td></tr>
                            <tr><td>Series</td><td>2</td></tr>
                            <tr><td>Professional</td><td>4</td></tr>
                            <tr><td>Verified</td><td>100%</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Experience - Internal -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInRight">
                <div class="card-header bg-gradient-pink" style="background: linear-gradient(135deg, #f3d4f1, #e29ad6); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-building-check me-2"></i>Experience - Internal</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Experience</th><th>Grade</th></tr></thead>
                        <tbody>
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
                            <tr><td>Verified</td><td>100%</td></tr>
                            <tr><td>UnVerified</td><td>50%</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Experience - External -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInLeft">
                <div class="card-header bg-gradient-blue" style="background: linear-gradient(135deg, #e4d9f7, #c2b0e5); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-briefcase me-2"></i>Experience - External</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Experience</th><th>Grade</th></tr></thead>
                        <tbody>
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
                            <tr><td>Verified</td><td>100%</td></tr>
                            <tr><td>UnVerified</td><td>50%</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- English -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInRight">
                <div class="card-header" style="background: linear-gradient(135deg,#9ad6f3,#4b9ae7); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-translate me-2"></i>English Grade</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Proficiency</th><th>Grade</th></tr></thead>
                        <tbody>
                            <tr><td>Basic</td><td>1</td></tr>
                            <tr><td>Intermediate</td><td>3</td></tr>
                            <tr><td>Fluent</td><td>5</td></tr>
                            <tr><td>Professional</td><td>7</td></tr>
                            <tr><td>Grade G</td><td>—</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Experience Management -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInLeft">
                <div class="card-header" style="background: linear-gradient(135deg,#f7c8e0,#f09bc2); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-person-gear me-2"></i>Experience - Management</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Experience Management</th><th>Grade MG</th></tr></thead>
                        <tbody>
                            <tr><td>None</td><td>0</td></tr>
                            <tr><td>1 Year</td><td>0</td></tr>
                            <tr><td>2 Year</td><td>0.5</td></tr>
                            <tr><td>3 Year</td><td>1</td></tr>
                            <tr><td>4 Year</td><td>2.5</td></tr>
                            <tr><td>5 Year</td><td>3</td></tr>
                            <tr><td>6 Year</td><td>3.5</td></tr>
                            <tr><td>7 Year</td><td>4</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Mandatory for All Employees (example weights / requirements) -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInRight">
                <div class="card-header" style="background: linear-gradient(135deg,#d1f7e6,#9fefd0); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-check2-square me-2"></i>Mandatory for All Employees</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Requirement</th><th>Weight</th><th>Grade</th></tr></thead>
                        <tbody>
                            <tr><td>ID / Records</td><td>5</td><td>Grade 1</td></tr>
                            <tr><td>Mandatory Training</td><td>10</td><td>Grade 2</td></tr>
                            <tr><td>Compliance</td><td>8</td><td>Grade 2</td></tr>
                            <tr><td>Verified Documents</td><td>12</td><td>Grade 1</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Bonus & Grades (placeholder rows matching style) -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInLeft">
                <div class="card-header" style="background: linear-gradient(135deg,#ffe3f2,#ffb4d6); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-gift me-2"></i>Bonus & Grades</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Bonus Type</th><th>Criteria</th><th>Grade</th></tr></thead>
                        <tbody>
                            <tr><td>Performance Bonus</td><td>Top 10%</td><td>Grade 1</td></tr>
                            <tr><td>Retention Bonus</td><td>Service > 3 Years</td><td>Grade 3</td></tr>
                            <tr><td>Spot Bonus</td><td>Exceptional Contribution</td><td>Grade 2</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Days Off -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInRight">
                <div class="card-header" style="background: linear-gradient(135deg,#f0f7ff,#c6e6ff); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-calendar2-week me-2"></i>Days Off</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-light"><tr><th>Category</th><th>Days Off</th></tr></thead>
                        <tbody>
                            <tr><td>Junior Staff</td><td>14</td></tr>
                            <tr><td>Mid Level</td><td>16</td></tr>
                            <tr><td>Senior</td><td>18</td></tr>
                            <tr><td>Management</td><td>21</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Weights to Main Category / Main Categories (from your screenshot) -->
        <div class="col-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInUp">
                <div class="card-header" style="background: linear-gradient(135deg,#e4f0ff,#cfe3ff); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-list-ul me-2"></i>Main Categories (Weights & Grades)</h5>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr><th>Weight</th><th>Main Categories</th><th>Main Categories (Alt)</th><th>Grade</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>72</td><td>CEO</td><td>-</td><td>Grade 1</td></tr>
                            <tr><td>63</td><td>CFO</td><td>-</td><td>Grade 1</td></tr>
                            <tr><td>54</td><td>Directors</td><td>Sr. Director</td><td>Grade 1</td></tr>
                            <tr><td>51</td><td>Directors</td><td>Deputy Director</td><td>Grade 2</td></tr>
                            <tr><td>48</td><td>Directors</td><td>Assistant Director</td><td>Grade 3</td></tr>
                            <tr><td>45</td><td>Managers</td><td>General Manager</td><td>Grade 1</td></tr>
                            <tr><td>42</td><td>Managers</td><td>Senior Manager</td><td>Grade 2</td></tr>
                            <tr><td>39</td><td>Managers</td><td>Assistant Manager</td><td>Grade 3</td></tr>
                            <tr><td>36</td><td>Team Lead</td><td>Team Lead I</td><td>Grade 3</td></tr>
                            <tr><td>33</td><td>Team Lead</td><td>Team Lead II</td><td>Grade 4</td></tr>
                            <tr><td>30</td><td>Officers</td><td>Officer I</td><td>Grade 5</td></tr>
                            <tr><td>27</td><td>Officers</td><td>Officer II</td><td>Grade 5</td></tr>
                            <tr><td>24</td><td>Associates/Coordinators</td><td>Associates/Coordinators I</td><td>Grade 6</td></tr>
                            <tr><td>21</td><td>Associates/Coordinators</td><td>Associates/Coordinators II</td><td>Grade 6</td></tr>
                            <tr><td>18</td><td>Associates/Coordinators</td><td>Associates/Coordinators III</td><td>Grade 7</td></tr>
                            <tr><td>12</td><td>Field Staff</td><td>Field Staff I</td><td>Grade 8</td></tr>
                            <tr><td>9</td><td>Field Staff</td><td>Field Staff II</td><td>Grade 9</td></tr>
                            <tr><td>3</td><td>Field Staff</td><td>Field Staff III</td><td>Grade 10</td></tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- Grades & Insurance Bracket -->
        <div class="col-12 mb-4">
            <div class="card shadow-lg rounded-3 animate__animated animate__fadeInUp animate__delay-1s">
                <div class="card-header" style="background: linear-gradient(135deg,#d7c8f7,#b5a0e5); color: white;">
                    <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-shield-check me-2"></i>Grades & Insurance Bracket</h5>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle text-center">
                          <thead class="table-light"><tr><th>Grade Score</th><th>Insurance Plan</th></tr></thead>
                          <tbody>
                              <tr><td>27 ></td><td>Basic</td></tr>
                              <tr><td>36 ></td><td>Standard</td></tr>
                              <tr><td>45 ></td><td>Enhanced</td></tr>
                              <tr><td>72 ></td><td>Premium</td></tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                          <thead class="table-light"><tr><th>Grade Label</th><th>Notes</th></tr></thead>
                          <tbody>
                              <tr><td>Grade 1</td><td>Top leadership</td></tr>
                              <tr><td>Grade 2</td><td>Senior managers</td></tr>
                              <tr><td>Grade 3</td><td>Middle management</td></tr>
                              <tr><td>Grade 4+</td><td>Operational roles</td></tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
