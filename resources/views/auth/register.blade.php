@extends('layouts.app')

@section('content')
<div class="col-xl-8 col-10 d-flex justify-content-center">
    <div class="card bg-authentication rounded-0 mb-0">
        <div class="row m-0">
            <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                <img src="{{ asset('app-assets/images/pages/register.jpg') }}" alt="branding logo">
            </div>
            <div class="col-lg-6 col-12 p-0">
                <div class="card rounded-0 mb-0 p-2">
                    <div class="card-header pt-50 pb-1">
                        <div class="card-title">
                            <h4 class="mb-0">@lang('global.register')</h4>
                        </div>
                    </div>
                    <p class="px-2">@lang('global.register_comment')</p>
                    <div class="card-content">
                        <div class="card-body pt-0">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-label-group">
                                    <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="@lang('global.first_name') @lang('global.last_name')" autocomplete="name" autofocus required>
                                    <label for="inputName">@lang('global.first_name') @lang('global.last_name')</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-label-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="@lang('global.login_email')" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email">@lang('global.login_email')</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-label-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="@lang('global.login_password')" name="password" required autocomplete="new-password">
                                    <label for="password">@lang('global.login_password')</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-label-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('global.login_password_confirmation')" required autocomplete="new-password">
                                    <label for="password-confirm">@lang('global.login_password_confirmation')</label>
                                </div>

                                <!-- <div class="form-group row">
                                    <div class="col-12">
                                        <fieldset class="checkbox">
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" checked>
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class=""> I accept the terms & conditions.</span>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div> -->
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary float-left btn-inline mb-50">@lang('global.login')</a>
                                @endguest
                                <button type="submit" class="btn btn-primary float-right btn-inline mb-50">@lang('global.register')</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
