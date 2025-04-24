{{-- resources/views/auth/reset-password.blade.php --}}
@extends('auth.app')

@section('title', 'Reset Password')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{ asset('assets') }}/images/logo png.png" alt="logo" width="250" height="50">
                        </div>
                        <h4>Reset Your Password</h4>
                        <h6 class="font-weight-light">Set a new password for your account.</h6>
                        <form class="pt-3" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" placeholder="Email" name="email" id="email" value="{{ old('email', $email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror form-control-lg" placeholder="New Password" name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror form-control-lg" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Reset Password</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                <a href="{{ route('login') }}" class="text-primary">Back to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
