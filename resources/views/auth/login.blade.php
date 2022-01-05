@extends('layouts/fullLayoutMaster')

@section('content')
<div class="auth-wrapper auth-basic px-2" style="max-width:500px; margin: 0 auto; margin-top: 10vh;">
  <div class="auth-inner my-2">
    <!-- Login basic -->
    <div class="card mb-0">
      <div class="card-body p-4">
        <h4 class="card-title mb-1 text-center">Welcome to SRMAV! 👋</h4>
        <p class="card-text mb-2 text-center">Please sign-in to your account and start the adventure</p>

        <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST" novalidate="novalidate" data-bitwarden-watching="1">
        @csrf  
        <div class="mb-1">
            <label for="login-email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus="" control-id="ControlID-1" value="{{ old('email') }}">
            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
        </div>

          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Password</label>
              <a href="{{ route('password.request') }}">
                <small>Forgot Password?</small>
              </a>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="login-password" name="password" tabindex="2" placeholder="············" aria-describedby="login-password" control-id="ControlID-2">
              <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" name="remember" type="checkbox" id="remember-me" tabindex="3" control-id="ControlID-3">
              <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
          </div>
          <button class="btn btn-primary w-100 waves-effect waves-float waves-light" tabindex="4" control-id="ControlID-4">Sign in</button>
        </form>

        <p class="text-center mt-2">
          <span>New on our platform?</span>
          <a href="/register">
            <span>Create an account</span>
          </a>
        </p>

        
      </div>
    </div>
    <!-- /Login basic -->
  </div>
</div>
@endsection
