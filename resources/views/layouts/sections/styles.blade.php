<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<link href="{{asset('assets/select2/select2.css')}}" rel="stylesheet" />
{{-- <link href="{{asset('assets/select2/css/select2.min.css')}}" rel="stylesheet" /> --}}

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> --}}


@vite([
  'resources/assets/vendor/fonts/boxicons.scss'
])

<!-- Core CSS -->
@vite([
  'resources/assets/vendor/scss/core.scss',
  'resources/assets/vendor/scss/theme-default.scss',
  'resources/assets/css/demo.css'
])

<!-- Vendor Styles -->
@vite(['resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss'])
@yield('vendor-style')

<!-- Page Styles -->
{{-- <link href="{{asset('assets/select2/css/select2.min.css')}}" rel="stylesheet" /> --}}
<style>
    /* sidebar logo style */
    .app-brand {
        justify-content: center;
    }


    .card-header-custom {
      background-color: #2b2c40; /* main background */
      color: #fff; /* text color */
      border-bottom: 1px solid #444557; /* bottom border */
    }

    .card-header-custom small {
      color: #ffff !important; /* sub text color */
    }
    .card-header-custom h5 {
      color: #ffff !important; /* sub text color */
    }


    .dropdown-toggle-hide-arrow::after {
        display: none;
    }
    #columnToggleMenu {
        max-height: 250px; /* jitni height chahiye set kar lo */
        overflow-y: auto;  /* vertical scroll enable */
        overflow-x: hidden; /* horizontal scroll hide */
    }
    .toast-container{
      z-index: 9999 !important;
    }

</style>

@yield('page-style')
