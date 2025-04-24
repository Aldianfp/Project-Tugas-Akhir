@extends('auth.app')

@section('title', 'Show Password')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="250" height="50">
                        </div>
                        <h4>Current Password</h4>
                        <h6 class="font-weight-light">Below is your current password.</h6>
                        <div class="form-group">
                            <label for="current-password">Current Password</label>
                            <input type="text" class="form-control form-control-lg" id="current-password" value="{{ $password }}" readonly>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            <a href="{{ route('login') }}" class="text-primary">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
