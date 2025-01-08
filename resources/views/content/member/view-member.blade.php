@extends('layouts/layoutMaster')

@section('title', 'View User - User')
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
                            <h3 class="mb-0">View Member Details</h3>
                        </div>
                        <a href="{{ route('app-member') }}" class="btn btn-primary ms-auto">
                            <i class="ti ti-arrow-left ti-xs"></i> Back
                        </a>
                    </div>
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
                                                        class="form-control" placeholder="johndoe" readonly
                                                        value="{{ $view_member->fullname }}" />
                                                    <label for="fullname">Fullname</label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" name="job_title" id="jobtitle"
                                                        class="form-control" placeholder="job title" readonly
                                                        value="{{ $view_member->job_title }}" />
                                                    <label for="jobtitle">Job Title</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="john.doe@email.com" readonly
                                                        value="{{ $view_member->email }}" />
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6 form-password-toggle">
                                            <div class="card-body">
                                                <div class="form-floating position-relative form-password-toggle">
                                                    <input type="password" id="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" readonly value="{{ $view_member->password }}"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <label for="password">Password</label>
                                                    <i class="ti ti-eye-off password-toggle-icon"></i>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="text-end">
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
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
                                    <div class="content-header mb-6">
                                        <h4 class="mb-0">Company Information</h4>
                                        <p class="mb-0">Enter Your Business Details</p>
                                    </div>

                                    <div class="row g-6">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="companyName" name="company_name"
                                                        class="form-control" placeholder="Company Name" readonly
                                                        value="{{ $view_member->company_name }}" />
                                                    <label for="companyName">Company
                                                        Name<spanclass="text-danger">*</span></label>
                                                </div>
                                            </div>

                                        </div>

                                        <h6 class="mb-0">Company Address</h6>

                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="streetAddress" name="street_address"
                                                        class="form-control" placeholder="Mark Street" readonly
                                                        value="{{ $view_member->street_address }}" />
                                                    <label for="streetAddress">Street Address</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="city" name="city"
                                                        class="form-control" placeholder="City" readonly
                                                        value="{{ $view_member->city }}" />
                                                    <label for="city">City</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="state" name="state"
                                                        class="form-control" placeholder="state" readonly
                                                        value="{{ $view_member->state }}" />
                                                    <label for="state">State/Province</label>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="pincode" name="pincode"
                                                        class="form-control" placeholder="000000" maxlength="6" readonly
                                                        value="{{ $view_member->pincode }}" />
                                                    <label for="pincode">Pincode</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                @php

                                                    $country_name = App\Models\Country::where(
                                                        'id',
                                                        $view_member->country,
                                                    )->first();
                                                @endphp
                                                <input type="text" id="country" name="country" class="form-control"
                                                    placeholder="Country" readonly
                                                    value="{{ $country_name->country }}" />
                                                <label for="country">Country</label>
                                            </div>
                                        </div>





                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="companyPhone" name="company_phone"
                                                        class="form-control" placeholder="0000000000" maxlength="12"
                                                        readonly value="{{ $view_member->company_phone }}" />
                                                    <label for="companyPhone">Company Phone Number<span
                                                            class="text-danger">*</span></label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <div class="form-floating">
                                                    <input type="text" id="companyWebsite" name="company_website"
                                                        class="form-control" placeholder="www.companywebsite.com"
                                                        maxlength="6" readonly
                                                        value="{{ $view_member->company_website }}" />
                                                    <label for="companyWebsite">Company Website</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" id="businessType" name="business_type"
                                                    class="form-control" placeholder="Business Type" readonly
                                                    value="{{ $view_member->business_type }}" />
                                                <label for="businessType">Business Type</label>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" id="companySize" name="company_size"
                                                    class="form-control" placeholder="Company Size" readonly
                                                    value="{{ $view_member->company_size }}" />
                                                <label for="company_size">Company Size</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6" id="otherBusinessTypeField" style="display: none;">
                                            <div class="card-body">
                                                <div class="form-floating">

                                                    <input type="text" id="otherBusinessType"
                                                        name="other_business_type" class="form-control"
                                                        placeholder="Please specify"
                                                        value="{{ $view_member->other_business_type }}" readonly />
                                                    <label for="otherBusinessType">Specify Other</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-between">
                                            <button type ="button" class="btn btn-label-secondary btn-prev"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
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


    <script type="module">
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();

        document.addEventListener('DOMContentLoaded', () => {
            let stepper = document.querySelector('.bs-stepper');
            let currentStep = 0;
            const forms = stepper.querySelectorAll('.bs-stepper-content > form');
            const prevButton = document.querySelector('.btn-prev');
            const nextButton = document.querySelector('.btn-next');

            function showStep(stepIndex) {
                forms.forEach((form, index) => {
                    if (index === stepIndex) {
                        form.style.display = 'block'; // Show the current step form
                    } else {
                        form.style.display = 'none'; // Hide the other forms
                    }
                });

                prevButton.style.display = stepIndex === 0 ? 'none' : 'inline-block'; // Show/hide previous button
            }

            nextButton.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent form submission
                console.log('Next button clicked');
                if (currentStep < forms.length - 1) {
                    currentStep += 1;
                    showStep(currentStep);
                }
            });

            prevButton.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent form submission
                if (currentStep > 0) {
                    currentStep -= 1;
                    showStep(currentStep);
                }
            });

            // Initialize the first step
            showStep(currentStep);
        });






        // document.addEventListener("DOMContentLoaded", function() {
        //     const businessTypeDropdown = document.getElementById("businessType");
        //     const otherField = document.getElementById("otherBusinessTypeField");

        //     businessTypeDropdown.addEventListener("click", function() {
        //         const businessType = businessTypeDropdown.value;
        //         console.log("Selected Business Type:", businessType);

        //         if (businessType === "Other") {
        //             otherField.style.display = "block";
        //         } else {
        //             otherField.style.display = "none";
        //         }
        //     });
        // });
    </script>


@endsection
