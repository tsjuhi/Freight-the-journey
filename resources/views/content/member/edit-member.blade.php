@extends('layouts/layoutMaster')

@section('title', 'Edit User - User')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/bs-stepper/bs-stepper.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/pages-auth-multisteps.js'])
@endsection

<style>
    .position-relative {
        position: relative;
    }

    .password-toggle-icon {
        position: absolute;
        top: 50%;
        /* Align vertically */
        right: 15px;
        /* Adjust as needed */
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
        font-size: 1.2rem;
    }
</style>

@section('content')
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <!-- Logo -->

        <!-- /Logo -->
        <div class="authentication-inner row">


            <!--  Multi Steps Registration -->
            <div class="d-flex col-lg-12 align-items-center justify-content-center authentication-bg p-5">
                <div class="w-px-1000">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 text-center">
                            <h3 class="mb-0">Edit Member Details</h3>
                        </div>
                        <a href="{{ route('app-member') }}" class="btn btn-primary ms-auto">
                            <i class="ti ti-arrow-left ti-xs"></i> Back
                        </a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success mb-1 rounded-0" role="alert">
                            <div class="alert-body">
                                {{ session('status') }}
                            </div>
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-denger mb-1 rounded-0" role="alert">
                            <div class="alert-body">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                    <div id="stepper" class="bs-stepper border-none shadow-none mt-5">
                        <div class="bs-stepper-header border-none pt-12 px-0">
                            <div class="step" data-target="#accountInformation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-user ti-md"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">User Account Information</span>
                                        <span class="bs-stepper-subtitle">Account Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="ti ti-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#companyInformation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-heart-handshake"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Company Information</span>
                                        <span class="bs-stepper-subtitle">Business Details</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="spinner-border spinner-border-lg text-primary" role="status" id="spinner"
                                style="display:none;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="bs-stepper-content px-0">

                            <!-- Step 1: Account Details -->
                            <form id="form1">

                                <div id="accountInformation">
                                    <div class="content-header mb-6">
                                        <h4 class="mb-0">Account Details</h4>
                                        <p class="mb-0">Enter Your Account Details</p>
                                    </div>

                                    <div class="row g-6">
                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" name="fullname" id="fullname"
                                                        class="form-control" placeholder="johndoe" required
                                                        value="{{ $edit_member->fullname }}" />
                                                    <label for="fullname">Fullname<span class="text-danger">*</span></label>
                                                </div>
                                                <span class="invalid-feedback" role="alert"></span>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" name="job_title" id="jobtitle"
                                                        class="form-control" placeholder="job title"
                                                        value="{{ $edit_member->job_title }}" />
                                                    <label for="jobtitle">Job Title</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="john.doe@email.com" required
                                                        value="{{ $edit_member->email }}" />
                                                    <label for="email">Email<span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6 form-password-toggle">
                                            <div class="card-body">
                                                <div class="form-floating position-relative form-password-toggle">
                                                    <input type="password" id="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required value="{{ $edit_member->password }}"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <label for="password">Password</label>
                                                    <i class="ti ti-eye-off password-toggle-icon"></i>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6 form-password-toggle">
                                            <div class="card-body">
                                                <div class="form-floating position-relative form-password-toggle">
                                                    <input type="password" id="confirm-password"
                                                        class="form-control form-control-lg @error('confirm_password') is-invalid @enderror"
                                                        name="confirm_password" required
                                                        value="{{ $edit_member->password }}"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <label for="confirm-password">Confirm Password</label>
                                                    <i class="ti ti-eye-off password-toggle-icon"></i>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="text-end">
                                            <button class="btn btn-primary btn-next" type="submit">
                                                <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                                                <i class="ti ti-arrow-right ti-xs"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <!-- Step 2: Company Information -->
                            <form id="form2" style="display: none;">


                                <div id="companyInformation">
                                    <div class="content-header mb-6">
                                        <h4 class="mb-0">Company Information</h4>
                                        <p class="mb-0">Enter Your Business Details</p>
                                    </div>

                                    <div class="row g-6">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="companyName" name="company_name"
                                                        class="form-control" placeholder="Company Name" required
                                                        value="{{ $edit_member->company_name }}" />
                                                    <label for="companyName">Company
                                                        Name<spanclass="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <h6 class="mb-0">Company Address</h6>

                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="streetAddress" name="street_address"
                                                        class="form-control" placeholder="Mark Street"
                                                        value="{{ $edit_member->street_address }}" />
                                                    <label for="streetAddress">Street Address</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="city" name="city"
                                                        class="form-control" placeholder="City"
                                                        value="{{ $edit_member->City }}" />
                                                    <label for="city">City</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="state" name="state"
                                                        class="form-control" placeholder="state"
                                                        value="{{ $edit_member->state }}" />
                                                    <label for="state">State/Province</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="pincode" name="pincode"
                                                        class="form-control" placeholder="000000" maxlength="6"
                                                        value="{{ $edit_member->pincode }}" />
                                                    <label for="pincode">Pincode</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6">

                                            <label class="form-label" for="country"></label>
                                            <select id="country" name="country" class="form-select form-select-lg"
                                                data-allow-clear="true">
                                                <option value=""selected disabled>Select Country</option>
                                                @foreach ($country as $country)
                                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="companyPhone" name="company_phone"
                                                        class="form-control" placeholder="0000000000" maxlength="12"
                                                        required value="{{ $edit_member->company_phone }}" />
                                                    <label for="companyPhone">Company Phone Number<span
                                                            class="text-danger">*</span></label>
                                                </div>

                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="companyWebsite" name="company_website"
                                                        class="form-control" placeholder="www.companywebsite.com"
                                                        maxlength="6" value="{{ $edit_member->company_website }}" />
                                                    <label for="companyWebsite">Company Website</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <select id="businessType" class="form-select form-select-lg"
                                                name="business_type" onclick="handleBusinessTypeChange()">
                                                <option value="" selected disabled>Select Business Type</option>
                                                <option value="Freight Forwarder"
                                                    {{ $edit_member->business_type == 'Freight Forwarder' ? 'selected' : '' }}>
                                                    Freight Forwarder</option>
                                                <option value="Shipping Line"
                                                    {{ $edit_member->business_type == 'Shipping Line' ? 'selected' : '' }}>
                                                    Shipping Line</option>
                                                <option
                                                    value="Trucking Company"{{ $edit_member->business_type == 'Trucking Company' ? 'selected' : '' }}>
                                                    Trucking Company</option>
                                                <option
                                                    value="Customs Broker"{{ $edit_member->business_type == 'Customs Broker' ? 'selected' : '' }}>
                                                    Customs Broker</option>
                                                <option
                                                    value="Other"{{ $edit_member->business_type == 'Other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <select id="companySize" class="form-select form-select-lg"
                                                name="company_size">
                                                <option value=""selected disabled>Select Company Size</option>
                                                <option value="1-10 employees"
                                                    {{ $edit_member->company_size == '1-10 employees' ? 'selected' : '' }}>
                                                    1-10 employees</option>
                                                <option value="11-50 employees"
                                                    {{ $edit_member->company_size == '11-50 employees' ? 'selected' : '' }}>
                                                    11-50 employees</option>
                                                <option value="100-200 employees"
                                                    {{ $edit_member->company_size == '100-200 employees' ? 'selected' : '' }}>
                                                    100-200 employees
                                                </option>
                                                <option value="201-500 employees"
                                                    {{ $edit_member->company_size == '201-500 employees' ? 'selected' : '' }}>
                                                    201-500 employees</option>
                                                <option value="500+ employees"
                                                    {{ $edit_member->company_size == '500+ employees' ? 'selected' : '' }}>
                                                    500+ employees</option>

                                            </select>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6" id="otherBusinessTypeField" style="display: none;">
                                            <div class="card-body">
                                                <div class="form-floating">

                                                    <input type="text" id="otherBusinessType"
                                                        name="other_business_type" class="form-control"
                                                        placeholder="Please specify"
                                                        value="{{ $edit_member->other_business_type }}" />
                                                    <label for="otherBusinessType">Specify Other</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-between">
                                            <button type ="button" class="btn btn-label-secondary btn-prev"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="submit"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0"> <i
                                                        class="ti ti-pencil"></i>Update</span>
                                            </button>

                                        </div>


                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- / Multi Steps Registration -->

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="module">
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();

        document.addEventListener("DOMContentLoaded", function() {
            const businessTypeDropdown = document.getElementById("businessType");
            const otherField = document.getElementById("otherBusinessTypeField");

            businessTypeDropdown.addEventListener("click", function() {
                const businessType = businessTypeDropdown.value;
                console.log("Selected Business Type:", businessType);

                if (businessType === "Other") {
                    otherField.style.display = "block";
                } else {
                    otherField.style.display = "none";
                }
            });
        });

        $(document).ready(function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var currentStep = 2;

            $('#form1').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this); // Gather form data
                $('#spinner').show();

                $.ajax({
                    url: "{{ route('update-account-info', $edit_member->id) }}", // Your AJAX submission route
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Include CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#spinner').hide();
                            $('#form1').hide(); // Hide form1
                            $('#form2').show(); // Show form2

                        } else {
                            $('#spinner').hide();
                            alert('Failed to submit form. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            $('#spinner').hide();
                            displayValidationErrors(xhr.responseJSON
                                .errors); // Display validation errors
                            console.log(xhr.responseJSON.errors); // Log errors for debugging
                        }
                    }
                });
            });



            $('#form2').submit(function(event) {
                event.preventDefault();

                var formData = new FormData(this); // Gather form data

                $('#spinner').show();

                $.ajax({
                    url: "{{ route('update-company-info', $edit_member->id) }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Include CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#spinner').hide();
                            window.location.href = "{{ route('app-member') }}";
                            console.log("Form 1 submitted successfully")
                        } else {
                            alert('Failed to submit form. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {

                        if (xhr.status === 422) {
                            $('#spinner').hide();
                            displayValidationErrors(xhr.responseJSON
                                .errors); // This part is already present
                            console.log(xhr.responseJSON.errors); // Log errors for debugging
                        }
                    }

                });
            });

            $('.btn-prev').click(function() {
                currentStep = 1; // Go back to form1
                $('#form2').hide(); // Hide form2
                $('#form1').show(); // Show form1
            });



            function displayValidationErrors(errors) {
                // Clear previous errors
                $('.invalid-feedback').text(''); // Clear all error messages
                $('.is-invalid').removeClass('is-invalid'); // Remove invalid class

                // Iterate over the errors object
                $.each(errors, function(field, messages) {
                    // Find the input field by name
                    var inputField = $(`[name="${field}"]`);

                    // Add the 'is-invalid' class to highlight the field
                    inputField.addClass('is-invalid');

                    // Locate or create the invalid feedback element
                    var feedbackElement = inputField.siblings('.invalid-feedback');
                    if (feedbackElement.length === 0) {
                        feedbackElement = $('<span class="invalid-feedback" role="alert"></span>');
                        inputField.parent().append(feedbackElement); // Append feedback if not present
                    }

                    // Set the error message
                    feedbackElement.text(messages[0]);
                });
            }


        });
    </script>


@endsection
