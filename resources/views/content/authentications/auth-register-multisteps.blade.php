@php
    $customizerHidden = 'customizer-hide';
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Multi Steps Sign-up - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/bs-stepper/bs-stepper.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
    @vite(['resources/assets/vendor/libs/spinkit/spinkit.scss'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/pages-auth-multisteps.js'])
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
        <a href="{{ url('/') }}" class="app-brand auth-cover-brand">
            <span class="app-brand-logo demo">@include('_partials.macros', ['height' => 86, 'withbg' => 'fill: #fff;'])</span>
            <span class="app-brand-text demo text-heading fw-bold">{{ config('variables.templateName') }}</span>
        </a>
        <!-- /Logo -->
        <div class="authentication-inner row">

            <!-- Left Text -->
            <div
                class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5 auth-cover-bg-color position-relative auth-multisteps-bg-height">
                <img src="{{ asset('assets/img/illustrations/auth-register-multisteps-illustration.png') }}"
                    alt="auth-register-multisteps" class="img-fluid"
                    style="margin-left: 163px; width: 280px; display: block;">

                <img src="{{ asset('assets/img/illustrations/auth-register-multisteps-shape-' . $configData['style'] . '.png') }}"
                    alt="auth-register-multisteps" class="platform-bg"
                    data-app-light-img="illustrations/auth-register-multisteps-shape-light.png"
                    data-app-dark-img="illustrations/auth-register-multisteps-shape-dark.png">
            </div>
            <!-- /Left Text -->



            <!--  Multi Steps Registration -->
            <!-- Form Header Section -->
            <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-5">
                <div class="w-px-700">
                    <h3 class="mb-0 text-center">Create Your Account</h3>
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
                                <input type="hidden" name="member_id" class="member_id">
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
                                                        class="form-control" placeholder="johndoe" required />
                                                    <label for="fullname">Fullname<span class="text-danger">*</span></label>
                                                </div>
                                                <span class="invalid-feedback" role="alert"></span>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" name="job_title" id="jobtitle"
                                                        class="form-control" placeholder="job title" />
                                                    <label for="jobtitle">Job Title</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="john.doe@email.com" required />
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
                                                        name="password" required
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

                                <input type="hidden" name="member_id" class="member_id">
                                <div id="companyInformation">
                                    <div class="d flex align-items-center">
                                        <a class="btn btn-primary my-6" href="{{ url('/') }}">
                                            Skip for now
                                        </a>
                                    </div>

                                    <div class="content-header mb-6">
                                        <h4 class="mb-0">Company Information</h4>
                                        <p class="mb-0">Enter Your Business Details</p>
                                    </div>

                                    <div class="row g-6">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="companyName" name="company_name"
                                                        class="form-control" placeholder="Company Name" required />
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
                                                        class="form-control" placeholder="Mark Street" />
                                                    <label for="streetAddress">Street Address</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="city" name="city"
                                                        class="form-control" placeholder="City" />
                                                    <label for="city">City</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="state" name="state"
                                                        class="form-control" placeholder="state" />
                                                    <label for="state">State/Province</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="pincode" name="pincode"
                                                        class="form-control" placeholder="000000" maxlength="6" />
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
                                                        required />
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
                                                        maxlength="6" />
                                                    <label for="companyWebsite">Company Website</label>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <select id="businessType" class="form-select form-select-lg"
                                                name="business_type" onclick="handleBusinessTypeChange()">
                                                <option value="" selected disabled>Select Business Type</option>
                                                <option value="Freight Forwarder">Freight Forwarder</option>
                                                <option value="Shipping Line">Shipping Line</option>
                                                <option value="Trucking Company">Trucking Company</option>
                                                <option value="Customs Broker">Customs Broker</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <select id="companySize" class="form-select form-select-lg"
                                                name="company_size">
                                                <option value=""selected disabled>Select Company Size</option>
                                                <option value="Freight Forwarder">1-10 employees</option>
                                                <option value="Shipping Line">11-50 employees</option>
                                                <option value="Trucking Company">100-200 employees
                                                </option>
                                                <option value="Customs Broker">201-500 employees</option>
                                                <option value="500+ employees">500+ employees</option>

                                            </select>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </div>

                                        <div class="col-sm-6" id="otherBusinessTypeField" style="display: none;">
                                            <div class="card-body">
                                                <div class="form-floating">

                                                    <input type="text" id="otherBusinessType"
                                                        name="other_business_type" class="form-control"
                                                        placeholder="Please specify" />
                                                    <label for="otherBusinessType">Specify Other</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <input class="form-check-input" type="checkbox" id="terms-policy"
                                                name="terms_policy" {{ old('terms_policy') ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="terms-policy">
                                                I agree to the <a
                                                    href="{{ config('variables.licenseUrl') ? config('variables.licenseUrl') : '#' }}">Terms
                                                    and Conditions</a> and <a
                                                    href="{{ config('variables.moreThemes') ? config('variables.moreThemes') : '#' }}">Privacy
                                                    Policy</a>.
                                            </label>
                                        </div>



                                        <div class="col-12 d-flex justify-content-between">
                                            <button type ="button" class="btn btn-label-secondary btn-prev"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="submit"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Create
                                                    Account</span>
                                                <i class="ti ti-arrow-right ti-xs"></i></button>

                                        </div>

                                        <div class="row g-6">
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                            {{-- <div class="col-sm-6">
                                                <div class="g-recaptcha"
                                                    data-sitekey="6LfQ9KwqAAAAAKbifeonDuI2sOKdWPTY_i58Q6eD"></div>
                                                <input type="hidden" name="g-recaptcha-response"
                                                    id="g-recaptcha-response">
                                                @error('g-recaptcha-response')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> --}}

                                            <div class="col-sm-6">
                                                <p class="text-end">
                                                    <span>Already have an account?</span>

                                                    <u><a href="{{ url('/') }}">Log In</span></a>


                                                </p>
                                            </div>
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

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="module">
        // Check selected custom option
        // document.addEventListener('DOMContentLoaded', () => {
        //     let stepper = document.querySelector('.bs-stepper');
        //     let currentStep = 0;

        //     const prevButton = document.querySelector('.btn-prev');
        //     const nextButton = document.querySelector('.btn-next');

        //     function showStep(stepIndex) {
        //         let steps = stepper.querySelectorAll('.bs-stepper-content > div');
        //         steps.forEach((step, index) => {
        //             if (index === stepIndex) {
        //                 step.style.display = 'block';
        //             } else {
        //                 step.style.display = 'none';
        //             }
        //         });

        //         prevButton.style.display = stepIndex === 0 ? 'none' : 'block';
        //     }

        //     nextButton.addEventListener('click', () => {
        //         currentStep += 1;
        //         showStep(currentStep);
        //     });

        //     prevButton.addEventListener('click', () => {
        //         currentStep -= 1;
        //         showStep(currentStep);
        //     });

        //     // Initialize the first step
        //     showStep(currentStep);
        // });


        // document.addEventListener("DOMContentLoaded", function() {
        //     const steps = document.querySelectorAll('.step-trigger');

        //     steps.forEach(step => {
        //         step.addEventListener('click', function(e) {
        //             e.preventDefault();

        //             // Remove active class from all content sections and step indicators
        //             document.querySelectorAll('.content').forEach(content => {
        //                 content.classList.remove('active');
        //             });
        //             document.querySelectorAll('.step').forEach(step => {
        //                 step.classList.remove('active');
        //             });

        //             // Add active class to the clicked step and corresponding content section
        //             const target = document.querySelector(step.getAttribute('data-target'));
        //             target.classList.add('active');

        //             step.parentElement.classList.add('active');
        //         });
        //     });
        // });



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
                    url: "{{ route('post-account-details') }}", // Your AJAX submission route
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
                            $('.member_id').val(response.member_id);
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
                event.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this); // Gather form data

                $('#spinner').show();

                $.ajax({
                    url: "{{ route('post-company-details') }}", // Your AJAX submission route
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
                            window.location.href = "{{ route('auth-verify-email-cover') }}";

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
