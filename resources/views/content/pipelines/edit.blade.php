@extends('layouts/contentNavbarLayout')

@section('title', ' Lead Form')

@section('page-style')
<style>
    .stepper { 
      display:flex; 
      /*gap:6px; 
      align-items:center; 
      flex-wrap:nowrap; */
    }
    .step-container{
      display: flex;
      width: 100%;
      /*gap: 15px;*/
      padding: 0;
      align-items: center;
      justify-content: center;
      background:#e7e9ed;
    }
    .step {
      position:relative;
      padding:8px 14px;
      /*background:#f1f1f1;*/
      border-radius:6px;
      font-weight:500;
      white-space:nowrap;
      cursor:pointer;
      width: 100%;
    }
    .step-container .step{
      width: 100%;
      font-size: 13px;
      border-radius: 0;
      padding: 7px 8px 7px 26px;
      position: relative;
    }
    /* Arrow shape */
    .step-container .step::after, .first-step::after {
      content: "";
      position: absolute;
      top: 16px;
      right: -13px;
      width: 6px;
      height: 6px;
      border-top: 2px solid #fff;
      border-right: 2px solid #fff;
      transform: translateY(-50%) rotate(45deg);
      pointer-events: none;
      width: 24px;
      height: 23px;
    }
    .previous-active::after {
      content: "";
      position: absolute;
      top: 50%;
      right: -14px;
      width: 6px;
      height: 6px;
      border-top: 2px solid #E6FAFF;
      border-right: 2px solid #E6FAFF;
      transform: translateY(-50%) rotate(45deg);
      pointer-events: none;
      width: 25px;
      height: 23px;
      background: #E7E9ED;
      z-index: 1;
    }
    /*.step-container:first-child.step::before {
      content: "";
      position: absolute;
      top: 50%;
      right: -14px;
      width: 6px;
      height: 6px;
      border-top: 2px solid #E6FAFF;
      border-right: 2px solid #E6FAFF;
      transform: translateY(-50%) rotate(45deg);
      pointer-events: none;
      width: 25px;
      height: 24px;
      background: #E7E9ED;
      z-index: 1;
    }*/
    /* Active step arrow */
    .step-container .step.active::after {
      border-top: 2px solid #696cff;
      border-right: 2px solid #696cff;
      background: #FFFFFF;
background: linear-gradient(45deg, rgba(255, 255, 255, 0) 50%, rgba(105, 108, 255, 0.16) 0%);
      z-index: 111;
    }

    .step-container .step:last-child{
      border-radius: 6px;
    }
    .step-container .step:last-child::after {
      display: none;
    }
    .step.active{ 
      background:rgb(105, 108, 255, 0.16);
      color:#696cff; 
      border:1px solid #696cff; 
      border-right:0px;
    }
    /*.hidden-step{ visibility: hidden; display:block !important; }*/
    .hidden-step{ 
      display: none !important;
    }
    /* small visual for the dropdown buttons so they look like steps */
    .first-step .step, .last-step .step {
      display: flex;
      padding: 5px 27px 9px;
      align-items: center;
      justify-content: center;
      border: 0px;
      border-radius: 6px 0px 0px 6px ;
      background-color: #e7e9ed;
    }
    .first-step .step{
      border-radius: 6px 0px 0px 6px ;
    }
    .last-step .step {
      display: flex;
      
      align-items: center;
      justify-content: center;
      border: 0px;
      border-radius: 0px 6px 6px 0px ;
    }
    .dropdown-toggle::after { 
      display:none !important; 
    } /* remove bootstrap arrow */
    .dropdown-item{
      font-size: 13px;
    }
    .dropdown-item:active{
      background-color: #e6faff ;
      color: #0dcaf0;
    }
  </style>
@endsection

