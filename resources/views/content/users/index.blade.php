@extends('layouts/contentNavbarLayout')

@section('title', 'Users')

@section('page-style')
<style>
    .dataTables_wrapper {
        overflow-x: auto;
    }
    div.dt-scroll-body {
        min-height: 200px !important;
        max-height: 600px !important;
    }

</style>
@endsection

@section('content')
    <!-- Basic Bootstrap Table -->


    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>
    <div class="card">
        <div class="row m-0 my-3 justify-content-between" bis_skin_checked="1">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0"
                bis_skin_checked="1">
                <h5 class="card-header">Users</h5>

            </div>
            <div class="d-md-flex align-items-center dt-layout-end col-md-auto ms-auto d-flex gap-md-4 justify-content-md-between justify-content-center gap-0 flex-wrap mt-0"
                bis_skin_checked="1">

                <div class="dt-buttons btn-group flex-wrap d-flex gap-4 mb-md-0 mb-6" bis_skin_checked="1">

                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>

                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table data-table" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Bootstrap Table with Header Dark -->
@endsection
@section('page-script')

<script>
    $(document).ready(function() {
        
        new DataTable('.data-table', {
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'role', name: 'role'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            scrollX: true,
             scrollY: "600px",   // 👈 yahan apni desired height set karo
            scrollCollapse: true,
        
        });
    });
</script>

@endsection