@extends('layouts/contentNavbarLayout')

@section('title', 'Score Card')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
<style>
  /* ====== 🎨 Custom Visual Enhancements ====== */
  .card {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
  }

  #employeeResult {
    transition: all 0.4s ease-in-out;
    opacity: 0;
    transform: translateY(10px);
  }

  #employeeResult.show {
    opacity: 1;
    transform: translateY(0);
  }

  .table {
    border-radius: 0.75rem;
    overflow: hidden;
  }

  .table thead th {
    background-color: #f8f9fa;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
  }

  .table-hover tbody tr:hover {
    background-color: #f1f4f9;
  }

  .score-badge {
    border: 2px solid #dc3545;
    background-color: #fff4f4;
    color: #dc3545;
    font-weight: 700;
    font-size: 1.1rem;
    border-radius: 8px;
    padding: 6px 14px;
    display: inline-block;
  }

  .alert-info {
    border-left: 5px solid #0d6efd;
    background-color: #f1f7ff;
  }
</style>
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
<script>
document.addEventListener("DOMContentLoaded", function() {
  const employeeStats = {
    "EMP001": {
      name: "John Doe",
      dept: "IT",
      criteria: [
        { name: "Education", level: "Basics", grade: 1, weight: 1.5, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Tech Certificate", level: "Less than 1 Year", grade: 1, weight: 1.3, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Online Certificate", level: "None", grade: 0, weight: 0.0, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Experience - External", level: "6 Year", grade: 4, weight: 5.0, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Experience - Management", level: "10 Year", grade: 6, weight: 15.0, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Experience - Internal", level: "More than 10 Year", grade: 8.15, weight: 14.3, verified: "", verifiedContribution: "", relevant: "", relevantContribution: "" },
        { name: "English", level: "Basic", grade: 2, weight: 2.5, verified: "", verifiedContribution: "", relevant: "", relevantContribution: "" }
      ]
    },
    "EMP002": {
      name: "Sarah Khan",
      dept: "Finance",
      criteria: [
        { name: "Education", level: "Masters", grade: 3, weight: 3.0, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Tech Certificate", level: "2 Years", grade: 2, weight: 2.0, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Online Certificate", level: "Advanced", grade: 2, weight: 1.5, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Experience - External", level: "8 Year", grade: 5, weight: 7.0, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Experience - Management", level: "5 Year", grade: 4, weight: 10.0, verified: "Verified", verifiedContribution: "100%", relevant: "Relevant", relevantContribution: "100%" },
        { name: "Experience - Internal", level: "5-10 Year", grade: 6, weight: 10.0, verified: "", verifiedContribution: "", relevant: "", relevantContribution: "" },
        { name: "English", level: "Fluent", grade: 4, weight: 4.0, verified: "", verifiedContribution: "", relevant: "", relevantContribution: "" }
      ]
    }
  };

  function calculateTotal(criteria) {
    return criteria.reduce((sum, item) => sum + item.weight, 0).toFixed(1);
  }

  const searchBtn = document.getElementById("searchBtn");
  const searchInput = document.getElementById("employeeIdInput");
  const resultDiv = document.getElementById("employeeResult");
  const tableContainer = document.getElementById("scoreTable");

  searchBtn.addEventListener("click", function() {
    const id = searchInput.value.trim().toUpperCase();

    resultDiv.classList.remove("show");

    if (employeeStats[id]) {
      const emp = employeeStats[id];
      const total = calculateTotal(emp.criteria);

      resultDiv.innerHTML = `
        <div class="alert alert-info mb-4 shadow-sm">
          <h5 class="mb-1 fw-bold">${emp.name}</h5>
          <p class="mb-1"><strong>Employee ID:</strong> ${id}</p>
          <p class="mb-0"><strong>Department:</strong> ${emp.dept}</p>
        </div>
      `;
      resultDiv.classList.add("show");

      let tableHTML = `
        <div class="table-responsive shadow-sm">
          <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>Criteria</th>
                <th>Level</th>
                <th>Grade</th>
                <th>Weight</th>
                <th colspan="2" class="text-center">Verified Status</th>
                <th colspan="2" class="text-center">Relevance Status</th>
              </tr>
              <tr>
                <th></th><th></th><th></th><th></th>
                <th>Yes / No</th><th>Contribution</th>
                <th>Yes / No</th><th>Contribution</th>
              </tr>
            </thead>
            <tbody>
      `;

      emp.criteria.forEach(item => {
        tableHTML += `
          <tr>
            <td>${item.name}</td>
            <td>${item.level}</td>
            <td class="text-center">${item.grade}</td>
            <td class="text-center fw-semibold">${item.weight}</td>
            <td class="text-center">${item.verified || '-'}</td>
            <td class="text-center">${item.verifiedContribution || '-'}</td>
            <td class="text-center">${item.relevant || '-'}</td>
            <td class="text-center">${item.relevantContribution || '-'}</td>
          </tr>
        `;
      });

      tableHTML += `
        <tr class="table-warning text-center">
          <td colspan="3" class="fw-bold text-end">Total Score:</td>
          <td><span class="score-badge">${total}</span></td>
          <td colspan="4"></td>
        </tr>
      </tbody></table></div>
      `;

      tableContainer.innerHTML = tableHTML;
    } else {
      resultDiv.innerHTML = `<div class="alert alert-danger shadow-sm">No record found for ID: ${id}</div>`;
      tableContainer.innerHTML = '';
      resultDiv.classList.add("show");
    }
  });
});
</script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center rounded-top">
        <h5 class="mb-0 fw-bold text-primary">Employee Score Card</h5>
      </div>
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-md-6 mx-auto">
            <div class="input-group shadow-sm">
              <input type="text" id="employeeIdInput" class="form-control border-primary" placeholder="Enter Employee ID (e.g. EMP001)" />
              <button id="searchBtn" class="btn btn-primary px-4">Search</button>
            </div>
          </div>
        </div>

        <div id="employeeResult" class="mb-3"></div>
        <div id="scoreTable"></div>
      </div>
    </div>
  </div>
</div>
@endsection
