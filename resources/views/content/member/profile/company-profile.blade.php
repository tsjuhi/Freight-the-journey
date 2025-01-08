@extends('layouts/layoutMaster')

@section('title', 'User Profile - Profile')

<!-- Vendor Styles -->
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss'])
@endsection

<!-- Page Styles -->
@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-profile.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/pages-profile.js'])
@endsection

@section('content')
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-6">
                <div class="user-profile-header-banner">
                    <img src="{{ asset('assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-lg-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4 class="mb-2 mt-lg-6">John Doe</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                                    <li class="list-inline-item d-flex gap-2 align-items-center">
                                        <i class='ti ti-user'></i><span class="fw-medium">User</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- Navbar pills -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-2 gap-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('member-profile') }}"><i
                                class='ti-sm ti ti-user-check me-1_5'></i> Profile</a></li>
                    <li class="nav-item"><a class="nav-link active" href=""><i
                                class='ti-sm ti ti-building me-1_5'></i>
                            Company </a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-md-12">
            <!-- About User -->
            <div class="card mb-6">
                <div class="card-body">
                    <small class="card-text text-uppercase">Company Details</small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-building ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">Company Name:</strong>
                            <span>ABC Pvt. Ltd.</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-location-pin ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">Street Address:</strong>
                            <span>The Mark Street</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-map ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">City:</strong>
                            <span>Sample City</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="ti ti-map ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">State/Province:</strong>
                            <span>Florida</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-zip ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">Pincode:</strong>
                            <span>000000</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-world ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">Country:</strong>
                            <span>USA</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-phone ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">Company Phone Number:</strong>
                            <span>0000000000</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-world ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">Company Website:</strong>
                            <span>www.website.com</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-briefcase ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">Business Type:</strong>
                            <span>Freight Forwarder</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-users ti-lg" aria-hidden="true"></i>
                            <strong class="mx-2">Company Size:</strong>
                            <span>100-200 employees</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--/ User Profile Content -->
@endsection
