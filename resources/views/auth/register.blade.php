@extends('layouts.appFormAdmin')
@section('title')
    Register
@endsection
@section('isi')
<div class="m-login__body signin-padding-top">
    <div class="m-login__signin">
        <div class="m-login__title">
            <h3>Register</h3>
        </div>
        <!--begin::Form-->
        <form action="{{ url('register') }}" method="POST">
            @csrf
            <div class="form-group m-form__group">
                <div class="input-group file-input">                                    
                    <input type="text" class="form-control m-input {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus placeholder="Username">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="input-group file-input">                                    
                    <input type="email" class="form-control m-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
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
            <div class="form-group m-form__group">
                <div class="input-group file-input">                                    
                    <input type="password" class="form-control m-input {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required placeholder="Confirm Password">
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="m-login__action justify-content-center">
                <button type="submit" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--air" style="margin-right:30px;">Register</button>                
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
@endsection
