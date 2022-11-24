@extends('layout.layout')

@section('content')

<div class="container">
    <div class="mobile-form-container">
        <div class="well">
            <div class="well__header">
                <div class="well__heading">Login with email</div>
            </div>

            <form>
                <div class="mb-3">
                    <label for="login-email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="login-email" name="login-email" placeholder="john@domain.com">
                </div>

                <div class="mb-1">
                    <label for="login-password" class="form-label">Password</label>
                    <input type="password" class="form-control is-invalid" id="login-password" name="login-password" placeholder="Your password">
                    <div class="invalid-feedback">
                        Please try again
                    </div>
                </div>

                <div class="mb-4">
                    <a href="#" class="fs-xs text-info link-underline--info">Forgot your password?</a>
                </div>

                <div class="d-flex">
                    <button href="#" class="btn btn-secondary me-2 flex-grow-1" disabled>Login</button>
                    <a href="#" class="btn btn-outline-secondary flex-grow-1 ms-2">Register</a>
                </div>

                <div class="pt-3 pb-3">
                    <div class="hr-text"><span>or</span></div>
                </div>

                <div class="d-flex flex-column">
                    <a href="#" class="btn btn-info mb-2"><i class="icon-facebook"></i>Use Facebook</a>
                    <a href="#" class="btn btn-tertiary"><i class="icon-google"></i>Use Google</a>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center mt-4 mb-4">
            <a href="#" class="me-2 text-info link-underline--info">Cymraeg</a>
            <a href="#" class="fw-bold ms-2 text-info link-clean--info">English</a>
        </div>
    </div>
</div>

@endsection