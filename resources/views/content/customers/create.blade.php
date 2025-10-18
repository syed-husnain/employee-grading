@extends('layouts/contentNavbarLayout')

@section('title', ' Organization Form')

@section('page-style')

    <style>
        /* === Wrapper Styles === */
        #FileUpload {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .wrapper {
            margin: 30px;
            padding: 10px;
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
            border-radius: 10px;
            background-color: white;
            width: 415px;
            max-width: 95%;
        }

        /* === Upload Box === */
        .upload {
            margin: 10px;
            height: 85px;
            border: 8px dashed #b6b8ff45;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            text-align: center;
        }

        .upload p {
            margin-top: 12px;
            line-height: 1.2;
            font-size: 18px;
            color: #0c3214;
            letter-spacing: 1px;
        }

        .upload__button {
            background-color: #b6b8ff45;
            border-radius: 10px;
            padding: 0px 8px 0px 10px;
        }

        .upload__button:hover {
            cursor: pointer;
            opacity: 0.8;
        }

        /* === Uploaded Files === */
        .uploaded {
            width: 100%;
            margin: 10px 0;
            background-color: #b6b8ff45;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .file {
            display: flex;
            flex-direction: column;
            flex: 1;
            overflow: hidden;
            /* important */
        }

        .file__name {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            color: #0c3214;
            font-size: 16px;
            letter-spacing: 1px;
            gap: 10px;
        }

        .file__name p {
            margin: 0;
            flex: 1;
            white-space: nowrap;
            /* prevent text wrapping */
            overflow: hidden;
            /* hide overflow */
            text-overflow: ellipsis;
            /* show "..." */
        }

        .fa-times:hover {
            cursor: pointer;
            opacity: 0.8;
        }

        .fa-file-pdf {
            padding: 10px;
            font-size: 35px;
            color: #0c3214;
            flex-shrink: 0;
            /* prevent icon from shrinking */
        }

        /* === Progress Bar === */
        .progress {
            width: 100%;
            height: 8px;
            background-color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar-custom {
            background-color: #6b6eff !important;
        }

        /* === Responsive Design === */
        @media (max-width: 480px) {
            .wrapper {
                width: 95%;
                padding: 8px;
            }

            .file__name {
                font-size: 14px;
            }

            .fa-file-pdf {
                font-size: 28px;
                padding: 8px;
            }

            .upload p {
                font-size: 16px;
            }
        }
    </style>

@endsection
@section('content')
    <!-- Bootstrap Table with Header - Dark -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-analytics') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('employees.index') }}">Employees </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add New Employee</li>
        </ol>
    </nav>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-12">
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Employee Form</h5>

                </div>
                <div class="card-body mt-4">
                    <!-- Radio Buttons -->


                    <form id="customer-form" action="{{ route('employees.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="full_name" class="col-sm-4 col-form-label">Full Name <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="full_name" id="full_name"
                                            placeholder="e.g. Brandon Freeman" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="title" class="col-sm-4 col-form-label">Education</label>
                                    <div class="col-sm-8">
                                        <select name="title" id="title" class="form-control select2">
                                            <option>Select option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="online_certification" class="col-sm-4 col-form-label">Online
                                        Certification</label>
                                    <div class="col-sm-8">
                                        <select name="online_certification" id="online_certification"
                                            class="form-control select2">
                                            <option>Select option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="experience_management" class="col-sm-4 col-form-label">Experience
                                        Management</label>
                                    <div class="col-sm-8">
                                        <select name="experience_management" id="experience_management"
                                            class="form-control select2">
                                            <option>Select option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="english_proficiency" class="col-sm-4 col-form-label">English
                                        Proficiency</label>
                                    <div class="col-sm-8">
                                        <select name="english_proficiency" id="english_proficiency"
                                            class="form-control select2">
                                            <option>Select option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Bonus</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="bonus" class="form-control"
                                            placeholder="Executive Bonus" />
                                    </div>
                                </div>

                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-2 row align-items-center">
                                    <label for="designation" class="col-sm-4 col-form-label">Designation</label>
                                    <div class="col-sm-8">
                                        <select name="designation" id="designation" class="form-control select2">
                                            <option>Select option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="tech_certificate" class="col-sm-4 col-form-label">Tech Certificate</label>
                                    <div class="col-sm-8">
                                        <select name="tech_certificate" id="tech_certificate" class="form-control select2">
                                            <option>Select option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="experience_external" class="col-sm-4 col-form-label">Experience
                                        External</label>
                                    <div class="col-sm-8">
                                        <select name="experience_external" id="experience_external"
                                            class="form-control select2">
                                            <option>Select option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="experience_internal" class="col-sm-4 col-form-label">Experience
                                        Internal</label>
                                    <div class="col-sm-8">
                                        <select name="experience_internal" id="experience_internal"
                                            class="form-control select2">
                                            <option>Select option</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label for="insurance_bracket" class="col-sm-4 col-form-label">Insurance
                                        Bracket</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="insurance_bracket" class="form-control"
                                            id="insurance_bracket" placeholder="Basic" />
                                    </div>
                                </div>

                                <div class="mb-2 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Off Days</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="off_days" class="form-control"
                                            placeholder="Not Eligible" />
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="FileUpload">
                                    <div class="wrapper">
                                        <div class="upload">
                                            <p>Drag files here or <span class="upload__button">Browse</span></p>
                                        </div>
                                        <div class="uploaded uploaded--one">
                                            <i class="far fa-file-pdf"></i>
                                            <div class="file">
                                                <div class="file__name">
                                                    <p>Bachelor-Degree.pdf</p>
                                                    <i class="fas fa-times"></i>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-custom progress-bar-striped progress-bar-animated"
                                                        style="width:100%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uploaded uploaded--two">
                                            <i class="far fa-file-pdf"></i>
                                            <div class="file">
                                                <div class="file__name">
                                                    <p>project management Certification.pdf</p>
                                                    <i class="fas fa-times"></i>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-custom progress-bar-striped progress-bar-animated"
                                                        style="width:80%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uploaded uploaded--three">
                                            <i class="far fa-file-pdf"></i>
                                            <div class="file">
                                                <div class="file__name">
                                                    <p>My-Document.pdf</p>
                                                    <i class="fas fa-times"></i>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-custom progress-bar-striped progress-bar-animated"
                                                        style="width:60%"></div>
                                                </div>
                                            </div>
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
                            showToast("Organization created successfully!", "Success",
                                "primary");
                            setTimeout(() => {
                                    window.location.href = response.redirect_url;
                                },
                                3000);

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
            });




            function initSelect2Country(selector, modalId = null) {
                $(selector).select2({
                    placeholder: 'Select Country',
                    dropdownParent: modalId ? $(modalId) : $(document.body),
                    ajax: {
                        url: "{{ route('general.countries') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                search: params.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.results
                            };
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
                        data: function(params) {
                            return {
                                search: params.term,
                                country_id: $(countrySelector).val()
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.results
                            };
                        }
                    }
                });

                // Jab country change ho to state reset
                $(countrySelector).on('change', function() {
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
                        data: function(params) {
                            return {
                                search: params.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.results
                            };
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
                createTag: function(params) {
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
                templateResult: function(data) {
                    var $result = $("<span></span>").text(data.text);
                    if (data.newOption) {
                        $result.append(" <em>(new)</em>");
                    }
                    return $result;
                }
            });

            // ✅ persist & always keep latest selected
            $('#title').on('select2:select', function(e) {
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
                createTag: function(params) {
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
                templateResult: function(data) {
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
                        if (key !== "address_name" && key !== "address_email" && key !==
                            "address_phone") {
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
