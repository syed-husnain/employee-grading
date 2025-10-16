@extends('layouts/contentNavbarLayout')

@section('title', ' User Form')

@section('content')
    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('tags.index') }}">Users </a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New User</li>
        </ol>
    </nav>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-12">
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User Form</h5>

                </div>
                <div class="card-body mt-4">

                    <form id="user-form" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="full_name" class="col-sm-4 col-form-label">Full Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="full_name" name="full_name"
                                            placeholder="e.g. John Doe" />
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="password" class="col-sm-4 col-form-label">Password <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password" />
                                    </div>
                                 
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="role" class="col-sm-4 col-form-label">Role <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select name="role_id" class="form-select select2" data-placeholder="Choose one thing">
                                            <option value="" disabled>Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="currency" class="col-sm-4 col-form-label">Active</label>
                                    <div class="col-sm-8">
                                       <div class="form-check form-switch mb-2">
                                            <input name="status" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                           
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                             <!-- Right Column -->
                            <div class="col-md-6">
                               <div class="mb-2 row align-items-center">
                                    <label for="email" class="col-sm-4 col-form-label">Email <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="e.g. abc@example.com" />
                                    </div>
                                </div>
                               <div class="mb-2 row align-items-center">
                                    <label for="company" class="col-sm-4 col-form-label">Company <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select class="form-select select2" name="company[]" data-placeholder="Choose anything" multiple>
                                            @forelse($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @empty
                                                <option value="">No Companies</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>

                           
                        </div>
                        <div class="mt-4">
                            <button type="submit" id="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')

    <script>
        $(document).ready(function() {
       
            $(".nav-link").on("click", function(e) {
                e.preventDefault();

                // Remove active class from all tabs
                $(".nav-link").removeClass("active");
                $(this).addClass("active");

                // Hide all tab content
                $(".tab-pane").removeClass("show active");

                // Show the clicked tab content
                var target = $(this).data("bs-target");
                $(target).addClass("show active");
            });

            $( '#single-select-clear-field' ).select2( {
                allowClear: true,
            } );

            $( '#multiple-select-clear-field' ).select2( {
                closeOnSelect: false,
                allowClear: true,
            } );


            // submit user form
            $('#submit').click(function(e) {
                e.preventDefault(); // precautionary

                let form = $('#user-form');
                let url = form.attr("action");
                let formData = new FormData(form[0]);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            showToast("User created successfully!", "Success", "primary");
                            setTimeout(() => {
                                window.location.href = response.redirect_url;
                            }, 
                            3000);
                            
                        }
                    },
                    error: function(response) {
                        if (response.responseJSON?.errors) {
                            errorsGetNew(response.responseJSON.errors);
                        }
                    }
                });
            });

        });


        
    </script>


@endsection
