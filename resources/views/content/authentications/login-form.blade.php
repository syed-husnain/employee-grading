@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
    <style>
        html,
        body {
            height: 100%;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .carousel,
        .carousel-inner,
        .carousel-item,
        .carousel-item img {
            height: 100vh;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid vh-100 d-flex align-items-stretch bg-light p-0">
        <div class="row flex-grow-1 w-100 m-0">

            <!-- Left Side: Login Form -->
            <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center bg-white p-5">
                <div class="w-100" style="max-width: 420px;">
                    <div class="app-brand justify-content-center mb-4">
                        <a href="{{ url('/') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/img/employee-grading.jpg') }}" alt="Logo" width="100">
                            </span>
                        </a>
                    </div>

                    <form id="loginForm" action="{{ route('login.submit') }}" class="mb-4" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email or Username</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email or username" autofocus>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-4 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="••••••••••••" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">Remember Me</label>
                            </div>
                            <a href="{{ route('forgot-password') }}">Forgot Password?</a>
                        </div>

                        <button id="submit" class="btn btn-primary d-grid w-100" type="submit">Login</button>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="{{ url('auth/register-basic') }}"><span>Create an account</span></a>
                    </p>
                </div>
            </div>

            <!-- Right Side: Image Carousel -->
            <div class="col-lg-6 d-none d-lg-block p-0">
                <div id="loginCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">

                        <div class="carousel-item active h-100">
                            <img src="{{ asset('assets/img/Employee-Performance.jpg') }}"
                                class="d-block w-100 h-100 object-fit-cover" alt="Slide 1">
                        </div>

                        <div class="carousel-item h-100">
                            <img src="{{ asset('assets/img/slider-2.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                                alt="Slide 2">
                        </div>

                        <div class="carousel-item h-100">
                            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1600&q=80"
                                class="d-block w-100 h-100 object-fit-cover" alt="Slide 3">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Toast -->
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="generalToast" class="bs-toast toast fade bg-primary" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-header">
                    <i class='bx bx-bell me-2'></i>
                    <div class="me-auto fw-medium" id="toastTitle">Bootstrap</div>
                    <small id="toastTime">Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="toastMessage">
                    Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $('#submit').click(function(e) {
                e.preventDefault();

                let form = $('#loginForm');
                let url = form.attr("action");
                let formData = new FormData(form[0]);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function(response) {
                        if (response.responseJSON?.errors) {
                            errorsGetNew(response.responseJSON.errors);
                        } else {
                            showToast(response.responseJSON?.message, "Error", "danger");
                        }
                    }
                });
            });

            // Bootstrap carousel auto-slide
            $('#loginCarousel').carousel({
                interval: 3000, // 3 seconds
                ride: 'carousel'
            });
        });
    </script>
@endsection
