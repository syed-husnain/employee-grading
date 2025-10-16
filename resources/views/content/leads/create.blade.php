@extends('layouts/contentNavbarLayout')

@section('title', ' Lead Form')

@section('content')
    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('leads.index') }}">Leads </a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Lead</li>
        </ol>
    </nav>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-12">
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Lead Form</h5>

                </div>
                <div class="card-body mt-4">

                    <form id="lead-form" action="{{ route('leads.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="company_name" class="col-sm-4 col-form-label">Company Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                            placeholder="e.g. Brandon Freeman" />
                                    </div>
                                </div>



                                <div class="mb-2 row align-items-center">
                                    <label for="street" class="col-sm-4 col-form-label">Address <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="street" class="form-control" id="street"
                                            placeholder="Street..." />
                                    </div>
                                </div>

                                {{-- <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="Street 2..." />
                                    </div>
                                </div> --}}

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="city" id="city" class="form-control" placeholder="City" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <select name="state" id="state" class="form-control">
                                            <option value="" selected disabled>State</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="zip" id="zip" class="form-control" placeholder="ZIP" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <select name="country" id="country" class="form-control">
                                            <option value="" disabled>Country</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="website" class="col-sm-4 col-form-label">Website</label>
                                    <div class="col-sm-8">
                                        <input name="website" type="text" class="form-control" id="website"
                                            placeholder="e.g. https://www.example.com" />
                                    </div>
                                </div>

                                {{-- <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Language</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="language" class="form-control" />
                                    </div>
                                </div> --}}

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Contact Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="contact_name" id="contact_name" class="form-control" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Email <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" value="" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="job_position" class="col-sm-4 col-form-label">Job Position <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="job_position" class="form-control" id="job_position"
                                            placeholder="e.g. Sales Director" />
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" class="form-control" id="phone" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="mobile" class="col-sm-4 col-form-label">Mobile <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="mobile" class="form-control" id="mobile" />
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="tags" class="col-sm-4 col-form-label">Tags</label>
                                    <div class="col-sm-8">
                                        <select name="tags[]" id="tags" class="form-control select2" multiple>
                                            @if($tags->count() >= 0)
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="customer" class="col-sm-4 col-form-label">Company</label>
                                    <div class="col-sm-8">
                                        <select name="customer" id="customer" class="form-control">
                                            <option value="" selected disabled>Select Company</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="mb-2 row align-items-center">
                                    <label for="currency" class="col-sm-4 col-form-label">Currency</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="currency" class="form-control" id="currency" />
                                    </div>
                                </div> --}}
                                {{-- <div class="mb-2 row align-items-center">
                                    <label for="currency_rate" class="col-sm-4 col-form-label">Currency Rate</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="currency_rate" class="form-control"
                                            id="currency_rate" />
                                    </div>
                                </div> --}}

                                <div class="mb-2 row align-items-center">
                                    <label for="amount" class="col-sm-4 col-form-label">Amount</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="amount" class="form-control" id="amount" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="sales_person" class="col-sm-4 col-form-label">Sales Person</label>
                                    <div class="col-sm-8">
                                        <select name="salesperson" id="salesperson" class="form-control">
                                            <option value="" selected disabled>Sales Person</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="sales_team" class="col-sm-4 col-form-label">Sales Team</label>
                                    <div class="col-sm-8">
                                        <select name="sale_team" id="sale_team" class="form-control">
                                            <option value="1">Sale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="sales_team" class="col-sm-4 col-form-label">Internal Notes</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="internal_notes" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="card mb-6">
                                    <div class="nav-align-top">
                                        <!-- Nav Tabs -->
                                        <ul class="nav nav-tabs" id="formTabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="lead-extra-info-tab"
                                                    data-bs-toggle="tab" data-bs-target="#lead-extra-info"
                                                    type="button" role="tab" aria-controls="lead-extra-info"
                                                    aria-selected="true">
                                                    Extra Info
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="lead-lead-tab" data-bs-toggle="tab"
                                                    data-bs-target="#leads-lead" type="button" role="tab"
                                                    aria-controls="leads-lead" aria-selected="false">
                                                    Leads
                                                </button>
                                            </li>
                                            {{-- <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="lead-mql-data-tab" data-bs-toggle="tab"
                                                    data-bs-target="#leads-mql-data" type="button" role="tab"
                                                    aria-controls="leads-mql-data" aria-selected="false">
                                                    MQL Data
                                                </button>
                                            </li> --}}
                                            {{-- <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="lead-financial-info-tab" data-bs-toggle="tab"
                                                    data-bs-target="#leads-financial-info" type="button" role="tab"
                                                    aria-controls="leads-financial-info" aria-selected="false">
                                                    Financial Info
                                                </button>
                                            </li> --}}
                                        </ul>

                                        <!-- Tab Content -->
                                        <div class="tab-content mt-3" id="formTabsContent">
                                            <!-- Tab Content -->
                                            <div class="tab-pane fade show active" id="lead-extra-info" role="tabpanel"
                                                aria-labelledby="lead-extra-info-tab">
                                                <form>
                                                    <div class="row">
                                                        <!-- Left Column -->
                                                        <div class="col-md-6">
                                                            <h5>Marketing</h5>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Entity</label>
                                                                <div class="col-sm-7">
                                                                    <select name="marketing_company" id="marketing_company" class="form-control select2">
                                                                        <option value="" selected disabled>Select Entity</option>
                                                                        @if($companies->count() >= 0)
                                                                            @foreach ($companies as $company)
                                                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                  
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Campaign</label>
                                                                <div class="col-sm-7">
                                                                    <select name="marketing_campaign" id="marketing_campaign" class="form-control select2">
                                                                        <option value="" selected disabled>Select Campaign</option>
                                                                        @if($campaigns->count() >= 0)
                                                                            @foreach ($campaigns as $campaign)
                                                                                <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Channels</label>
                                                                <div class="col-sm-7">
                                                                    <select name="marketing_medium" id="marketing_medium" class="form-control select2">
                                                                        <option value="" selected disabled> Select Channel</option>
                                                                        @if($mediums->count() >= 0)
                                                                            @foreach ($mediums as $medium)
                                                                                <option value="{{ $medium->id }}">{{ $medium->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            {{-- <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Source</label>
                                                                <div class="col-sm-7">
                                                                    <select name="marketing_source" id="marketing_source" class="form-control select2">
                                                                        <option value="" selected disabled>Select Source</option>
                                                                        @if($sources->count() >= 0)
                                                                            @foreach ($sources as $source)
                                                                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                  
                                                                </div>
                                                            </div> --}}
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Referred By</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="marketing_referred_by" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Right Column -->
                                                        <div class="col-md-6">
                                                            <h5>Analysis</h5>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Assignment Date</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="analysis_assignment_date" id="analysis_assignment_date" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Closed Date</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="analysis_closed_date" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Leads Tab -->
                                            <div class="tab-pane fade" id="leads-lead" role="tabpanel"
                                                aria-labelledby="lead-lead-tab">
                                                <form>
                                                    <div class="row">
                                                        <!-- Left Column -->
                                                        <div class="col-md-6">
                                                            
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Campaign</label>
                                                                <div class="col-sm-7">
                                                                    <select name="lead_campaign" id="lead_campaign" class="form-control select2">
                                                                        <option value="" selected disabled>Select Campaign</option>
                                                                        @if($campaigns->count() >= 0)
                                                                            @foreach ($campaigns as $campaign)
                                                                                <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                   
                                                                </div>
                                                            </div>
                                                            {{-- <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Source</label>
                                                                <div class="col-sm-7">
                                                                    <select name="lead_source" id="lead_source" class="form-control select2">
                                                                        <option value="" selected disabled>Select Source</option>
                                                                        @if($sources->count() >= 0)
                                                                            @foreach ($sources as $source)
                                                                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                   
                                                                </div>
                                                            </div> --}}
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Customer Budget</label>
                                                                <div class="col-sm-7">
                                                                    <select name="lead_customer_budget" id="lead_customer_budget" class="form-control select2">
                                                                        <option value="" selected disabled>Select Customer Budget</option>
                                                                        <option value="1" selected>Yes</option>
                                                                        <option value="0" selected>No</option>
                                                                    </select>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Product Service</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="lead_product_service" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Have System</label>
                                                                <div class="col-sm-7">
                                                                     <select name="lead_have_system" id="lead_have_system" class="form-control select2">
                                                                        <option value="" selected disabled>Select Option</option>
                                                                        <option value="1" selected>Yes</option>
                                                                        <option value="0" selected>No</option>
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Right Column -->
                                                        <div class="col-md-6">
                                                            
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Number of Employees</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="lead_number_of_employees" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Number of Companies</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="lead_number_of_companies" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Industry</label>
                                                                <div class="col-sm-7">
                                                                    <select name="lead_industry" id="lead_industry" class="form-control select2">
                                                                        <option value="" selected disabled>Select Industry</option>
                                                                        @if($industries->count() >= 0)
                                                                            @foreach ($industries as $industry)
                                                                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Practice Area <i class="text-danger">*</i></label>
                                                                <div class="col-sm-7">
                                                                    <select name="lead_practice_area" id="lead_practice_area" class="form-control select2">
                                                                        <option value="" selected disabled>Select Practice Area</option>
                                                                        @if($practiceAreas->count() >= 0)
                                                                            @foreach ($practiceAreas as $practiceArea)
                                                                                <option value="{{ $practiceArea->id }}">{{ $practiceArea->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                   
                                                                </div>
                                                            </div>
                                                            {{-- <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Practice Area</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="lead_practice_area2" class="form-control">
                                                                </div>
                                                            </div> --}}

                                                           
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- MQL DATA Tab -->
                                            <div class="tab-pane fade" id="leads-mql-data" role="tabpanel"
                                                aria-labelledby="lead-mql-data-tab">
                                                <form>
                                                    <div class="row">
                                                        <!-- Left Column -->
                                                        <div class="col-md-6">
                                                            
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Business Type <i class="text-danger">*</i></label>
                                                                <div class="col-sm-7">
                                                                     <select name="mql_business_type" id="mql_business_type" class="form-control select2">
                                                                        <option value="" selected disabled>Select Business Type</option>
                                                                        <option value="private" selected>Private</option>
                                                                        <option value="government" selected>Government</option>
                                                                    </select>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Industry <i class="text-danger">*</i></label>
                                                                <div class="col-sm-7">
                                                                    <select name="mql_industry" id="mql_industry" class="form-control select2">
                                                                        <option value="" selected disabled>Select Industry</option>
                                                                        @if($industries->count() >= 0)
                                                                            @foreach ($industries as $industry)
                                                                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Have System?</label>
                                                                <div class="col-sm-7">
                                                                     <select name="mql_have_system" id="mql_have_system" class="form-control select2">
                                                                        <option value="" selected disabled>Select Option</option>
                                                                        <option value="1" selected>Yes</option>
                                                                        <option value="0" selected>No</option>
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                        
                                                        </div>

                                                        <!-- Right Column -->
                                                        <div class="col-md-6">
                                                            
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Employees Head Count</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="mql_employees_head_count" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Number of Companies</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="mql_number_of_companies" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">System Name</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="mql_system_name" class="form-control">
                                                                </div>
                                                            </div>
                                                                            
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Financial Info Tab -->
                                            <div class="tab-pane fade" id="leads-financial-info" role="tabpanel"
                                                aria-labelledby="lead-financial-info-tab">
                                                <form>
                                                    <div class="row">
                                                        <!-- Left Column -->
                                                        <div class="col-md-6">
                                                            
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Customer Budget</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_customer_budget" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">License Value</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_license_value" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">License AMC </label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_license_amc" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Service Value</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_service_value" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Hosting </label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_hosting" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Abacus License</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_abacus" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Abacus AMC</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_abacus_amc" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Addons License</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_addons_license" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Addons AMC</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="financial_addons_amc" class="form-control">
                                                                </div>
                                                            </div>
                                                        
                                                        </div>

                                                        <!-- Right Column -->
                                                        <div class="col-md-6">
                                                            
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Customer Budget</label>
                                                                <div class="col-sm-7">
                                                                    <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">License Value</label>
                                                                <div class="col-sm-7">
                                                                    <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">License AMC </label>
                                                                <div class="col-sm-7">
                                                                    <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Service Value</label>
                                                                <div class="col-sm-7">
                                                                    <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Hosting Valu</label>
                                                                <div class="col-sm-7">
                                                                    <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Abacus License</label>
                                                                <div class="col-sm-7">
                                                                   <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Abacus AMC</label>
                                                                <div class="col-sm-7">
                                                                   <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Addons Licensee</label>
                                                                <div class="col-sm-7">
                                                                   <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Addons AMC</label>
                                                                <div class="col-sm-7">
                                                                    <span>0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Expected Deal</label>
                                                                <div class="col-sm-7">
                                                                  <span>0.00</span>
                                                                </div>
                                                            </div>
                                                                            
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>




                                </div>
                            </div>
                           
                        </div>


                        <div class="mt-4">
                            <button type="submit" id="submit" class="btn btn-primary">Save</button>
                            {{-- <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button type="submit" id="submit" class="btn btn-primary">Save</button>

                                <div class="btn-group" role="group">
                                    <!-- Main Button -->
                                    <button id="convertBtn" type="button" class="btn btn-primary">
                                        Convert to Opportunity
                                    </button>

                                    <!-- Dropdown for extra options -->
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" id="lostBtn" href="#">Lost</a></li>
                                        <li><a class="dropdown-item" id="lostBtn" href="#">Convert to Ticket</a></li>
                                    </ul>
                                </div>
                            </div> --}}
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




            function initSelect2Customers(selector, modalId = null) {
                $(selector).select2({
                    placeholder: 'Select Customer',
                    dropdownParent: modalId ? $(modalId) : $(document.body),
                    ajax: {
                        url: "{{ route('general.customers') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return { search: params.term };
                        },
                        processResults: function (data) {
                            return { results: data.results };
                        }
                    }
                });
            }

            initSelect2Customers('#customer');


            let savedCountryId;
            let savedCountryName;
            let savedStateId;
            let savedStateName;

            // ✅ Customer select hone par details fetch karo
            $('#customer').on('select2:select', function (e) {
                var customerId = e.params.data.id;

                $.ajax({
                    url: "{{ route('general.customer-detail') }}", // backend route jo detail return karega
                    type: "POST",
                    data: { 
                        customer_id: customerId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.status) {
                            var customer = response.customer;

                            // Autofill fields
                            $('#company_name').val(customer.company_name ? customer.company_name : customer.name);
                            $('#street').val(customer.street);
                            $('#city').val(customer.city);
                            $('#state').val(customer.state);
                            $('#zip').val(customer.zip);
                            $('#email').val(customer.email);
                            $('#website').val(customer.website_url);
                            $('#job_position').val(customer.job_position);
                            $('#phone').val(customer.phone);
                            $('#mobile').val(customer.mobile);

                            if(customer.country) {
                                savedCountryId = customer.country.id;
                                savedCountryName = customer.country.name;
                            }
                            if(customer.state) {
                                savedStateId = customer.state.id;
                                savedStateName = customer.state.name;
                            }
                            

                            // Country pre-select
                            if (savedCountryId) {
                                let countryOption = new Option(savedCountryName, savedCountryId, true, true);
                                $('#country').append(countryOption).trigger('change');
                            }

                            // State pre-select
                            if (savedStateId) {
                                let stateOption = new Option(savedStateName, savedStateId, true, true);
                                $('#state').append(stateOption).trigger('change');
                            }

                            

                        }
                    }
                });
            });


            function initSelect2Country(selector, modalId = null) {
                $(selector).select2({
                    placeholder: 'Select Country',
                    dropdownParent: modalId ? $(modalId) : $(document.body),
                    ajax: {
                        url: "{{ route('general.countries') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return { search: params.term };
                        },
                        processResults: function (data) {
                            return { results: data.results };
                        }
                    }
                });
            }

            function initSelect2State(selector, countrySelector, modalId = null) {
                $(selector).select2({
                    placeholder: 'Select State',
                    dropdownParent: modalId ? $(modalId) : $(document.body),
                    ajax: {
                        url: "{{ route('general.states') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                search: params.term,
                                country_id: $(countrySelector).val()
                            };
                        },
                        processResults: function (data) {
                            return { results: data.results };
                        }
                    }
                });

                // Jab country change ho to state reset
                $(countrySelector).on('change', function () {
                    $(selector).val(null).trigger('change');
                });
            }

            function initSelect2SalePersons(selector, modalId = null) {
                $(selector).select2({
                    placeholder: 'Select Sale Person',
                    dropdownParent: modalId ? $(modalId) : $(document.body),
                    ajax: {
                        url: "{{ route('general.users') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return { search: params.term };
                        },
                        processResults: function (data) {
                            return { results: data.results };
                        }
                    }
                });
            }

            let authUserId = "{{ auth()->id() }}"; 
            let authUserName = "{{ auth()->user()->name }}";
            
            if (authUserId && authUserId != 1) {
                let option = new Option(authUserName, authUserId, true, true);
                $('#salesperson').append(option).trigger('change');
            }

            initSelect2Country('#country');  
            initSelect2State('#state', '#country'); 
            initSelect2SalePersons('#salesperson');



             // submit user form
            // $('#submit').click(function(e) {
            //     e.preventDefault(); // precautionary

            //     let form = $('#lead-form');
            //     let url = form.attr("action");
            //     let formData = new FormData(form[0]);

            //     $.ajax({
            //         type: 'POST',
            //         url: url,
            //         data: formData,
            //         contentType: false,
            //         processData: false,
            //         success: function(response) {
            //             if (response.status) {
            //                 showToast("Lead created successfully!", "Success", "primary");
            //                 setTimeout(() => {
            //                     window.location.href = response.redirect_url;
            //                 }, 
            //                 3000);
                            
            //             }else{
            //                 showToast(response.message, "Error", "danger");
            //             }
            //         },
            //         error: function(response) {
            //             if (response.responseJSON?.errors) {
            //                 errorsGetNew(response.responseJSON.errors);
            //                 showToast(response.responseJSON.message, "Error", "danger");
            //             }
            //         }
            //     });
            // });

            $('#submit').click(function(e) {
                e.preventDefault();
                saveLead(false); // false = not opportunity
            });

            // Convert to Opportunity
            $('#convertBtn').click(function(e) {
                e.preventDefault();
                saveLead(true); // true = opportunity
            });

            // Reusable function
            function saveLead(isOpportunity = false) {
                let form = $('#lead-form');
                let url = form.attr("action");
                let formData = new FormData(form[0]);

                // agar convert button click hua hai to param add kardo
                if (isOpportunity) {
                    formData.append('is_opportunity', 1);
                }

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            let msg = isOpportunity 
                                ? "Lead converted to Opportunity successfully!" 
                                : "Lead created successfully!";
                            
                            showToast(msg, "Success", "primary");

                            setTimeout(() => {
                                window.location.href = response.redirect_url;
                            }, 3000);
                        } else {
                            showToast(response.message, "Error", "danger");
                        }
                    },
                    error: function(response) {
                        if (response.responseJSON?.errors) {
                            errorsGetNew(response.responseJSON.errors);
                            showToast(response.responseJSON.message, "Error", "danger");
                        }
                    }
                });
            }


             $('#analysis_assignment_date').daterangepicker({ singleDatePicker: true, locale: { format: 'YYYY-MM-DD' } });

        });


        
    </script>


@endsection
