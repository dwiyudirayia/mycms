@extends('layouts.appFormAdmin')
@section('isi')
<div class="m-login__body signin-padding-top">
  <div class="m-login__signin">
    <div class="m-login__title">
      <h3>Sign In To Admin</h3>
    </div>
    <!--begin::Form-->
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="form-group m-form__group">
        <div class="input-group file-input">                                    
          <input type="email" class="form-control m-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-group m-form__group">
        <div class="input-group file-input">                                    
          <input type="password" class="form-control m-input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
        </div>
      </div>
      <div class="row m-login__form-sub">
        <div class="col m--align-left">
          <label class="m-checkbox m-checkbox--solid m-checkbox--primary">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me                                        
            <span></span>
          </label>
        </div>
        <div class="col m--align-right">
          <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
        </div>
      </div>
      <div class="m-login__action justify-content-center">
        <button type="submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air" style="margin-right:30px;">Sign In</button>
        <a href="{{ url('register') }}" class="btn btn-metal m-btn m-btn--pill m-btn--custom m-btn--air">Register</a>
      </div>
    </form>
    <!--end::Form-->
  </div>
  <div class="m-login__signin" id="form-forgot-password">
    <div class="m-login__title">
      <h3>Forgotten Password ?</h3>
      <div class="m-login__desc">Enter your email to reset your password:</div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--state" action="">
      <div class="form-group m-form__group">
        <div class="input-group file-input">
          <input class="form-control m-input" type="email" placeholder="Email" name="email">
          <div class="input-group-append">
            <span class="input-group-text"><i class="la la-envelope"></i></span>
          </div>
        </div>
      </div>
      <div class="m-login__action justify-content-center">
        <button id="m_login_forget_password_submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air">Request</button>
        <button id="m_login_forget_password_cancel" class="btn btn-outline-danger m-btn m-btn--pill m-btn--custom">Cancel</button>
      </div>
      </form>
  </div>
  <div class="m-login__account">
      <span>© 2019</span>
      <a href="#" class="m-link m--font-primary">WebClient</a>
  </div>

  <!--end::Signin-->
</div>    
@endsection

