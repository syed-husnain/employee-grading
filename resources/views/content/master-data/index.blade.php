@extends('layouts/contentNavbarLayout')

@section('title', 'Master Data - NOX Limited')

@section('head')
    <!-- Existing Animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- Custom CSS for better styling -->
    <style>
        /* Custom card hover effect */
        .card:hover {
            transform: scale(1.02); /* Slight zoom on hover */
            transition: transform 0.3s ease;
        }
        
        /* Table row hover effect */
        .table-hover tbody tr:hover {
            background-color: #f8f9fa; /* Light gray for hover */
            cursor: pointer; /* Pointer for interactivity */
        }
        
        /* Ensure animations work by adding a slight delay and fixing potential conflicts */
        .animate__animated {
            opacity: 0; /* Start hidden for animation */
        }
        .animate__animated.animate__fadeInDown,
        .animate__animated.animate__fadeInLeft,
        .animate__animated.animate__fadeInRight,
        .animate__animated.animate__fadeInUp {
            opacity: 1; /* Fade in */
        }
    </style>
@endsection

@section('content')
    <div class="container animate__animated animate__fadeIn"> <!-- Wrapper for overall animation -->
        <div class="row gy-4"> <!-- Added gy-4 for vertical spacing -->
            <div class="col-12 mb-4">
                <div class="card shadow-lg rounded-3 animate__animated animate__fadeInDown animate__slower">
                    <div class="card-body p-4">
                        <h4 class="card-title text-primary mb-3">Master Data Overview - NOX Limited Company</h4>
                        <p class="text-muted mb-0">All grades, categories, and classifications used for employee evaluation.</p>
                    </div>
                </div>
            </div>

            <!-- Education Grades -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card shadow-lg rounded-3 animate__animated animate__fadeInLeft animate__delay-0.5s">
                    <div class="card-header d-flex justify-content-between align-items-center bg-gradient-purple" style="background: linear-gradient(135deg, #cbb4f1, #a281e5); color: white; border-radius: 0.5rem 0.5rem 0 0;">
                        <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-book me-2"></i> Education Grade</h5> <!-- Added Bootstrap Icon -->
                        <span class="badge bg-light text-dark">Verified 100%</span>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Education</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
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
            </div>

            <!-- Tech Certificate -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card shadow-lg rounded-3 animate__animated animate__fadeInRight animate__delay-0.5s">
                    <div class="card-header d-flex justify-content-between align-items-center bg-gradient-green" style="background: linear-gradient(135deg, #b2f1c7, #7fd8a1); color: white; border-radius: 0.5rem 0.5rem 0 0;">
                        <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-certificate me-2"></i> Tech Certificate Grade</h5> <!-- Added Bootstrap Icon -->
                        <span class="badge bg-light text-dark">Relevant 100%</span>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Certificate</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
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
            </div>

            <!-- Experience - External -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card shadow-lg rounded-3 animate__animated animate__fadeInLeft animate__delay-1s">
                    <div class="card-header d-flex justify-content-between align-items-center bg-gradient-pink" style="background: linear-gradient(135deg, #f3d4f1, #e29ad6); color: white; border-radius: 0.5rem 0.5rem 0 0;">
                        <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-briefcase me-2"></i> Experience - External</h5> <!-- Added Bootstrap Icon -->
                        <span class="badge bg-light text-dark">Verified 100%</span>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Experience</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Categories -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card shadow-lg rounded-3 animate__animated animate__fadeInRight animate__delay-1s">
                    <div class="card-header bg-gradient-blue" style="background: linear-gradient(135deg, #e4d9f7, #c2b0e5); color: white; border-radius: 0.5rem 0.5rem 0 0;">
                        <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-list-ul me-2"></i> Main Categories</h5> <!-- Added Bootstrap Icon -->
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Score</th>
                                        <th>Title</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
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
            </div>

            <!-- Insurance Bracket -->
            <div class="col-12 mb-4">
                <div class="card shadow-lg rounded-3 animate__animated animate__fadeInUp animate__delay-1.5s">
                    <div class="card-header bg-gradient-light-purple" style="background: linear-gradient(135deg, #d7c8f7, #b5a0e5); color: white; border-radius: 0.5rem 0.5rem 0 0;">
                        <h5 class="mb-0 d-flex align-items-center"><i class="bi bi-shield-check me-2"></i> Insurance Bracket</h5> <!-- Added Bootstrap Icon -->
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle text-center">
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
        </div>
    </div>
@endsection