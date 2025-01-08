@extends('layouts/layoutMaster')

@section('title', 'Company settings - Account')

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
                    <li class="nav-item"><a class="nav-link" href="{{ route('member-account-setting') }}"><i
                                class="ti-sm ti ti-users me-1_5"></i> Account</a></li>
                    <li class="nav-item"><a class="nav-link active" href=""><i
                                class="ti-sm ti ti-building  me-1_5"></i>
                            Company</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('member-security') }}"><i
                                class="ti-sm ti ti-lock me-1_5"></i> Security</a></li>
                </ul>
            </div>
            <div class="card mb-6">
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-6">
                        <img src="{{ asset('assets/img/avatars/demo-company-logo.png') }}" alt="user-avatar"
                            class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload Company Logo</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>

                            <div>Allowed JPG, JPEG or PNG. Max size of MB</div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <form id="formAccountSettings" method="GET" onsubmit="return false">
                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="companyName" class="form-label">Company
                                    Name</label>
                                <input class="form-control" type="text" id="companyName" name="companyName"
                                    value="ABC Pvt. Ltd." autofocus />
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="streetAddress" class="form-label">Street Address</label>
                                <input class="form-control" type="text" name="streetAddress" id="streetAddress"
                                    value="The Mark Street" />
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="email" class="form-label">City</label>
                                <input class="form-control" type="text" id="city" name="city" value=""
                                    placeholder="Enter City" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="email" class="form-label">State/Province</label>
                                <input class="form-control" type="text" id="state" name="state" value="Florida"
                                    placeholder="Enter State/Province" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="email" class="form-label">Pincode</label>
                                <input class="form-control" type="text" id="pincode" name="pincode" value="USA"
                                    placeholder="Enter Pincode" />
                            </div>


                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="country"></label>
                                <select id="country" name="country" class="form-select" data-allow-clear="true">
                                    <option value=""selected disabled>Select Country</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="email" class="form-label">Company Phone Number</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="0000000000" placeholder="Enter Phone Number" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="email" class="form-label">Company Website</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="www.website.com" placeholder="Enter Company Website" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="businessType" class="form-label">Business Type</label>
                                <select id="businessType" class="form-select" name="business_type"
                                    onclick="handleBusinessTypeChange()">
                                    <option value="" selected disabled>Select Business Type</option>
                                    <option value="Freight Forwarder">Freight Forwarder</option>
                                    <option value="Shipping Line">Shipping Line</option>
                                    <option value="Trucking Company">Trucking Company</option>
                                    <option value="Customs Broker">Customs Broker</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="companySize" class="form-label">Company Size</label>
                                <select id="companySize" class="form-select" name="companySize"
                                    onclick="handleBusinessTypeChange()">
                                    <option value="" selected disabled>Select Company Size</option>
                                    <option value="1-10 employees">1-10 employees</option>
                                    <option value="11-50 employees">11-50 employees</option>
                                    <option value="100-200 employees">100-200 employees</option>
                                    <option value="201-500 employees">201-500 employees</option>
                                    <option value="500+ employees">500+ employees</option>
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

        </div>
    </div>

@endsection
