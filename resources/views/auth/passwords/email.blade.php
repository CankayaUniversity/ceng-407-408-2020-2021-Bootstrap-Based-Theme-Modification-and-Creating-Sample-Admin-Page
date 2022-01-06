@extends('layouts/fullLayoutMaster')

@section('content')
<div class="auth-wrapper auth-basic px-2" style="max-width:500px; margin: 0 auto; margin-top: 10vh;">
    <div class="auth-inner my-2">
        <!-- Login basic -->
        <div class="card mb-0">
            <div class="card-body p-4">
                <h4 class="card-title mb-1 text-center">Forgot Password? 🔒
                </h4>
                <p class="card-text mb-2 text-center">Enter your email and we'll send you instructions to reset your password</p>

                <form class="auth-login-form mt-2" action="{{ route('password.email') }}" method="POST" novalidate="novalidate" data-bitwarden-watching="1">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="mb-1">
                        <label for="login-email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus="" control-id="ControlID-1" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <button class="btn btn-primary w-100 waves-effect waves-float waves-light" tabindex="4" control-id="ControlID-4">Sign in</button>
                </form>

                <p class="text-center mt-2">
                    <a href="/login">
                        <span>Back to login</span>
                    </a>
                </p>


            </div>
        </div>
        <!-- /Login basic -->
    </div>
</div>
@endsection