@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Example static data
  const data = {
    gradeDistribution: {
      labels: ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4'],
      series: [15, 30, 40, 15],
    },
    departmentAverage: {
      labels: ['IT', 'HR', 'Marketing', 'Finance'],
      series: [3.8, 4.1, 3.5, 4.3],
    },
    performanceTrend: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      series: [3.6, 3.7, 3.9, 4.0, 4.1, 4.2],
    },
    promotionEligibility: {
      labels: ['Eligible', 'Under Review', 'Not Eligible'],
      series: [24, 10, 66],
    },
    bonusDistribution: {
      labels: ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4'],
      series: [
        { name: 'Bonus', data: [25, 20, 10, 5] },
        { name: 'Insurance', data: [20, 15, 8, 5] }
      ],
    },
    certificateStatus: {
      labels: ['Verified', 'Pending', 'Rejected'],
      series: [80, 15, 5],
    }
  };

  // 🌈 Modern, balanced color palette
  const chartColors = {
    primary: '#5B8FF9',   // ocean blue
    success: '#61DDAA',   // mint green
    info: '#65789B',      // slate gray-blue
    warning: '#F6BD16',   // warm gold
    danger: '#E8684A',    // coral red
    accent: '#7262FD'     // soft violet
  };

  // 1️⃣ Grade Distribution (Full Pie)
  new ApexCharts(document.querySelector("#gradeDistributionChart"), {
    chart: {
      type: 'pie',
      height: 320,
      toolbar: { show: false },
      dropShadow: { enabled: true, blur: 3, opacity: 0.1 },
    },
    series: data.gradeDistribution.series,
    labels: data.gradeDistribution.labels,
    colors: [
      chartColors.primary,
      chartColors.warning,
      chartColors.accent,
      chartColors.success
    ],
    legend: {
      position: 'bottom',
      fontSize: '13px',
      labels: { colors: '#777' }
    },
    dataLabels: {
      enabled: true,
      formatter: (val, opts) => opts.w.config.series[opts.seriesIndex] + '%',
      style: { fontSize: '13px', fontWeight: '500', colors: ['#fff'] }
    },
    tooltip: { y: { formatter: val => val + '%' } },
    stroke: { width: 1, colors: ['#fff'] }
  }).render();

  // ========================================
  // 2️⃣ Department Average with Drill-down
  // ========================================
  
  // Sample employee data for each department
  const employeeData = {
    'IT': [
      { name: 'John Doe', score: 4.2 },
      { name: 'Jane Smith', score: 3.8 },
      { name: 'Mike Johnson', score: 4.0 },
      { name: 'Sarah Williams', score: 3.5 },
      { name: 'Tom Brown', score: 3.9 }
    ],
    'HR': [
      { name: 'Emily Davis', score: 4.3 },
      { name: 'Robert Miller', score: 4.0 },
      { name: 'Lisa Anderson', score: 4.2 },
      { name: 'David Wilson', score: 3.9 }
    ],
    'Marketing': [
      { name: 'Anna Taylor', score: 3.7 },
      { name: 'Chris Moore', score: 3.4 },
      { name: 'Jessica Lee', score: 3.6 },
      { name: 'Daniel White', score: 3.3 }
    ],
    'Finance': [
      { name: 'Kevin Harris', score: 4.5 },
      { name: 'Michelle Clark', score: 4.2 },
      { name: 'James Lewis', score: 4.4 },
      { name: 'Patricia Walker', score: 4.1 }
    ]
  };

  let deptChartInstance = null;
  let currentView = 'department';
  let currentDepartment = null;
  let filteredEmployees = [];

  // Create control elements (search box and reset button)
  const chartContainer = document.querySelector("#departmentAverageChart");
  const controlsDiv = document.createElement('div');
  controlsDiv.id = 'chartControls';
  controlsDiv.className = 'mb-3';
  controlsDiv.style.display = 'none';
  controlsDiv.innerHTML = `
    <div class="d-flex gap-2 align-items-center">
      <input type="text" id="employeeSearch" class="form-control form-control-sm" placeholder="Search employee..." style="max-width: 250px;">
      <button id="resetChart" class="btn btn-sm btn-outline-secondary">
        <i class='bx bx-arrow-back'></i> Back to Departments
      </button>
    </div>
  `;
  chartContainer.parentElement.insertBefore(controlsDiv, chartContainer);

  // Function to render department chart
  function renderDepartmentChart() {
    const options = {
      chart: {
        type: 'bar',
        height: 320,
        events: {
          dataPointSelection: function(event, chartContext, config) {
            const departmentIndex = config.dataPointIndex;
            const department = data.departmentAverage.labels[departmentIndex];
            showEmployeeChart(department);
          }
        }
      },
      series: [{
        name: 'Avg Grade',
        data: data.departmentAverage.series
      }],
      xaxis: {
        categories: data.departmentAverage.labels
      },
      colors: [chartColors.accent],
      plotOptions: {
        bar: {
          borderRadius: 5,
          distributed: false,
          dataLabels: {
            position: 'top'
          }
        }
      },
      dataLabels: {
        enabled: true,
        formatter: function(val) {
          return val.toFixed(1);
        },
        offsetY: -20,
        style: {
          fontSize: '12px',
          colors: ["#304758"]
        }
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val.toFixed(2) + ' avg score';
          }
        }
      },
      title: {
        text: 'Click on a department to view employees',
        align: 'center',
        style: {
          fontSize: '12px',
          color: '#999'
        }
      }
    };

    if (deptChartInstance) {
      deptChartInstance.destroy();
    }

    deptChartInstance = new ApexCharts(chartContainer, options);
    deptChartInstance.render();
    currentView = 'department';
    document.getElementById('chartControls').style.display = 'none';
  }

  // Function to render employee chart
  function renderEmployeeChart(employees) {
    const employeeNames = employees.map(emp => emp.name);
    const employeeScores = employees.map(emp => emp.score);

    const options = {
      chart: {
        type: 'bar',
        height: 320
      },
      series: [{
        name: 'Score',
        data: employeeScores
      }],
      xaxis: {
        categories: employeeNames,
        labels: {
          rotate: -45,
          style: {
            fontSize: '11px'
          }
        }
      },
      colors: [chartColors.primary],
      plotOptions: {
        bar: {
          borderRadius: 5,
          distributed: true,
          dataLabels: {
            position: 'top'
          }
        }
      },
      dataLabels: {
        enabled: true,
        formatter: function(val) {
          return val.toFixed(1);
        },
        offsetY: -20,
        style: {
          fontSize: '12px',
          colors: ["#304758"]
        }
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val.toFixed(2) + ' score';
          }
        }
      },
      legend: {
        show: false
      },
      title: {
        text: `${currentDepartment} Department - Employee Scores`,
        align: 'left',
        style: {
          fontSize: '14px',
          fontWeight: 'bold'
        }
      }
    };

    if (deptChartInstance) {
      deptChartInstance.destroy();
    }

    deptChartInstance = new ApexCharts(chartContainer, options);
    deptChartInstance.render();
  }

  // Show employee chart for selected department
  function showEmployeeChart(department) {
    currentDepartment = department;
    currentView = 'employee';
    filteredEmployees = employeeData[department] || [];
    
    renderEmployeeChart(filteredEmployees);
    document.getElementById('chartControls').style.display = 'block';
    document.getElementById('employeeSearch').value = '';
  }

  // Search functionality
  document.addEventListener('input', function(e) {
    if (e.target.id === 'employeeSearch') {
      const searchTerm = e.target.value.toLowerCase();
      const allEmployees = employeeData[currentDepartment] || [];
      
      if (searchTerm === '') {
        filteredEmployees = allEmployees;
      } else {
        filteredEmployees = allEmployees.filter(emp => 
          emp.name.toLowerCase().includes(searchTerm)
        );
      }
      
      renderEmployeeChart(filteredEmployees);
    }
  });

  // Reset button functionality
  document.addEventListener('click', function(e) {
    if (e.target.id === 'resetChart' || e.target.closest('#resetChart')) {
      renderDepartmentChart();
    }
  });

  // Initial render of department chart
  renderDepartmentChart();

  // ========================================
  // End of Department Average Chart
  // ========================================

  // 3️⃣ Performance Trend
  new ApexCharts(document.querySelector("#performanceTrendChart"), {
    chart: { type: 'line', height: 320 },
    series: [{ name: 'Avg Grade', data: data.performanceTrend.series }],
    xaxis: { categories: data.performanceTrend.labels },
    stroke: { curve: 'smooth', width: 3 },
    colors: [chartColors.primary]
  }).render();

  // 4️⃣ Promotion Eligibility
  new ApexCharts(document.querySelector("#promotionEligibilityChart"), {
    chart: { type: 'bar', height: 300 },
    plotOptions: { bar: { horizontal: true, borderRadius: 6 } },
    series: [{ data: data.promotionEligibility.series }],
    xaxis: { categories: data.promotionEligibility.labels },
    colors: [chartColors.success, chartColors.warning, chartColors.danger]
  }).render();

  // 5️⃣ Bonus Distribution
  new ApexCharts(document.querySelector("#bonusDistributionChart"), {
    chart: { type: 'bar', stacked: true, height: 300 },
    series: data.bonusDistribution.series,
    xaxis: { categories: data.bonusDistribution.labels },
    colors: [chartColors.primary, chartColors.success],
    plotOptions: { bar: { borderRadius: 5 } }
  }).render();

  // 6️⃣ Certificate Verification Status (Full Pie)
  new ApexCharts(document.querySelector("#certificateStatusChart"), {
    chart: {
      type: 'pie',
      height: 320,
      toolbar: { show: false },
      dropShadow: { enabled: true, blur: 3, opacity: 0.1 },
    },
    series: data.certificateStatus.series,
    labels: data.certificateStatus.labels,
    colors: [
      chartColors.success,
      chartColors.warning,
      chartColors.danger
    ],
    legend: {
      position: 'bottom',
      fontSize: '13px',
      labels: { colors: '#777' }
    },
    dataLabels: {
      enabled: true,
      formatter: (val, opts) => opts.w.config.series[opts.seriesIndex] + '%',
      style: { fontSize: '13px', fontWeight: '500', colors: ['#fff'] }
    },
    tooltip: { y: { formatter: val => val + '%' } },
    stroke: { width: 1, colors: ['#fff'] }
  }).render();
});
</script>
@endsection
@section('content')
<div class="row">
  <div class="col-xxl-8 mb-6 order-0">
    <div class="card">
      <div class="d-flex align-items-start row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary mb-3">Welcome {{auth()->user()->name}}</h5>
            <p class="mb-6">You have done 57% more leads today.</p>

            {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-6">
            <img src="{{asset('assets/img/illustrations/man-with-laptop.png')}}" height="175" class="scaleX-n1-rtl" alt="View Badge User">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col-lg-4 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
              </div>
              {{-- <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div> --}}
            </div>
            <p class="mb-1">Customers</p>
            <h4 class="card-title mb-3">12,628</h4>
            <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> +72.80%</small>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="wallet info" class="rounded">
              </div>
              {{-- <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div> --}}
            </div>
            <p class="mb-1">Companies</p>
            <h4 class="card-title mb-3">4,679</h4>
            <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> +28.42%</small>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Total Revenue -->
  <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-lg-8">
          <div class="card-header d-flex align-items-center justify-content-between">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Overall Performance</h5>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="totalRevenue" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenue">
                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div id="totalRevenueChart" class="px-3"></div>
        </div>
        <div class="col-lg-4 d-flex align-items-center">
          <div class="card-body px-xl-9">
            <div class="text-center mb-6">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">
                  <script>
                  document.write(new Date().getFullYear())

                  </script>
                </button>
                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:void(0);">2024</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">2023</a></li>
                  {{-- <li><a class="dropdown-item" href="javascript:void(0);">2019</a></li> --}}
                </ul>
              </div>
            </div>

            <div id="growthChart"></div>
            {{-- <div class="text-center fw-medium my-6">62% Company Growth</div> --}}

            {{-- <div class="d-flex gap-3 justify-content-between">
              <div class="d-flex">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded-2 bg-label-primary"><i class="bx bx-dollar bx-lg text-primary"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small>
                    <script>
                    document.write(new Date().getFullYear() - 1)

                    </script>
                  </small>
                  <h6 class="mb-0">$32.5k</h6>
                </div>
              </div>
              <div class="d-flex">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded-2 bg-label-info"><i class="bx bx-wallet bx-lg text-info"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small>
                    <script>
                    document.write(new Date().getFullYear() - 2)

                    </script>
                  </small>
                  <h6 class="mb-0">$41.2k</h6>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Revenue -->
  <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
    <div class="row">
      <div class="col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/paypal.png')}}" alt="paypal" class="rounded">
              </div>
              {{-- <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div> --}}
            </div>
            <p class="mb-1">Employees</p>
            <h4 class="card-title mb-3">2,456</h4>
            <small class="text-danger fw-medium"><i class='bx bx-down-arrow-alt'></i> 14.82%</small>
          </div>
        </div>
      </div>
      <div class="col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <p class="mb-1">Projects</p>
            <h4 class="card-title mb-3">14,857</h4>
            <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> 28.14%</small>
          </div>
        </div>
      </div>
      <!-- <div class="col-12 mb-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10">
              <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                <div class="card-title mb-6">
                  <h5 class="text-nowrap mb-1">Profile Report</h5>
                  <span class="badge bg-label-warning">YEAR 2025</span>
                </div>
                <div class="mt-sm-auto">
                  <span class="text-success text-nowrap fw-medium"><i class='bx bx-up-arrow-alt'></i> 68.2%</span>
                  {{-- <h4 class="mb-0">$84,686k</h4> --}}
                </div>
              </div>
              <div id="profileReportChart"></div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
<div class="row">
  <!-- Order Statistics -->
  {{-- <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-1 me-2">Order Statistics</h5>
          <p class="card-subtitle">42.82k Total Sales</p>
        </div>
        <div class="dropdown">
          <button class="btn text-muted p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded bx-lg"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-6">
          <div class="d-flex flex-column align-items-center gap-1">
            <h3 class="mb-1">8,258</h3>
            <small>Total Orders</small>
          </div>
          <div id="orderStatisticsChart"></div>
        </div>
        <ul class="p-0 m-0">
          <li class="d-flex align-items-center mb-5">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-mobile-alt'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Electronic</h6>
                <small>Mobile, Earbuds, TV</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">82.5k</h6>
              </div>
            </div>
          </li>
          <li class="d-flex align-items-center mb-5">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-success"><i class='bx bx-closet'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Fashion</h6>
                <small>T-shirt, Jeans, Shoes</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">23.8k</h6>
              </div>
            </div>
          </li>
          <li class="d-flex align-items-center mb-5">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-info"><i class='bx bx-home-alt'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Decor</h6>
                <small>Fine Art, Dining</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">849k</h6>
              </div>
            </div>
          </li>
          <li class="d-flex align-items-center">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-secondary"><i class='bx bx-football'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Sports</h6>
                <small>Football, Cricket Kit</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">99</h6>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div> --}}
  <!--/ Order Statistics -->

  <!-- Expense Overview -->
  {{-- <div class="col-md-6 col-lg-4 order-1 mb-6">
    <div class="card h-100">
      <div class="card-header nav-align-top">
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income" aria-selected="true">Income</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab">Expenses</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab">Profit</button>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content p-0">
          <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
            <div class="d-flex mb-6">
              <div class="avatar flex-shrink-0 me-3">
                <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User">
              </div>
              <div>
                <p class="mb-0">Total Balance</p>
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-1">$459.10</h6>
                  <small class="text-success fw-medium">
                    <i class='bx bx-chevron-up bx-lg'></i>
                    42.9%
                  </small>
                </div>
              </div>
            </div>
            <div id="incomeChart"></div>
            <div class="d-flex align-items-center justify-content-center mt-6 gap-3">
              <div class="flex-shrink-0">
                <div id="expensesOfWeek"></div>
              </div>
              <div>
                <h6 class="mb-0">Income this week</h6>
                <small>$39k less than last week</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!--/ Expense Overview -->

  <!-- Transactions -->
  {{-- <div class="col-md-6 col-lg-4 order-2 mb-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Transactions</h5>
        <div class="dropdown">
          <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded bx-lg"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-4">
        <ul class="p-0 m-0">
          <li class="d-flex align-items-center mb-6">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/paypal.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="d-block">Paypal</small>
                <h6 class="fw-normal mb-0">Send money</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-2">
                <h6 class="fw-normal mb-0">+82.6</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex align-items-center mb-6">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="d-block">Wallet</small>
                <h6 class="fw-normal mb-0">Mac'D</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-2">
                <h6 class="fw-normal mb-0">+270.69</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex align-items-center mb-6">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/chart.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="d-block">Transfer</small>
                <h6 class="fw-normal mb-0">Refund</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-2">
                <h6 class="fw-normal mb-0">+637.91</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex align-items-center mb-6">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/cc-primary.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="d-block">Credit Card</small>
                <h6 class="fw-normal mb-0">Ordered Food</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-2">
                <h6 class="fw-normal mb-0">-838.71</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex align-items-center mb-6">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="d-block">Wallet</small>
                <h6 class="fw-normal mb-0">Starbucks</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-2">
                <h6 class="fw-normal mb-0">+203.33</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex align-items-center">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/cc-warning.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="d-block">Mastercard</small>
                <h6 class="fw-normal mb-0">Ordered Food</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-2">
                <h6 class="fw-normal mb-0">-92.45</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div> --}}
  <!--/ Transactions -->
</div>
<div class="row mt-6">
  <div class="col-lg-4 mb-6">
    <div class="card">
      <div class="card-header"><h5>Grade Distribution</h5></div>
      <div class="card-body"><div id="gradeDistributionChart"></div></div>
    </div>
  </div>

  <div class="col-lg-8 mb-6">
    <div class="card">
      <div class="card-header"><h5>Department Averages</h5></div>
      <div class="card-body"><div id="departmentAverageChart"></div></div>
    </div>
  </div>

  <div class="col-lg-6 mb-6">
    <div class="card">
      <div class="card-header"><h5>Performance Trend</h5></div>
      <div class="card-body"><div id="performanceTrendChart"></div></div>
    </div>
  </div>

  <div class="col-lg-6 mb-6">
    <div class="card">
      <div class="card-header"><h5>Promotion Eligibility</h5></div>
      <div class="card-body"><div id="promotionEligibilityChart"></div></div>
    </div>
  </div>

  <div class="col-lg-6 mb-6">
    <div class="card">
      <div class="card-header"><h5>Bonus & Insurance Distribution</h5></div>
      <div class="card-body"><div id="bonusDistributionChart"></div></div>
    </div>
  </div>

  <div class="col-lg-6 mb-6">
    <div class="card">
      <div class="card-header"><h5>Certificate Verification Status</h5></div>
      <div class="card-body"><div id="certificateStatusChart"></div></div>
    </div>
  </div>
</div>

@endsection
