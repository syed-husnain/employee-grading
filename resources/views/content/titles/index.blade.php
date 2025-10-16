@extends('layouts/contentNavbarLayout')

@section('title', 'Titles')

@section('content')
    <!-- Basic Bootstrap Table -->


    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Titles</li>
        </ol>
    </nav>
    <div class="card">
        <div class="row m-0 my-3 justify-content-between" bis_skin_checked="1">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0"
                bis_skin_checked="1">
                <h5 class="card-header">Titles</h5>

            </div>
            <div class="d-md-flex align-items-center dt-layout-end col-md-auto ms-auto d-flex gap-md-4 justify-content-md-between justify-content-center gap-0 flex-wrap mt-0"
                bis_skin_checked="1">

                <div class="dt-buttons btn-group flex-wrap d-flex gap-4 mb-md-0 mb-6" bis_skin_checked="1">

                    <a href="{{ route('titles.create') }}" class="btn btn-primary">Add New Title</a>

                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Abbreviation</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><i class="bx bxl-angular bx-md text-danger me-4"></i> <span>Angular Project</span></td>
                        <td>Albert Cook</td>
                        
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Bootstrap Table with Header Dark -->
@endsection
