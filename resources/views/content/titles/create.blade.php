@extends('layouts/contentNavbarLayout')

@section('title', ' Title Form')

@section('content')
    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('tags.index') }}">Titles </a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Title</li>
        </ol>
    </nav>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-12">
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Title Form</h5>

                </div>
                <div class="card-body mt-4">

                    <form>
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="title_name" class="col-sm-4 col-form-label">Title Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="title_name" name="title_name"
                                            placeholder="e.g. Consulting Services" />
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="abbreviation" class="col-sm-4 col-form-label">Abbreviation</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="abbreviation" name="abbreviation"
                                            placeholder="e.g. Doctor" />
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
