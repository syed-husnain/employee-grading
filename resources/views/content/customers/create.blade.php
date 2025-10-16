@extends('layouts/contentNavbarLayout')

@section('title', ' Organization Form')

@section('content')
    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('organizations.index') }}">Organizations </a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Organization</li>
        </ol>
    </nav>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-12">
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Organization Form</h5>
                    <small class="text-body float-end">Switch between Sole Proprietor and Company</small>
                </div>
                <div class="card-body mt-4">
                    <!-- Radio Buttons -->
                    

                    <form id="customer-form" action="{{ route('organizations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 d-flex align-items-center">
                            <label class="me-3">Organization Type:</label>
                            <label class="me-3">
                                <input type="radio" name="customer_type" value="individual"> Sole Proprietor
                            </label>
                            <label>
                                <input type="radio" name="customer_type" value="company" checked> Company
                            </label>
                        </div>
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="full_name" class="col-sm-4 col-form-label">Full Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="full_name" id="full_name"
                                            placeholder="e.g. Brandon Freeman" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center company-field d-none">
                                    <label for="company_name" class="col-sm-4 col-form-label">Company Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="company_name" class="form-control" id="company_name"
                                            placeholder="e.g. Lumber Inc" />
                                    </div>
                                </div>

                                {{-- <div class="mb-2 row align-items-center">
                                    <label for="arabic_name" class="col-sm-4 col-form-label">Arabic Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="arabic_name"
                                            placeholder="Arabic Name" />
                                    </div>
                                </div> --}}

                                <div class="mb-2 row align-items-center">
                                    <label for="contact" class="col-sm-4 col-form-label">Contact</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="street" class="form-control" id="contact" placeholder="Street..." />
                                    </div>
                                </div>

                                {{-- <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="street2" class="form-control" placeholder="Street 2..." />
                                    </div>
                                </div> --}}

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="city" class="form-control" placeholder="City" />
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
                                        <input type="text" name="zip" class="form-control" placeholder="ZIP" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <select name="country" id="country" class="form-control">
                                            <option value="" selected disabled>Country</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="tax_id" class="col-sm-4 col-form-label">Tax ID</label>
                                    <div class="col-sm-8">
                                        <input name="tax_id" type="text" class="form-control" id="tax_id"
                                            placeholder="e.g. BE0477472701" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Customer Rank</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="customer_rank" class="form-control" value="0" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">SAP Customer ID</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="sap_customer_id" class="form-control" value="0" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Supplier Rank</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="supplier_rank" class="form-control" value="0" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Commercial Registration</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="commercial_registration" class="form-control" value="0" />
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center individual-field">
                                    <label for="job_position" class="col-sm-4 col-form-label">Job Position</label>
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
                                    <label for="mobile" class="col-sm-4 col-form-label">Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="mobile" class="form-control" id="mobile" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="email" class="col-sm-4 col-form-label">Email <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" id="email" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="website" class="col-sm-4 col-form-label">Website</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="website" class="form-control" id="website"
                                            placeholder="e.g. https://www.odoo.com" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center individual-field">
                                    <label for="title" class="col-sm-4 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                        <select name="title" id="title" class="form-control select2">
                                            @if($titles->count() >= 0)
                                                @foreach ($titles as $title)
                                                    <option value="{{ $title->id }}">{{ $title->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="mb-2 row align-items-center">
                                    <label for="language" class="col-sm-4 col-form-label">Language</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="language" class="form-control" id="language"
                                            value="English (US)" />
                                    </div>
                                </div> --}}

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

                                <div class="mb-2 row align-items-center">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input class="form-check-input" name="is_customer" type="checkbox" id="is_customer">
                                            <label class="form-check-label" for="is_customer">Is Customer</label>
                                        </div>
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
                                                <button class="nav-link active" id="contact-addresses-tab"
                                                    data-bs-toggle="tab" data-bs-target="#contact-addresses"
                                                    type="button" role="tab" aria-controls="contact-addresses"
                                                    aria-selected="true">
                                                    Contact & Addresses
                                                </button>
                                            </li>
                                            {{-- <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sales-purchases-tab" data-bs-toggle="tab"
                                                    data-bs-target="#sales-purchases" type="button" role="tab"
                                                    aria-controls="sales-purchases" aria-selected="false">
                                                    Sales & Purchases
                                                </button>
                                            </li> --}}
                                        </ul>

                                        <!-- Tab Content -->
                                        <div class="tab-content mt-3" id="formTabsContent">
                                            <!-- Tab Content -->
                                            <div class="tab-pane fade show active" id="contact-addresses" role="tabpanel"
                                                aria-labelledby="contact-addresses-tab">
                                                <div class="text-center my-3">
                                                    <button type="button" class="btn btn-primary" id="add-new">+ Add
                                                        New</button>
                                                </div>

                                                <!-- Table -->
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-bordered d-none" id="address-table">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>Type</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th style="width: 150px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Sales & Purchases Tab -->
                                            <div class="tab-pane fade" id="sales-purchases" role="tabpanel"
                                                aria-labelledby="sales-purchases-tab">
                                                <form>
                                                    <div class="row">
                                                        <!-- Left Column -->
                                                        <div class="col-md-6">
                                                            <h5>Sales</h5>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Salesperson?</label>
                                                                <div class="col-sm-7">
                                                                    <select name="salesperson" id="salesperson" class="form-control">
                                                                        <option value="" selected disabled>Sales Person</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Payment
                                                                    Terms?</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="payment_terms" value="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Pricelist?</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="pricelist" value="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Public Pricelist
                                                                    (SAR)</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="public_pricelist" value="" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Right Column -->
                                                        <div class="col-md-6">
                                                            <h5>Purchase</h5>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Buyer</label>
                                                                <div class="col-sm-7">
                                                                    <input name="buyer" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Payment
                                                                    Terms?</label>
                                                                <div class="col-sm-7">
                                                                    <input name="payment_terms" value="" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Receipt
                                                                    Reminder?</label>
                                                                <div class="col-sm-7">
                                                                    <input name="receipt_reminder" value="" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Supplier Currency?</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="supplier_currency" value="" class="form-control">
                                                                </div>
                                                            </div>

                                                            <h5>Fiscal Information</h5>
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Fiscal
                                                                    Position?</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="fiscal_position" value="" class="form-control">
                                                                </div>
                                                            </div>

                                                            <h5>Misc</h5>
                                                            {{-- <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Company ID?</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="company_id" value="" class="form-control">
                                                                </div>
                                                            </div> --}}
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Reference</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="reference" value="" class="form-control">
                                                                </div>
                                                            </div>
                                                            {{-- <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Company</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="company" value="" class="form-control">
                                                                </div>
                                                            </div> --}}
                                                            <div class="mb-2 row">
                                                                <label class="col-sm-5 col-form-label">Website?</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" name="misc_website" value="" class="form-control">
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
                            <!-- Modal -->
                            <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addressModalLabel">Add / Edit Address</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="addressForm">
                                                <input type="hidden" id="editIndex">

                                                <!-- Radio Buttons -->
                                                <div class="mb-3">
                                                    <label class="form-label d-block">Select Address Type:</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input address-type" type="radio"
                                                            name="address_type" value="contact" checked>
                                                        <label class="form-check-label">Contact</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input address-type" type="radio"
                                                            name="address_type" value="invoice">
                                                        <label class="form-check-label">Invoice Address</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input address-type" type="radio"
                                                            name="address_type" value="delivery">
                                                        <label class="form-check-label">Delivery Address</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input address-type" type="radio"
                                                            name="address_type" value="followup">
                                                        <label class="form-check-label">Follow-up Address</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input address-type" type="radio"
                                                            name="address_type" value="other">
                                                        <label class="form-check-label">Other Address</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- Left Column -->
                                                    <div class="col-md-6">
                                                        <div class="mb-2 row align-items-center">
                                                            <label for="full_name"
                                                                class="col-sm-4 col-form-label">Name</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    id="address_name" name="address_name"
                                                                    placeholder="e.g. Brandon Freeman" />
                                                            </div>
                                                        </div>
                                                        <!-- Contact Fields -->
                                                        <div class="contact-fields">
                                                            <div class="mb-2 row align-items-center">
                                                                <label for="adress_title"
                                                                    class="col-sm-4 col-form-label">Title</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="adress_title" name="address_title"
                                                                        placeholder="e.g. Lumber Inc" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row align-items-center">
                                                                <label for="adress_job_position"
                                                                    class="col-sm-4 col-form-label">Job Position</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="adress_job_position"
                                                                        name="adress_job_position"
                                                                        placeholder="e.g. Lumber Inc" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Address Fields -->
                                                        <div class="address-fields d-none">
                                                            <div class="mb-2 row align-items-center">
                                                                <label for="address_street"
                                                                    class="col-sm-4 col-form-label">Address</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="address_street" name="address_street"
                                                                        placeholder="Street" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row align-items-center">
                                                                <label for="address_city"
                                                                    class="col-sm-4 col-form-label"></label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control"
                                                                        id="address_city" name="address_city"
                                                                        placeholder="City" />
                                                                </div>
                                                                <div class="col-sm-4">
                                                                
                                                                         <select name="address_state" id="address_state" class="form-control">
                                                                            <option value="" selected disabled>State</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row align-items-center">
                                                                <label for="address_zip"
                                                                    class="col-sm-4 col-form-label"></label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control"
                                                                        id="address_zip" name="address_zip"
                                                                        placeholder="Zip Code" />
                                                                </div>
                                                                <div class="col-sm-4">
                                                                   
                                                                        <select name="address_country" id="address_country" class="form-control">
                                                                            <option value="" selected disabled>Country</option>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Right Column -->
                                                    <div class="col-md-6">
                                                        <div class="mb-2 row align-items-center individual-field">
                                                            <label for="address_email"
                                                                class="col-sm-4 col-form-label">Email</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    id="address_email" name="address_email"
                                                                    placeholder="e.g. abc@example.com" />
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row align-items-center">
                                                            <label for="address_phone"
                                                                class="col-sm-4 col-form-label">Phone</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    id="address_phone" name="address_phone" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row align-items-center">
                                                            <label for="address_mobile"
                                                                class="col-sm-4 col-form-label">Mobile</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    id="address_mobile" name="address_mobile" />
                                                            </div>
                                                        </div>


                                                    </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer mt-2">
                                            <button type="button" class="btn btn-label-secondary" id="saveClose">Save &
                                                Close</button>
                                            <button type="button" class="btn btn-primary" id="saveAddMore">Save & Add
                                                More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt-4">
                            <button type="submit" id="submit" class="btn btn-primary">Save</button>
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
            function toggleFields() {
                var type = $('input[name="customer_type"]:checked').val();
                if (type === 'individual') {
                    $('.company-field').addClass('d-none');
                    $('.individual-field').removeClass('d-none');
                    $('.main-label').text('Full Name');
                    $('.address-label').text('Contact');
                } else {
                    $('.company-field').removeClass('d-none');
                    $('.individual-field').addClass('d-none');
                    $('.main-label').text('Company Name');
                    $('.address-label').text('Address');
                }
            }

            $('input[name="customer_type"]').on('change', toggleFields);
            toggleFields();


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


             // submit user form
            $('#submit').click(function(e) {
                e.preventDefault(); // precautionary

                let form = $('#customer-form');
                let url = form.attr("action");
                let formData = new FormData(form[0]);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            showToast("Organization created successfully!", "Success", "primary");
                            setTimeout(() => {
                                window.location.href = response.redirect_url;
                            }, 
                            3000);
                            
                        }else{
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

            // ----------------------
            // Normal form fields
            // ----------------------
            initSelect2Country('#country');  
            initSelect2State('#state', '#country');  
            initSelect2SalePersons('#salesperson');

            // ----------------------
            // Modal fields
            // ----------------------
            initSelect2Country('#address_country', '#addressModal');  
            initSelect2State('#address_state', '#address_country', '#addressModal');


           $('#title').select2({
                placeholder: "Select or add a title",
                tags: true,
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    // check if already exists
                    var exists = false;
                    $('#title option').each(function() {
                        if ($.trim($(this).text()).toLowerCase() === term.toLowerCase()) {
                            exists = true;
                            return false;
                        }
                    });

                    if (exists) {
                        return null; // do not create duplicate
                    }

                    return {
                        id: term,
                        text: term,
                        newOption: true
                    };
                },
                templateResult: function (data) {
                    var $result = $("<span></span>").text(data.text);
                    if (data.newOption) {
                        $result.append(" <em>(new)</em>");
                    }
                    return $result;
                }
            });

            // ✅ persist & always keep latest selected
            $('#title').on('select2:select', function (e) {
                var data = e.params.data;

                // agar new option hai
                if (data.newOption) {
                    // forcefully option <select> me add
                    if (!$('#title option[value="' + data.id + '"]').length) {
                        $('#title').append(new Option(data.text, data.id, true, true));
                    }
                }

                
                $('#title').val(data.id).trigger('change.select2');
            });





            // For Tags (multiple select with new option allowed)
            $('#tags').select2({
                placeholder: "Select or add tags",
                tags: true,
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    // check if already exists
                    var exists = false;
                    $('#tags option').each(function() {
                        if ($.trim($(this).text()).toLowerCase() === term.toLowerCase()) {
                            exists = true;
                            return false;
                        }
                    });

                    if (exists) {
                        return null; // skip duplicate
                    }

                    return {
                        id: term,
                        text: term,
                        newOption: true
                    };
                },
                templateResult: function (data) {
                    var $result = $("<span></span>").text(data.text);
                    if (data.newOption) {
                        $result.append(" <em>(new)</em>");
                    }
                    return $result;
                }
            });

        });


        $(function() {
            let addresses = [];
            let modal = new bootstrap.Modal(document.getElementById("addressModal"));

            // Toggle fields based on radio
            $(document).on("change", ".address-type", function() {
                if ($(this).val() === "contact") {
                    $(".contact-fields").show();
                    $(".address-fields").addClass("d-none");
                } else {
                    $(".contact-fields").hide();
                    $(".address-fields").removeClass("d-none");
                }
            }).trigger("change");

            // Add New button
            $("#add-new").click(function() {
                let form = $("#addressModal").find("form")[0]; // modal ke andar ka form lo
                if (form) {
                    form.reset(); // properly reset hoga
                }
                $("#editIndex").val("");
                $(".address-type[value='contact']").prop("checked", true).trigger("change");
                modal.show();
            });

            // Save Data Function
            function saveData(closeModal) {

                let form = $("#addressModal").find("form"); // modal ke andar ka form lo
                let formData = {};

                form.serializeArray().forEach(function(item) {
                    console.log(item);
                    formData[item.name] = item.value;
                });

                console.log("Form Data:", formData);

                let editIndex = $("#editIndex").val();
                if (editIndex !== "") {
                    addresses[editIndex] = formData;
                } else {
                    addresses.push(formData);
                }

                console.log("Addresses:", addresses);
                console.log("editIndex:", editIndex);

                renderTable();

                if (closeModal) {
                    modal.hide();
                } else {
                    // $("#addressForm")[0].reset();
                    $(".address-type[value='contact']").prop("checked", true).trigger("change");
                }
            }

            // Render Table
            function renderTable() {
                let tbody = $("#address-table tbody");
                tbody.empty();
                addresses.forEach((addr, index) => {
                    tbody.append(`
                        <tr>
                            <td>
                                <input type="hidden" name="customer_address[${index}][address_type]" value="${addr.address_type || ''}">
                                ${addr.address_type || ''}
                            </td>
                            <td>
                                <input type="hidden" name="customer_address[${index}][address_name]" value="${addr.address_name || ''}">
                                ${addr.address_name || ''}
                            </td>
                            <td>
                                <input type="hidden" name="customer_address[${index}][address_email]" value="${addr.address_email || ''}">
                                ${addr.address_email || ''}
                            </td>
                            <td>
                                <input type="hidden" name="customer_address[${index}][address_phone]" value="${addr.address_phone || ''}">
                                ${addr.address_phone || ''}
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning edit-row" data-index="${index}">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger remove-row" data-index="${index}">Remove</button>
                            </td>
                        </tr>
                    `);

                    // Add hidden fields for all other data
                    Object.keys(addr).forEach(key => {
                        if (key !== "address_name" && key !== "address_email" && key !== "address_phone") {
                            tbody.find("tr:last").append(
                                `<input type="hidden" name="customer_address[${index}][${key}]" value="${addr[key]}">`
                            );
                        }
                    });
                });

                $("#address-table").toggleClass("d-none", addresses.length === 0);
            }

            // Save & Close
            $("#saveClose").click(function() {
                saveData(true);
            });
            // Save & Add More
            $("#saveAddMore").click(function() {
                saveData(false);
            });

            // Edit
            $(document).on("click", ".edit-row", function() {
                let index = $(this).data("index");
                let data = addresses[index];
                // console.log("EDIT DATA");
                // console.log(data);
                // $("#addressForm")[0].reset();
                for (let key in data) {
                    if (key === "address_type") continue; 
                    $(`#addressForm [name="${key}"]`).val(data[key]);

                    // console.log($(`#addressForm [name="${key}"]`));
                }
                $(`#addressForm .address-type[value="${data.address_type}"]`).prop("checked", true).trigger(
                    "change");
                $("#editIndex").val(index);
                modal.show();
            });

            // Remove
            $(document).on("click", ".remove-row", function() {
                let index = $(this).data("index");
                addresses.splice(index, 1);
                renderTable();
            });
        });
    </script>


@endsection
