@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo"><img src="{{ asset('assets/img/employee-grading.jpg') }}"
                                        alt="Logo" width="100"></span>
                                <span class="app-brand-text demo text-heading fw-bold"></span>
                            </a>
                        </div>
                        <!-- /Logo -->


                        <form id="loginForm" action="{{ route('login.submit') }}" class="mb-6" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email or username" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-8">
                                <div class="d-flex justify-content-between mt-8">
                                    <div class="form-check mb-0 ms-2">
                                        <input class="form-check-input" type="checkbox" id="remember-me">
                                        <label class="form-check-label" for="remember-me">
                                            Remember Me
                                        </label>
                                    </div>
                                    <a href="{{ route('forgot-password') }}">
                                        <span>Forgot Password?</span>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button id="submit" class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="{{ url('auth/register-basic') }}">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
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
                e.preventDefault(); // precautionary

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
        });
    </script>
@endsection
