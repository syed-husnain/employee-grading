@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('page-style')

<style>
  #leadTable tbody tr:hover {
      background-color: #e8e8ff; /* halka blue */
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
    <li class="breadcrumb-item active" aria-current="page">Leads</li>
  </ol>
</nav>
<div class="card">
    <div class="row m-0 my-3 justify-content-between" bis_skin_checked="1">
        <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0" bis_skin_checked="1">
        <h5 class="card-header">Leads</h5>
    
    </div>
    <div class="d-md-flex align-items-center dt-layout-end col-md-auto ms-auto d-flex gap-md-4 justify-content-md-between justify-content-center gap-0 flex-wrap mt-0" bis_skin_checked="1">

        <div class="dt-buttons btn-group flex-wrap d-flex gap-4 mb-md-0 mb-6" bis_skin_checked="1"> 
           
            <a href="{{ route('leads.create') }}" class="btn btn-primary">Add New Lead</a>
            
        </div>
    </div>
</div>
  <div class="table-responsive text-nowrap">
    <table id="leadTable" class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>Company Name</th>
          <th>Country</th>
          <th>City</th>
          <th>State</th>
          <th>Zip</th>
          <th>Street</th>
          <th>Phone</th>
          <th>Mobile</th>
          <th>Email</th>
          <th>Amount</th>
          <th>Sale Person</th>
         
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

  $(document).ready(function () {
    var table = $('#leadTable').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true, // save state in localStorage
        ajax: "{{ route('leads.data') }}",
        columns: [
            
            {data: 'company_name', name: 'company_name'},
            {data: 'country_name', name: 'country_name'},
            {data: 'city', name: 'city'},
            {data: 'state_name', name: 'state_name'},
            {data: 'zip', name: 'zip'},
            {data: 'street', name: 'street'},
            {data: 'phone', name: 'phone'},
            {data: 'mobile', name: 'mobile'},
            {data: 'email', name: 'email'},
            {data: 'amount', name: 'amount'},
            {data: 'sale_person', name: 'sale_person'},
           
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        initComplete: function () {
            // check if state is saved in localStorage
            var state = table.state.loaded();

            if (!state) {
                // First time visit => only show first 6 columns
                table.columns().every(function (index) {
                    if (index > 5 && index < table.columns().nodes().length - 1) {
                        this.visible(false);
                    }
                });
            }

            // Build checkboxes dynamically according to actual column visibility
            table.columns().every(function (index) {
                if (index === table.columns().nodes().length - 1) return; // skip last column
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

    $('#columnToggleMenu').on('click', function (e) {
        e.stopPropagation();
    });

    $('#columnToggleMenu').on('change', 'input.toggle-vis', function (e) {
        var column = table.column($(this).data('column'));
        column.visible($(this).prop('checked'));
    });

     // Row Click Event
    $('#leadTable tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        if (data) {
            let companyId = data.id; // jo backend se aya h
            // yahan aap edit form open karwa saktay ho
            window.location.href = "{{ route('leads.edit', ':id') }}".replace(':id', companyId);
            // ya modal open karwana ho to ajax call se form load karao
        }
    });
});

</script>
@endsection