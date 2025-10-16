@extends('layouts/contentNavbarLayout')

@section('title', ' Tags Form')

@section('content')
    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('tags.index') }}">Tags </a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Tag</li>
        </ol>
    </nav>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-12">
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tag Form</h5>

                </div>
                <div class="card-body mt-4">

                    <form>
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="tag_name" class="col-sm-4 col-form-label">Tag Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tag_name" name="tag_name"
                                            placeholder="e.g. Consulting Services" />
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Parent Category</label>
                                    <div class="col-sm-8">
                                        <select class="select2 form-select">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>

                               
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="street" class="col-sm-4 col-form-label">Color</label>
                                    <div class="col-sm-8">
                                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="currency" class="col-sm-4 col-form-label">Active</label>
                                    <div class="col-sm-8">
                                       <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                           
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
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

        });


        
    </script>


@endsection
