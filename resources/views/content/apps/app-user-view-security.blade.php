@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite('resources/assets/vendor/scss/pages/page-user-view.scss')
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/modal-edit-user.js', 'resources/assets/js/modal-enable-otp.js', 'resources/assets/js/app-user-view.js', 'resources/assets/js/app-user-view-security.js'])
@endsection

@section('content')
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-6">
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

                </div>
            </div>
            <!-- /User Card -->

        </div>
        <!--/ User Sidebar -->


        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 order-0 order-md-1">
            <!-- User Pills -->
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/app/user/view/account') }}"><i
                                class="ti ti-user-check me-1_5 ti-sm"></i>Account</a></li>
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                class="ti ti-lock me-1_5 ti-sm"></i>Security</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('app/user/view/billing') }}"><i
                                class="ti ti-bookmark me-1_5 ti-sm"></i>Billing & Plans</a></li> --}}
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-notifications') }}"><i
                                class="ti ti-bell me-1_5 ti-sm"></i>Notifications</a></li> --}}
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('app/user/view/connections') }}"><i
                                class="ti ti-link me-1_5 ti-sm"></i>Connections</a></li> --}}
                </ul>
            </div>
            <!--/ User Pills -->

            <!-- Change Password -->
            <div class="card mb-6">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
                    <form id="formChangePassword" method="POST" onsubmit="return false">
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <h5 class="alert-heading mb-1">Ensure that these requirements are met</h5>
                            <span>Minimum 8 characters long, uppercase & symbol</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="row gx-6">
                            <div class="mb-4 col-12 col-sm-6 form-password-toggle">
                                <label class="form-label" for="newPassword">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="newPassword" name="newPassword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>

                            <div class="mb-4 col-12 col-sm-6 form-password-toggle">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!--/ Change Password -->



        </div>
        <!--/ User Content -->
    </div>

    <!-- Modals -->
    @include('_partials/_modals/modal-edit-user')
    @include('_partials/_modals/modal-enable-otp')
    @include('_partials/_modals/modal-upgrade-plan')
    <!-- /Modals -->

@endsection
