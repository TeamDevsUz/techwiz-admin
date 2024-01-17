@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('cruds.userManagement.title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('userIndex') }}">@lang('cruds.user.title')</a></li>
                        <li class="breadcrumb-item active">@lang('global.add')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="user-add">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('global.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('userCreate') }}" method="post">
                            @csrf
                            <fieldset class="form-group">
                                <label for="name">@lang('cruds.user.fields.name')</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="@lang('cruds.user.fields.name')" value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="email">@lang('cruds.user.fields.email')</label>
                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="@lang('cruds.user.fields.email')" value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </fieldset>

                            <div class="form-group">
                                <label>@lang('cruds.role.fields.roles')</label>
                                <select class="select2 form-control" multiple="multiple" id="select2-theme" name="roles[]" data-placeholder="@lang('pleaseSelect')" style="width: 100%;">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <fieldset class="form-group position-relative input-divider-right">
                                <label>@lang('cruds.user.fields.password')</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password-field" placeholder="@lang('cruds.user.fields.password')" required>
                                <span style="top: 20px; right: 4px; z-index: 10;" onclick="togglePassword('password-field', 'toggle-icon-1')" class="form-control-position cursor-pointer">
                                    <i id="toggle-icon-1" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </span>
                                @if($errors->has('password'))
                                    <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                @endif
                            </fieldset>

                            <fieldset class="form-group position-relative input-divider-right">
                                <label>@lang('global.login_password_confirmation')</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirm-field" placeholder="@lang('global.login_password_confirmation')" autocomplete="new-password" required>
                                <span style="top: 20px; right: 4px; z-index: 10;" onclick="togglePassword('password-confirm-field', 'toggle-icon-2')" class="form-control-position cursor-pointer">
                                    <i id="toggle-icon-2" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </span>
                                @if($errors->has('password_confirmation'))
                                    <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </fieldset>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('userIndex') }}" class="btn btn-outline-dark waves-effect waves-light float-left">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

