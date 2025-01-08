@php
    use Illuminate\Support\Facades\Route;
    $configData = Helper::appClasses();
    $customizerHidden = 'customizer-hide';
    $configData = Helper::appClasses();
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login')

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

@section('page-style')
    <!-- Page -->
    @vite('resources/assets/vendor/scss/pages/page-auth.scss')
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
                    <img src="{{ asset('assets/img/illustrations/auth-login-illustration-' . $configData['style'] . '.png') }}"
                        alt="auth-login-cover" class="my-5 auth-illustration"
                        data-app-light-img="illustrations/auth-login-illustration-light.png"
                        data-app-dark-img="illustrations/auth-login-illustration-dark.png">

                    <img src="{{ asset('assets/img/illustrations/bg-shape-image-' . $configData['style'] . '.png') }}"
                        alt="auth-login-cover" class="platform-bg"
                        data-app-light-img="illustrations/bg-shape-image-light.png"
                        data-app-dark-img="illustrations/bg-shape-image-dark.png">
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6">
                <div class="w-px-400 mx-auto mt-12 pt-5">
                    <h4 class="mb-1">Welcome to {{ config('variables.templateName') }}! 👋</h4>
                    <p class="mb-6">Please sign-in to your account and start the adventure</p>

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

                    <form id="formAuthentication" class="mb-6" action="{{ route('post-login') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <div class="card-body">
                                <div class="form-floating">
                                    <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="login-email" type="email" name="email" placeholder="" autofocus
                                        value="{{ old('email') }}" />
                                    <label for="login-email">Email</label>


                                    @error('email')
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
                                    <input type="password" id="login-password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" placeholder="" />
                                    <label for="login-password">Password</label>
                                    <i class="ti ti-eye-off password-toggle-icon"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <span class="fw-medium">{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="my-8">
                            <div class="d-flex justify-content-between">
                                <div class="form-check mb-0 ms-2">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('auth-forgot-password-cover') }}">
                                        <p class="mb-0">Forgot Password?</p>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>

                        <a href="{{ route('auth-register-multisteps') }}"><u><span>Create an account</span></u></a>


                    </p>
                    <a href="{{ route('auth-register-multisteps') }}" class="btn btn-primary w-100">Register</a>
                    {{-- <div class="divider my-6">
                        <div class="divider-text">or</div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-facebook me-1_5">
                            <i class="tf-icons ti ti-brand-facebook-filled"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-twitter me-1_5">
                            <i class="tf-icons ti ti-brand-twitter-filled"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-github me-1_5">
                            <i class="tf-icons ti ti-brand-github-filled"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-google-plus">
                            <i class="tf-icons ti ti-brand-google-filled"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>

    @include('layouts/sections/footer/footer')

@endsection
