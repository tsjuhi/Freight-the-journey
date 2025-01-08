@php
    $customizerHidden = 'customizer-hide';
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reset Password Cover - Pages')

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

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/pages-auth.js'])
@endsection

@section('content')
    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="app-brand auth-cover-brand">
            <span class="app-brand-logo demo">@include('_partials.macros', ['height' => 86, 'withbg' => 'fill: #fff;'])</span>
            <span class="app-brand-text demo text-heading fw-bold">{{ config('variables.templateName') }}</span>
        </a>
        <!-- /Logo -->
        <div class="authentication-inner row m-0">

            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-8 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/img/illustrations/auth-reset-password-illustration-' . $configData['style'] . '.png') }}"
                        alt="auth-reset-password-cover" class="my-5 auth-illustration"
                        data-app-light-img="illustrations/auth-reset-password-illustration-light.png"
                        data-app-dark-img="illustrations/auth-reset-password-illustration-dark.png">

                    <img src="{{ asset('assets/img/illustrations/bg-shape-image-' . $configData['style'] . '.png') }}"
                        alt="auth-reset-password-cover" class="platform-bg"
                        data-app-light-img="illustrations/bg-shape-image-light.png"
                        data-app-dark-img="illustrations/bg-shape-image-dark.png">
                </div>
            </div>
            <!-- /Left Text -->
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
            <!-- Reset Password -->
            <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-6 p-sm-12">
                <div class="w-px-400 mx-auto mt-12 pt-5">
                    <h4 class="mb-1">Reset Password 🔒</h4>
                    <p class="mb-6"><span class="fw-medium">Your new password must be different from previously used
                            passwords</span></p>
                    <form id="formAuthentication" class="mb-6" action="{{ route('member.password.update') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <div class="mb-6">
                            <div class="card-body">
                                <div class="form-floating position-relative form-password-toggle">
                                    <input type="password" id="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" placeholder="" />
                                    <label for="password">New Password</label>
                                    <i class="ti ti-eye-off password-toggle-icon"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <span class="fw-medium">{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <div class="card-body">
                                <div class="form-floating position-relative form-password-toggle">
                                    <input type="password" id="confirm-password"
                                        class="form-control form-control-lg @error('confirm-password') is-invalid @enderror"
                                        name="confirm-password" placeholder="" />
                                    <label for="confirm-password">Confirm Password</label>
                                    <i class="ti ti-eye-off password-toggle-icon"></i>
                                    @error('confirm-password')
                                        <span class="invalid-feedback" role="alert">
                                            <span class="fw-medium">{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100 mb-6">
                            Set New Password
                        </button>
                        <div class="text-center">
                            <a href="{{ url('/') }}">
                                <i class="ti ti-chevron-left scaleX-n1-rtl me-1_5"></i>
                                Back to login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Reset Password -->
        </div>
    </div>
@endsection
