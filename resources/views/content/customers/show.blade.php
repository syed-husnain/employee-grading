@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Pages')
@section('page-style')
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            {{-- <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('employees.index') }}">Organizations
                        </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Organization</li>
                </ol>
            </nav> --}}
            <div class="container py-4">

                {{-- 🌈 Profile Header --}}
                <div class="card mb-4 shadow-sm border-0 bg-gradient-primary text-white p-4 rounded-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Profile"
                            class="rounded-circle border border-2 me-3" width="80" height="80">
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $employee->name }}</h3>
                            <p class="mb-0 fw-bold ">{{ $employee->designation ?? 'N/A' }}</p>
                            <small>{{ $employee->education ?? 'N/A' }}</small>
                        </div>
                    </div>
                </div>

                {{-- 🔹 Main Info Row --}}
                <div class="row g-4">

                    {{-- LEFT SIDE - Basic Info --}}
                    <div class="col-md-6 col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light">
                                <h5 class="mb-1">Basic & Education Details</h5>
                                <p class="my-0 text-muted small">Profile Summary</p>
                            </div>
                            <div class="card-body">

                                {{-- Education --}}
                                <div class="d-flex align-items-center mb-3">
                                    <i class='bx bxs-graduation me-2 text-primary fs-5'></i>
                                    <div>
                                        <h6 class="mb-0">Education</h6>
                                        <small>{{ $employee->education ?? 'N/A' }} ({{ $employee->education_score ?? 0 }}
                                            pts)</small>
                                    </div>
                                </div>

                                {{-- Tech Certificate --}}
                                <div class="d-flex align-items-center mb-3">
                                    <i class='bx bx-certification me-2 text-success fs-5'></i>
                                    <div>
                                        <h6 class="mb-0">Tech Certificate</h6>
                                        <small>{{ $employee->tech_certificate ?? 'N/A' }}
                                            ({{ $employee->tech_certificate_score ?? 0 }} pts)</small>
                                    </div>
                                </div>

                                {{-- Online Certificate --}}
                                <div class="d-flex align-items-center mb-3">
                                    <i class='bx bx-cloud me-2 text-info fs-5'></i>
                                    <div>
                                        <h6 class="mb-0">Online Certificate</h6>
                                        <small>{{ $employee->online_certificate ?? 'N/A' }}
                                            ({{ $employee->online_certificate_score ?? 0 }} pts)</small>
                                    </div>
                                </div>

                                {{-- English --}}
                                <div class="d-flex align-items-center mb-3">
                                    <i class='bx bx-book-content me-2 text-secondary fs-5'></i>
                                    <div>
                                        <h6 class="mb-0">English</h6>
                                        <small>{{ $employee->english ?? 'N/A' }} ({{ $employee->english_score ?? 0 }}
                                            pts)</small>
                                    </div>
                                </div>

                                {{-- Education Score Progress --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0">Education Score</h6>
                                        <small>{{ $employee->education_score ?? 0 }}/10</small>
                                    </div>
                                    <div class="progress rounded-pill" style="height: 8px;">
                                        <div class="progress-bar bg-success progress-bar-animated"
                                            style="width: {{ ($employee->education_score / 10) * 100 }}%;"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- RIGHT SIDE - Scores & Performance --}}
                    <div class="col-md-6 col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light">
                                <h5 class="mb-1">Performance & Benefits</h5>
                                <p class="my-0 text-muted small">Scoring Overview</p>
                            </div>
                            <div class="card-body">

                                {{-- External Experience --}}
                                <div class="d-flex align-items-center mb-3">
                                    <i class='bx bx-briefcase-alt-2 me-2 text-warning fs-5'></i>
                                    <div>
                                        <h6 class="mb-0">External Experience</h6>
                                        <small>{{ $employee->experience_external ?? 'N/A' }}
                                            ({{ $employee->experience_external_score ?? 0 }} pts)</small>
                                    </div>
                                </div>

                                {{-- Internal Experience --}}
                                <div class="d-flex align-items-center mb-3">
                                    <i class='bx bx-building-house me-2 text-danger fs-5'></i>
                                    <div>
                                        <h6 class="mb-0">Internal Experience</h6>
                                        <small>{{ $employee->experience_internal ?? 'N/A' }}
                                            ({{ $employee->experience_internal_score ?? 0 }} pts)</small>
                                    </div>
                                </div>

                                {{-- Management Experience --}}
                                <div class="d-flex align-items-center mb-3">
                                    <i class='bx bx-user-voice me-2 text-primary fs-5'></i>
                                    <div>
                                        <h6 class="mb-0">Management Experience</h6>
                                        <small>{{ $employee->experience_management ?? 'N/A' }}
                                            ({{ $employee->experience_management_score ?? 0 }} pts)</small>
                                    </div>
                                </div>

                                {{-- Total Score (Animated Counter) --}}
                                <div class="text-center mt-4 mb-3">
                                    <h4 class="fw-bold">Total Score:
                                        <span id="score">{{ $employee->total_score ?? 0 }}</span>
                                    </h4>
                                </div>

                                {{-- Grade --}}
                                @php
                                    $gradeColor = match ($employee->grade) {
                                        'Grade 1' => 'success',
                                        'Grade 2' => 'warning',
                                        'Grade 3' => 'danger',
                                        default => 'secondary',
                                    };
                                @endphp
                                <div class="text-center">
                                    <span class="badge bg-{{ $gradeColor }} fs-6 px-3 py-2">
                                        {{ $employee->grade ?? 'N/A' }}
                                    </span>
                                </div>

                                {{-- Benefits --}}
                                <div class="mt-4">
                                    <h6>Insurance Bracket: <small
                                            class="text-muted">{{ $employee->insurance_bracket ?? 'N/A' }}</small></h6>
                                    <h6>Bonus: <small class="text-muted">{{ $employee->bonus ?? 'N/A' }}</small></h6>
                                    <h6>Off Days: <small class="text-muted">{{ $employee->off_days ?? 'N/A' }}</small></h6>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                {{-- 🧾 CERTIFICATES SECTION --}}
                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">Certificates & Documents</h5>
                        <p class="my-0 text-muted small">Uploaded by Employee</p>
                    </div>
                    <div class="card-body">
                        @if ($employee->certificates && $employee->certificates->count() > 0)
                            <div class="row">
                                @foreach ($employee->certificates as $cert)
                                    <div class="col-md-4 col-sm-6 mt-3 mb-3">
                                        <div class="card border-0 shadow-sm h-100 hover-shadow">
                                            <div class="card-body text-center">
                                                <i class='bx bxs-file-doc text-primary fs-1 mb-2'></i>
                                                <h6 class="mb-1">{{ $cert->certificate_name }}</h6>
                                                <small class="text-muted d-block mb-2">
                                                    {{ strtoupper(pathinfo($cert->file_path, PATHINFO_EXTENSION)) }} file
                                                </small>
                                                <a href="{{ asset('storage/' . $cert->file_path) }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class='bx bx-show'></i> View
                                                </a>
                                                <a href="{{ asset('storage/' . $cert->file_path) }}" download
                                                    class="btn btn-sm btn-outline-success ms-2">
                                                    <i class='bx bx-download'></i> Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mt-3 mb-3">
                                        <div class="card border-0 shadow-sm h-100 hover-shadow">
                                            <div class="card-body text-center">
                                                <i class='bx bxs-file-doc text-primary fs-1 mb-2'></i>
                                                <h6 class="mb-1">{{ $cert->certificate_name }}</h6>
                                                <small class="text-muted d-block mb-2">
                                                    {{ strtoupper(pathinfo($cert->file_path, PATHINFO_EXTENSION)) }} file
                                                </small>
                                                <a href="{{ asset('storage/' . $cert->file_path) }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class='bx bx-show'></i> View
                                                </a>
                                                <a href="{{ asset('storage/' . $cert->file_path) }}" download
                                                    class="btn btn-sm btn-outline-success ms-2">
                                                    <i class='bx bx-download'></i> Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mt-3 mb-3">
                                        <div class="card border-0 shadow-sm h-100 hover-shadow">
                                            <div class="card-body text-center">
                                                <i class='bx bxs-file-doc text-primary fs-1 mb-2'></i>
                                                <h6 class="mb-1">{{ $cert->certificate_name }}</h6>
                                                <small class="text-muted d-block mb-2">
                                                    {{ strtoupper(pathinfo($cert->file_path, PATHINFO_EXTENSION)) }} file
                                                </small>
                                                <a href="{{ asset('storage/' . $cert->file_path) }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class='bx bx-show'></i> View
                                                </a>
                                                <a href="{{ asset('storage/' . $cert->file_path) }}" download
                                                    class="btn btn-sm btn-outline-success ms-2">
                                                    <i class='bx bx-download'></i> Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted text-center my-3">No certificates uploaded yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const el = document.getElementById('score');
            const final = parseFloat(el.innerText);
            let count = 0;
            const interval = setInterval(() => {
                count += 0.5;
                el.innerText = count.toFixed(2);
                if (count >= final) clearInterval(interval);
            }, 30);
        });
    </script>

@endsection
