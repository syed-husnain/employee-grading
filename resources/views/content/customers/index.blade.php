@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('page-style')

    <style>
        #companyTable tbody tr:hover {
            background-color: #e8e8ff;
            /* halka blue */
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <!-- Basic Bootstrap Table -->


    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employees</li>
        </ol>
    </nav>
    <div class="card">
        <div class="row m-0 my-3 justify-content-between" bis_skin_checked="1">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0"
                bis_skin_checked="1">
                <h5 class="card-header">Employees</h5>

            </div>
            <div class="d-md-flex align-items-center dt-layout-end col-md-auto ms-auto d-flex gap-md-4 justify-content-md-between justify-content-center gap-0 flex-wrap mt-0"
                bis_skin_checked="1">

                <div class="dt-buttons btn-group flex-wrap d-flex gap-4 mb-md-0 mb-6" bis_skin_checked="1">

                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add New Employee</a>

                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table id="companyTable" class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Education</th>
                        <th>Education Score</th>
                        <th>Tech Certificate</th>
                        <th>Tech Certificate Score</th>
                        <th>Online Certificate</th>
                        <th>Online Certificate Score</th>
                        <th>Experience - External</th>
                        <th>Experience External Score</th>
                        <th>Experience - Management</th>
                        <th>Experience Management Score</th>
                        <th>Experience - Internal</th>
                        <th>Experience Internal Score</th>
                        <th>English</th>
                        <th>English Score</th>
                        <th>Total Score</th>
                        <th>Grade</th>
                        <th>Insurance Bracket</th>
                        <th>Bonus</th>
                        <th>Off Days</th>
                        <th>
                            <!-- Dropdown in last column -->
                            <div class="dropdown">
                                <i class="fa fa-exchange dropdown-toggle dropdown-toggle-hide-arrow" aria-hidden="true"
                                    data-bs-toggle="dropdown" style="cursor: pointer; font-size: 18px;"></i>

                                <ul class="dropdown-menu p-2" id="columnToggleMenu"></ul>
                            </div>
                        </th>
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
            var table = $('#companyTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true, // save state in localStorage
                ajax: "{{ route('employees.data') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'designation',
                        name: 'designation'
                    },
                    {
                        data: 'education',
                        name: 'education'
                    },
                    {
                        data: 'education_score',
                        name: 'education_score'
                    },
                    {
                        data: 'tech_certificate',
                        name: 'tech_certificate'
                    },
                    {
                        data: 'tech_certificate_score',
                        name: 'tech_certificate_score'
                    },
                    {
                        data: 'online_certificate',
                        name: 'online_certificate'
                    },
                    {
                        data: 'online_certificate_score',
                        name: 'online_certificate_score'
                    },
                    {
                        data: 'experience_external',
                        name: 'experience_external'
                    },
                    {
                        data: 'experience_external_score',
                        name: 'experience_external_score'
                    },
                    {
                        data: 'experience_management',
                        name: 'experience_management'
                    },
                    {
                        data: 'experience_management_score',
                        name: 'experience_management_score'
                    },
                    {
                        data: 'experience_internal',
                        name: 'experience_internal'
                    },
                    {
                        data: 'experience_internal_score',
                        name: 'experience_internal_score'
                    },
                    {
                        data: 'english',
                        name: 'english'
                    },
                    {
                        data: 'english_score',
                        name: 'english_score'
                    },
                    {
                        data: 'total_score',
                        name: 'total_score'
                    },
                    {
                        data: 'grade',
                        name: 'grade'
                    },
                    {
                        data: 'insurance_bracket',
                        name: 'insurance_bracket'
                    },
                    {
                        data: 'bonus',
                        name: 'bonus'
                    },
                    {
                        data: 'off_days',
                        name: 'off_days'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                initComplete: function() {
                    // check if state is saved in localStorage
                    var state = table.state.loaded();

                    if (!state) {
                        // First time visit => only show first 6 columns
                        table.columns().every(function(index) {
                            if (index > 5 && index < table.columns().nodes().length - 1) {
                                this.visible(false);
                            }
                        });
                    }

                    // Build checkboxes dynamically according to actual column visibility
                    table.columns().every(function(index) {
                        if (index === table.columns().nodes().length - 1)
                            return; // skip last column
                        var colName = $(this.header()).text();
                        var isVisible = this.visible();

                        $('#columnToggleMenu').append(`
                  <li>
                    <label class="dropdown-item">
                      <input type="checkbox" class="toggle-vis" data-column="${index}" ${isVisible ? 'checked' : ''}> ${colName}
                    </label>
                  </li>
                `);
                    });
                }
            });

            $('#columnToggleMenu').on('click', function(e) {
                e.stopPropagation();
            });

            $('#columnToggleMenu').on('change', 'input.toggle-vis', function(e) {
                var column = table.column($(this).data('column'));
                column.visible($(this).prop('checked'));
            });

            // Row Click Event
            $('#companyTable tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                if (data) {
                    let companyId = data.id; // jo backend se aya h
                    // yahan aap edit form open karwa saktay ho
                    window.location.href = "{{ route('employees.edit', ':id') }}".replace(':id',
                        companyId);
                    // ya modal open karwana ho to ajax call se form load karao
                }
            });
        });
    </script>
@endsection