@section('content')
    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('pipelines.index') }}">Pipelines </a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pipeline</li>
        </ol>
    </nav>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-5">
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Pipeline Form </h5>

                    
                </div>
                <div class="card-body mt-4">
                    <div class="container mb-3">
                        <div class="stepper" id="stepper">
                            <!-- first placeholder (left) -->
                            <div class="first-step dropdown hidden-step">
                            <button class="step dropdown-toggle" type="button" data-bs-toggle="dropdown">...</button>
                            <ul class="dropdown-menu"></ul>
                            </div>
                            <div class="step-container">
                                <!-- real steps (these remain in DOM in order) -->
                                <div class="step {{ $lead->status == 'Initial Contact/Qualification' ? 'active' : '' }} save-lead" data-status="Initial Contact/Qualification">Initial Contact/Qualification</div>
                                <div class="step {{ $lead->status == 'Needs Analysis/Discovery' ? 'active' : '' }} save-lead" data-status="Needs Analysis/Discovery">Needs Analysis/Discovery</div>
                                <div class="step {{ $lead->status == 'Solution Presentation/Demonstration' ? 'active' : '' }} save-lead" data-status="Solution Presentation/Demonstration">Solution Presentation/Demonstration</div>
                                <div class="step {{ $lead->status == 'Proposal Development' ? 'active' : '' }} save-lead" data-status="Proposal Development">Proposal Development</div>
                                <div class="step {{ $lead->status == 'Negotiation and Objections Handling' ? 'active' : '' }} save-lead" data-status="Negotiation and Objections Handling">Negotiation and Objections Handling</div>
                                <div class="step {{ $lead->status == 'Contract Review and Approval' ? 'active' : '' }} save-lead" data-status="Contract Review and Approval">Contract Review and Approval</div>
                                <div class="step {{ $lead->status == 'Closing' ? 'active' : '' }} save-lead" data-status="Closing">Closing</div>
                                <div class="step {{ $lead->status == 'Implementation Handover' ? 'active' : '' }} save-lead" data-status="Implementation Handover">Implementation Handover</div>
                                <div class="step {{ $lead->status == 'Cold' ? 'active' : '' }} save-lead" data-status="Cold">Cold</div>
                                <div class="step {{ $lead->status == 'lost' ? 'active' : '' }} save-lead" data-status="lost">Lost</div>
                            </div>
                            <!-- last placeholder (right) -->
                            <div class="last-step dropdown">
                            <button class="step dropdown-toggle" type="button" data-bs-toggle="dropdown">...</button>
                            <ul class="dropdown-menu"></ul>
                            </div>
                        </div>
                    </div>

                    <form id="lead-form" action="{{ route('pipelines.update', $lead->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="company_name" class="col-sm-4 col-form-label">Company Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ (isset($lead->company_name) && !empty($lead->company_name)) ? $lead->company_name : '' }}"
                                            placeholder="e.g. Brandon Freeman" />
                                    </div>
                                </div>



                                <div class="mb-2 row align-items-center">
                                    <label for="street" class="col-sm-4 col-form-label">Address <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="street" value="{{ (isset($lead->street) && !empty($lead->street)) ? $lead->street : '' }}" class="form-control" id="street"
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
                                        <input type="text" name="city" value="{{ (isset($lead->city) && !empty($lead->city)) ? $lead->city : '' }}" id="city" class="form-control" placeholder="City" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                         <select name="state" id="state" class="form-control">
                                            @if($lead->state_id !== null)
                                            <option value="{{ $lead->state_id }}" selected>
                                                    {{ $lead->state?->name }}
                                                </option>
                                            @endif
                                         </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="zip" value="{{ (isset($lead->zip) && !empty($lead->zip)) ? $lead->zip : '' }}" id="zip" class="form-control" placeholder="ZIP" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                         <select name="country" id="country" class="form-control">
                                            <option value="" disabled>Country</option>
                                            @if($lead->country_id !== null)
                                                <option value="{{ $lead->country_id }}" selected>
                                                    {{ $lead->country?->name }}
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="website" class="col-sm-4 col-form-label">Website</label>
                                    <div class="col-sm-8">
                                        <input name="website" value="{{ (isset($lead->website) && !empty($lead->website)) ? $lead->website : '' }}" type="text" class="form-control" id="website"
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
                                        <input type="text" name="contact_name" value="{{ (isset($lead->contact_name) && !empty($lead->contact_name)) ? $lead->contact_name : '' }}" id="contact_name" class="form-control" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Email <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" value="{{ (isset($lead->email) && !empty($lead->email)) ? $lead->email : '' }}" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="job_position" class="col-sm-4 col-form-label">Job Position <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="job_position" value="{{ (isset($lead->job_position) && !empty($lead->job_position)) ? $lead->job_position : '' }}" class="form-control" id="job_position"
                                            placeholder="e.g. Sales Director" />
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" value="{{ (isset($lead->phone) && !empty($lead->phone)) ? $lead->phone : '' }}" class="form-control" id="phone" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="mobile" class="col-sm-4 col-form-label">Mobile <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="mobile" value="{{ (isset($lead->mobile) && !empty($lead->mobile)) ? $lead->mobile : '' }}" class="form-control" id="mobile" />
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center">
                                    <label for="tags" class="col-sm-4 col-form-label">Tags</label>
                                    <div class="col-sm-8">
                                        <select name="tags[]" id="tags" class="form-control select2" multiple>
                                            @if($tags->count() >= 0)
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $lead->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="customer" class="col-sm-4 col-form-label">Customer</label>
                                    <div class="col-sm-8">
                                        <select name="customer" id="customer" class="form-control">
                                            <option value="" selected disabled>Select Customer</option>
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
                                        <textarea class="form-control" name="internal_notes" id="" cols="30" rows="10"> {{ (isset($lead->internal_notes) && !empty($lead->internal_notes)) ? $lead->internal_notes : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="card mb-6">
                                    <div class="nav-align-top">
                                        <!-- Nav Tabs -->
                                        <div class="tab-wrapper" id="baseTabsWrapper">
                                        <ul class="nav nav-tabs" id="formTabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="lead-extra-info-tab" data-bs-toggle="tab"
                                                data-tab-target="#lead-extra-info"
                                                    {{-- data-bs-target="#lead-extra-info" --}}
                                                    type="button" role="tab" aria-controls="lead-extra-info"
                                                    aria-selected="true">
                                                    Extra Info
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="lead-lead-tab" data-bs-toggle="tab"
                                                data-tab-target="#leads-lead"
                                                    {{-- data-bs-target="#leads-lead" --}}
                                                     type="button" role="tab"
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
                                                            <div class="mb-2 row">
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
                                                            </div>
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
                           
                        </div>


                        <div class="mt-4 d-flex justify-content-between">
                            <!-- Left side -->
                            <button type="submit" id="submit" class="btn btn-primary save-lead" data-status="lead">Save</button>

                            <!-- Right side -->
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                @if($lead->status !== 'opportunity' && $lead->status !== 'lost')
                                {{-- <button id="convertBtn" type="button" class="btn btn-primary save-lead" data-status="opportunity">Convert to Opportunity</button> --}}
                                {{-- <button id="lostBtn" type="button" class="btn btn-primary save-lead" data-status="lost">Lost</button> --}}
                                @endif
                                <button id="nextStageBtn" type="button" class="btn btn-primary" data-lead-id="{{ $lead->id }}">Move to Next Stage</button>
                                <button id="messagesBtn" type="button" class="btn btn-primary" data-lead-id="{{ $lead->id }}">Notes</button>

                                <!-- Dropdown for extra options -->
                                    {{-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" id="messagesBtn" href="javascript:void(0);" data-lead-id="{{ $lead->id }}">Notes</a></li>
                                        
                                    </ul> --}}
                            </div>
                        </div>

                    </form>
                </div>

                


            </div>
            <div class="card">
                <div class="card-header">
                    Activities
                </div>
                <div class="card-body">
                   <div id="activitiesCardList" class="p-3 bg-light rounded-3" style="max-height:400px; overflow-y:auto;">
                    <!-- Activities will be shown here also -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Messages Modal -->
<div class="modal fade" id="messagesModal" tabindex="-1" aria-labelledby="messagesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg rounded-4 border-0">
      <div class="modal-header">
        <h5 class="modal-title" id="messagesModalLabel">Lead Notes/ Activities</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <!-- Tabs -->
        <div class="tab-wrapper" id="modalTabsWrapper">
        <ul class="nav nav-tabs" id="messageTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="notes-tab" data-tab-target="#modal-notes" type="button" role="tab">Internal Notes</button>
          </li>
          {{-- <li class="nav-item" role="presentation">
            <button class="nav-link" id="activities-tab" data-tab-target="#modal-activities" type="button" role="tab">Activities</button>
          </li> --}}
        </ul>

        <div class="tab-content mt-3">
          <!-- Notes Section -->
          <div class="tab-pane fade show active" id="modal-notes" role="tabpanel">
            <form  id="notesForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-3"><div id="noteStatusGroup"></div></div>
              <div class="mb-3">
                <label class="form-label">Add Note</label>
                <textarea class="form-control rounded-3" name="note" id="noteText" rows="4" placeholder="Write something..."></textarea>
              </div>

              <!-- Attachment Upload -->
              <div class="mb-3">
                <label class="form-label">Attachment</label>
                 <div class="mb-3">
                <div id="uploadArea" class="border rounded p-3 text-center" style="cursor:pointer;">
                  <i class="bi bi-paperclip"></i> Click or drop file here
                  <input type="file" name="attachment" id="attachmentInput" class="d-none">
                </div>
                <div id="uploadFilename" class="small text-muted mt-2"></div>
              </div>
              </div>

              <button type="submit" class="btn btn-primary save-note">Save Note</button>
            </form>
          </div>

          <!-- Activities Section -->
          <div class="tab-pane fade" id="modal-activities" role="tabpanel">
            <div class="p-3 bg-light rounded-3" id="activitiesList" style="max-height: 400px; overflow-y:auto;">
              <!-- Example Chat Log -->
            
              <!-- More logs will be appended dynamically -->
            </div>
          </div>
        </div>
        </div>
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

            // let editsavedCountryId = "{{ $lead->country_id }}";
            // let editsavedCountryName = "{{ $lead->country?->name }}";
            // let editsavedStateId = "{{ $lead->state_id }}";
            // let editsavedStateName = "{{ $lead->state?->name }}";
            // // Country pre-select
            // if (editsavedCountryId) {
            //     let editcountryOption = new Option(editsavedCountryName, editsavedCountryId, true, true);
            //     $('#country').append(editcountryOption).trigger('change');
            // }

            // // State pre-select
            // if (editsavedStateId) {
            //     let editstateOption = new Option(editsavedStateName, editsavedStateId, true, true);
            //     $('#state').append(editstateOption).trigger('change');
            // }

             // Event delegation (sab buttons ek hi handler use karenge)
            $(document).on("click", ".save-lead", function(e) {
                e.preventDefault();
                let status = $(this).data("status") || 'lead';

                if (status !== 'lead') {
                    // Agar opportunity ya lost hai to modal open hoga
                    $('#notesForm')[0].reset();
                    $('#uploadFilename').text('');

                    // Radio group set karo
                    $('#noteStatusGroup').html(`
                        <div class="mb-2">
                            <label><input type="radio" name="note_status" value="${status}" checked> ${status.replace(/\b\w/g, c => c.toUpperCase())} Notes</label>
                        </div>
                    `);

                    // Status ko hidden field me bhi daal do (lead submit k waqt use hoga)
                    $('#notesForm').append(`<input type="hidden" id="leadStatusHidden" name="lead_status" value="${status}">`);
                    let messagesModal = new bootstrap.Modal(document.getElementById('messagesModal'));
                    messagesModal.show();
                } else {
                    // Agar sirf Save lead hai
                    saveLead(status);
                }
                
            });

            // Reusable function
            function saveLead(leadStatus = 'lead') {
                let form = $('#lead-form');
                let url = form.attr("action");
                let formData = new FormData(form[0]);

                // status ko directly append kar do
                formData.append('status', leadStatus);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            let msg;
                            if (leadStatus == 'lead') {
                                msg = "Lead Updated successfully!";
                            }else{
                                msg = "Lead Converted to " + leadStatus + ".";
                            }
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


            //  document.querySelector('#lostBtn[href="#"]').addEventListener('click', function(e) {
            //     e.preventDefault();
            //     var myModal = new bootstrap.Modal(document.getElementById('messagesModal'));
            //     myModal.show();
            // });

            // // Attachment input trigger
            // document.querySelector('.border').addEventListener('click', function(){
            //     document.querySelector('#attachmentInput').click();
            // });


            document.querySelectorAll('.tab-wrapper').forEach(wrapper => {
                
                wrapper.addEventListener('click', function (e) {
                    
                    if (e.target.matches('[data-tab-target]')) {
                        let targetId = e.target.getAttribute('data-tab-target');
                        let tabContent = wrapper.querySelector('.tab-content');
                        console.log(targetId);
                        console.log(tabContent);
                        console.log(wrapper);
                        // Remove active classes
                        wrapper.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                        tabContent.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active', 'show'));

                        // Add active classes to clicked + target
                        e.target.classList.add('active');
                        let targetPane = tabContent.querySelector(targetId);
                        if (targetPane) {
                            targetPane.classList.add('active', 'show');
                        }
                    }
                });
            });

            // jab modal open ho
            document.getElementById('messagesModal').addEventListener('shown.bs.modal', function () {
                let modalWrapper = document.querySelector('#messagesModal .tab-wrapper');
                if (modalWrapper) {
                    // sab inactive karo
                    modalWrapper.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                    modalWrapper.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active', 'show'));

                    // pehla tab active karo
                    let firstTabBtn = modalWrapper.querySelector('.nav-link');
                    let firstPaneId = firstTabBtn.getAttribute('data-tab-target');
                    firstTabBtn.classList.add('active');
                    modalWrapper.querySelector(firstPaneId).classList.add('active', 'show');
                }
            });

            // jab modal close ho
            document.getElementById('messagesModal').addEventListener('hidden.bs.modal', function () {
                let baseWrapper = document.querySelector('#baseTabsWrapper'); // aapke base form ka wrapper id
                if (baseWrapper) {
                    // sab inactive karo
                    baseWrapper.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                    baseWrapper.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active', 'show'));

                    // lead-extra-info-tab active karo
                    let leadTabBtn = document.getElementById('lead-extra-info-tab');
                    let leadPaneId = leadTabBtn.getAttribute('data-tab-target');
                    leadTabBtn.classList.add('active');
                    baseWrapper.querySelector(leadPaneId).classList.add('active', 'show');
                }
            });



            let leadId = $('#messagesBtn').data('lead-id'); // ya hidden input se lo
          
            if (leadId) {
                loadActivities(leadId); // Page load pe bhi call karo
            }

            let messagesModal = new bootstrap.Modal(document.getElementById('messagesModal'));
            // let leadId = null;

            // open modal
            $('#messagesBtn').on('click', function(){
                leadId = $(this).data('lead-id');
                if (!leadId) return alert('Lead id missing');
                $('#notesForm')[0].reset();
                $('#uploadFilename').text('');
                // loadActivities(leadId);
                messagesModal.show();
            });

            // upload area click
            document.querySelector('#uploadArea').addEventListener('click', function(){
                document.querySelector('#attachmentInput').click();
            });
            document.querySelector('#attachmentInput').addEventListener('change', function(){
                const f = this.files[0];
                document.querySelector('#uploadFilename').textContent = f 
                    ? `${f.name} (${Math.round(f.size / 1024)} KB)` 
                    : '';
            });

            // save note
            $('#notesForm').on('submit', function(e){
                e.preventDefault();
                if (!leadId) return  showToast("Lead id missing", "Error", "danger");;

                let form = new FormData(this);

                let leadStatus = $('#leadStatusHidden').val() || 'lead';
                form.append('status', leadStatus);
                // append CSRF if needed (Laravel usually sets header)
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

                $.ajax({
                url: "{{ route('leads.store-notes', $lead->id) }}",
                method: 'POST',
                data: form,
                processData: false,
                contentType: false,
                success: function(res){
                    $('#noteText').val('');
                    $('#attachmentInput').val('');
                    $('#uploadFilename').text('');
                    // prepend the new activity to activities list
                    prependActivity(res.activity);
                    // switch to Activities tab
                    // $('[data-tab-target="#modal-activities"]').tab('show');

                    setTimeout(function () {
                        messagesModal.hide(); // modal ka id yahaan adjust karo

                         // Agar opportunity ya lost hai to redirect bhi karna hai
                        if (leadStatus === 'opportunity' || leadStatus === 'lost') {
                            saveLead(leadStatus); 
                        }else{
                            showToast(res.message, "Success", "primary");
                            setTimeout(function () {
                                location.reload();
                            } , 1000);
                        }
                    }, 1000);
                },
                error: function(xhr){
                    alert('Error: ' + (xhr.responseJSON?.message || 'Could not save note.'));
                }
                });
            });

             function loadActivities(leadId) {
                $('#activitiesCardList').html('<div class="text-center text-muted">Loading…</div>');

                $.get("{{ route('leads.activities', $lead->id) }}", function(data) {
                   $('#activitiesCardList').empty();

                    if (!data.length) {
                        $('#activitiesCardList').html('<div class="text-muted">No activities yet.</div>');
                        return;
                    }

                    data.forEach(group => {
                        // Date separator
                        const separator = `
                            <div class="activity-group mb-3" data-date="${group.date_key}">
                                <div class="text-center my-3 activity-date">
                                    <hr class="mt-0 mb-2">
                                    <small><b>${group.date_label}</b></small>
                                    <hr class="mt-2 mb-0">
                                </div>
                                <div class="activity-items"></div>
                            </div>
                        `;
                        $('#activitiesCardList').append(separator);

                        // Sort activities (newest first)
                        const sortedActivities = group.activities.sort((a, b) => {
                            return new Date(b.created_at) - new Date(a.created_at);
                        });

                        // Render each activity
                        sortedActivities.forEach(act => {
                            const userName = act.user?.name || 'System';
                            const initial = userName.charAt(0).toUpperCase();
                            const attachmentHtml = act.meta?.attachment
                                ? `<div class="mt-2"><a href="${act.meta.attachment}" target="_blank">Attachment</a></div>`
                                : '';

                            const html = `
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                                        ${initial}
                                    </div>
                                </div>
                                <div class="ms-3 w-100">
                                    <div class="bg-white p-3 rounded shadow-sm">
                                        <div class="d-flex justify-content-between">
                                            <strong>${escapeHtml(userName)}</strong>
                                            <small class="text-muted">${escapeHtml(act.time_label)}</small>
                                        </div>
                                        <div class="mt-1">${escapeHtml(act.details || '')}</div>
                                        ${attachmentHtml}
                                    </div>
                                </div>
                            </div>
                            `;

                            // Append to this group's container
                            $(`#activitiesCardList .activity-group[data-date="${group.date_key}"] .activity-items`).append(html);
                        });
                    });
                });
            }


            function prependActivity(act) {
                const userName = act.user?.name || 'You';
                const initial = userName.charAt(0).toUpperCase();
                const timeLabel = act.diff_for_human || act.created_at;
                const activityDate = act.created_at.split(' ')[0]; // YYYY-MM-DD

                let attachmentHtml = '';
                if (act.meta?.attachment) {
                    attachmentHtml = `<div class="mt-2"><a href="${act.meta.attachment}" target="_blank">Attachment</a></div>`;
                }

                const html = `
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                            ${initial}
                        </div>
                    </div>
                    <div class="ms-3 w-100">
                        <div class="bg-white p-3 rounded shadow-sm">
                            <div class="d-flex justify-content-between">
                                <strong>${escapeHtml(userName)}</strong>
                                <small class="text-muted">${escapeHtml(timeLabel)}</small>
                            </div>
                            <div class="mt-1">${escapeHtml(act.details || '')}</div>
                            ${attachmentHtml}
                        </div>
                    </div>
                </div>
                `;

                // Make sure that day's group exists (or create it)
                ensureDateSeparator(activityDate, true);

                // If group already exists, prepend inside its .activity-items
                const $group = $(`#activitiesCardList .activity-group[data-date="${activityDate}"] .activity-items`);
                if ($group.length) {
                    $group.prepend(html);
                }
            }
            function ensureDateSeparator(dateKey, prepend = false) {
                if (!$(`#activitiesCardList .activity-group[data-date="${dateKey}"]`).length) {
                    const dateLabel = moment(dateKey).format('MMMM D, YYYY'); // e.g. September 10, 2025
                    const separator = `
                        <div class="activity-group mb-3" data-date="${dateKey}">
                            <div class="text-center my-3 activity-date" data-date="${dateKey}">
                                <hr class="mt-0 mb-2">
                                <small><b>${dateLabel}</b></small>
                                <hr class="mt-2 mb-0">
                            </div>
                            <div class="activity-items"></div>
                        </div>
                    `;
                    if (prepend) {
                        $('#activitiesCardList').prepend(separator);
                    } else {
                        $('#activitiesCardList').append(separator);
                    }
                }
            }
            // simple html escaper
            function escapeHtml(unsafe) {
                if (!unsafe) return '';
                return String(unsafe)
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
            }

        });



            // stages script

        document.addEventListener("DOMContentLoaded", function () {
            const stepper = document.getElementById("stepper");
            const firstPlaceholder = stepper.querySelector(".first-step");
            const lastPlaceholder = stepper.querySelector(".last-step");
            const firstMenu = firstPlaceholder.querySelector(".dropdown-menu");
            const lastMenu = lastPlaceholder.querySelector(".dropdown-menu");

            let steps = Array.from(stepper.querySelectorAll(".step"))
                .filter(el => !el.classList.contains("dropdown-toggle") &&
                            !el.closest(".first-step") &&
                            !el.closest(".last-step"));

            const n = steps.length;
            let visibleStart = 0;
            let visibleCount = 4;

            function clampStart() {
                if (visibleStart < 0) visibleStart = 0;
                if (visibleStart > Math.max(0, n - visibleCount)) {
                    visibleStart = Math.max(0, n - visibleCount);
                }
            }

            function render() {
                clampStart();
                firstMenu.innerHTML = "";
                lastMenu.innerHTML = "";

                const visibleEnd = visibleStart + visibleCount - 1;

                steps.forEach((step, idx) => {
                    if (idx < visibleStart || idx > visibleEnd) {
                        step.classList.add("hidden-step");
                    } else {
                        step.classList.remove("hidden-step");
                    }
                });

                const leftHidden = steps.slice(0, visibleStart);
                leftHidden.forEach(s => {
                    const li = document.createElement("li");
                    const a = document.createElement("a");
                    a.className = "dropdown-item";
                    a.href = "#";
                    a.dataset.index = steps.indexOf(s);
                    a.textContent = s.textContent;
                    li.appendChild(a);
                    firstMenu.appendChild(li);
                });

                const rightHidden = steps.slice(visibleEnd + 1);
                rightHidden.forEach(s => {
                    const li = document.createElement("li");
                    const a = document.createElement("a");
                    a.className = "dropdown-item";
                    a.href = "#";
                    a.dataset.index = steps.indexOf(s);
                    a.textContent = s.textContent;
                    li.appendChild(a);
                    lastMenu.appendChild(li);
                });

                firstPlaceholder.classList.toggle("hidden-step", leftHidden.length === 0);
                lastPlaceholder.classList.toggle("hidden-step", rightHidden.length === 0);
            }

            // Highlight active + previous
            function updateSteps(activeIndex) {
                steps.forEach(s => s.classList.remove("active", "previous-active"));
                firstPlaceholder.classList.remove("previous-active");

                steps[activeIndex].classList.add("active");

                if (activeIndex > 0) {
                const prevStep = steps[activeIndex - 1];
                if (prevStep.classList.contains("hidden-step")) {
                    firstPlaceholder.classList.add("previous-active");
                } else {
                    prevStep.classList.add("previous-active");
                }
                }
            }

           // Initial render
            const initialActive = steps.findIndex(s => s.classList.contains("active"));
            if (initialActive >= 0) {
                // ensure active step is visible on load
                visibleStart = Math.max(0, initialActive - Math.floor(visibleCount / 2));
                render();
                updateSteps(initialActive);
            } else {
                // no active -> just normal render
                render();
            }
            // Clicking a visible step
            stepper.addEventListener("click", function (e) {
                const btn = e.target.closest(".step");
                if (!btn || btn.classList.contains("dropdown-toggle")) return;

                const idx = steps.indexOf(btn);
                if (idx !== -1) {
                updateSteps(idx);
                }
            });


                // Dropdown click handling
            stepper.addEventListener("click", function (e) {
                const a = e.target.closest(".dropdown-item");
                if (!a) return;
                e.preventDefault();

                const idx = parseInt(a.dataset.index, 10);
                if (isNaN(idx)) return;

                if (a.closest(".last-step")) {
                // show [idx-2, idx, idx+1]
                visibleStart = Math.max(0, idx - 2);
                visibleCount = 4;
                } else if (a.closest(".first-step")) {
                // show this step + one before it
                visibleStart = Math.max(0, idx - 1);
                visibleCount = 4;
                }

                render();
                updateSteps(idx);
            });

        });


            // endstages script
</script>


@endsection
