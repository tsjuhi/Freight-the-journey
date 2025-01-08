@extends('layouts/layoutMaster')

@section('title', 'Account settings - Account')

<!-- Vendor Styles -->
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/pages-account-settings-account.js'])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                class="ti-sm ti ti-users me-1_5"></i> Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/pages/account-settings-security') }}"><i
                                class="ti-sm ti ti-lock me-1_5"></i> Security</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-billing') }}"><i
                                class="ti-sm ti ti-bookmark me-1_5"></i> Billing & Plans</a></li> --}}
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-notifications') }}"><i
                                class="ti-sm ti ti-bell me-1_5"></i> Notifications</a></li> --}}
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-connections') }}"><i
                                class="ti-sm ti ti-link me-1_5"></i> Connections</a></li> --}}
                </ul>
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

            <form id="form1" action="{{ route('post-account-settings') }}" method="POST">
                @csrf
                <div class="card mb-6">
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-6">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                    <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4">
                        <form id="formAccountSettings" method="GET" onsubmit="return false">
                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input class="form-control" type="text" id="firstName" name="firstName"
                                        value="{{ $admin_details->name }}" autofocus />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input class="form-control" type="text" name="lastName" id="lastName"
                                        value="{{ $admin_details->last_name }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ $admin_details->email }}" placeholder="john.doe@example.com" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="organization" class="form-label">Organization</label>
                                    <input type="text" class="form-control" id="organization" name="organization"
                                        value="{{ $admin_details->organization }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                            placeholder="202 555 0111" value="{{ $admin_details->phone_number }}" />
                                    </div>
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" value="{{ $admin_details->address }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input class="form-control" type="text" id="state" name="state"
                                        placeholder="California" value="{{ $admin_details->state }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="zipCode" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="zipCode" name="zipCode"
                                        placeholder="231465" maxlength="6" value="{{ $admin_details->zip_code }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="country">Country</label>
                                    <select id="country" class="select2 form-select">
                                        <option value=""selected disabled>Select</option>
                                        @foreach ($country as $country)
                                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="currency" class="form-label">Currency</label>
                                    <select id="currency" class="select2 form-select">
                                        <option value=""selected disabled>Select Currency</option>
                                        @foreach ($currency as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </form>
            {{-- <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-6 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check my-8">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">I confirm my account
                                deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account" disabled>Deactivate
                            Account</button>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>

@endsection
