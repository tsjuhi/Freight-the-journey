@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-user-view.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/modal-edit-user.js', 'resources/assets/js/app-user-view.js', 'resources/assets/js/app-user-view-account.js', 'resources/assets/js/pages-profile.js'])
@endsection
@section('content')
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h5 class="mb-0 fw-bold">User Profile</h5>
                </div>
                <div class="card-body text-center">
                    <img class="rounded-circle mb-3 border border-2" src="{{ asset('assets/img/avatars/1.png') }}"
                        height="120" width="120" alt="User avatar" />
                    <h5 class="fw-bold mb-1">Violet Mendoza</h5>
                    <p class="text-muted mb-3">Active</p>
                    <hr>
                    <h6 class="fw-bold mb-3">Account Details</h6>
                    <ul class="list-unstyled text-start">
                        <li class="mb-3">
                            <span class="field-heading">Fullname:</span>
                            <span class="field-value">Violet Mendoza</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Email:</span>
                            <span class="field-value">vafgot@vultukir.org</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Job Title:</span>
                            <span class="field-value">Author</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Contact:</span>
                            <span class="field-value">(123) 456-7890</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Password:</span>
                            <span class="field-value">123456789</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('edit-user') }}" class="btn btn-primary me-2">Edit</a>
                        <button class="btn btn-danger danger-button suspend-user">Suspend</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 order-0 order-md-1">
            <!-- User Tabs -->
            <div class="mb-4">
                <ul class="nav nav-pills flex-column flex-md-row">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><strong>Account</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('app/user/view/security') }}">
                            <strong>Security</strong>
                        </a>
                    </li>
                </ul>
            </div>
            <!--/ User Tabs -->

            <!-- Company Details -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold">Company Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="field-heading">Company Name:</span>
                            <span class="field-value">ABC Pvt. Ltd.</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Address:</span>
                            <span class="field-value">The Mark Street, Miami, Florida</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Pincode:</span>
                            <span class="field-value">123456</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Country:</span>
                            <span class="field-value">USA</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Phone:</span>
                            <span class="field-value">0000000000</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Website:</span>
                            <span class="field-value">www.companywebsite.com</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Business Type:</span>
                            <span class="field-value">Freight Forwarder</span>
                        </li>
                        <li class="mb-3">
                            <span class="field-heading">Company Size:</span>
                            <span class="field-value">100-200 employees</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ Company Details -->
        </div>
    </div>

    <style>
        h5,
        h6,
        strong {
            font-weight: 600;
            /* Bold headings and titles */
        }

        .card-header h5 {
            font-size: 1.25rem;
            /* Slightly larger headings for emphasis */
        }

        p,
        li {
            font-size: 1rem;
            /* Default font size for better readability */
        }

        .text-muted {
            font-size: 0.9rem;
            /* Muted text with slightly smaller size */
        }

        ul.list-unstyled li {
            line-height: 1.8;
            /* Proper spacing between list items */
        }

        .field-heading {
            font-weight: 600;
            /* Bold for field headings */
            font-size: 1.05rem;
            /* Slightly larger font size */
            display: inline-block;
            margin-right: 10px;
            /* Add spacing between heading and value */
        }

        .field-value {
            font-weight: 400;
            /* Normal weight for field values */
            font-size: 1rem;
            /* Standard font size */
        }

        .btn {
            font-size: 0.9rem;
            /* Compact button text */
            font-weight: 500;
        }
    </style>
@endsection
