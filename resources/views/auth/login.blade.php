@extends('layouts.app')

@section('content')
<div class="col-xl-8 col-11 d-flex justify-content-center">
    <div class="card bg-authentication rounded-0 mb-0">
        <div class="row m-0">
            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                <img src="{{ asset('app-assets/images/pages/login.png') }}" alt="branding logo">
            </div>
            <div class="col-lg-6 col-12 p-0">
                <div class="card rounded-0 mb-0 px-2">
                    <div class="card-header pb-1">
                        <div class="card-title">
                            <h4 class="mb-0">@lang('global.login')</h4>
                        </div>
                    </div>
                    <p class="px-2">@lang('global.login_comment')</p>
                    <div class="card-content">
                        <div class="card-body pt-1">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                    <input placeholder="@lang('global.login_email')" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="form-control-position">
                                        <i class="feather icon-user"></i>
                                    </div>
                                    <label for="user-name">@lang('global.login_email')</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>

                                <fieldset class="form-label-group position-relative has-icon-left">
                                    <input id="password" placeholder="@lang('global.login_password')" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="form-control-position">
                                        <i class="feather icon-lock"></i>
                                    </div>
                                    <label for="user-password">@lang('global.login_password')</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <div class="text-left">
                                        <fieldset class="checkbox">
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">@lang('global.remember_me')</span>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="text-right">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" class="card-link">
                                            @lang('global.forgot_password')
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                @guest
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary float-left btn-inline">@lang('global.register')</a>
                                    @endif
                                @else
                                @endguest
                                <button type="submit" class="btn btn-primary float-right btn-inline">@lang('global.login')</button>
                            </form>
                        </div>
                    </div>
                    <div class="login-footer">
                        <div class="divider">
                            <div class="divider-text">OR</div>
                        </div>
                        <div class="footer-btn d-inline">
                            <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                            <!-- <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a> -->
                            <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                            <!-- <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection