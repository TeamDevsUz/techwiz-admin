@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('cruds.permission.title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item active">@lang('cruds.permission.title')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('cruds.permission.title_singular')</h3>
                        @can('permission.add')
                        <a href="{{ route('permissionAdd') }}" class="btn btn-success waves-effect waves-light float-right">
                            <i class="feather icon-plus mr-1"></i>
                            @lang('global.add')
                        </a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <!-- Data table -->
                            <div class="table-responsive">
                                <table class="table zero-configuration table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>@lang('cruds.permission.fields.id')</th>
                                        <th>@lang('cruds.permission.fields.name')</th>
                                        <th>@lang('cruds.permission.fields.title')</th>
                                        <th>@lang('cruds.permission.fields.roles')</th>
                                        <th class="w-25">@lang('global.actions')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->title }}</td>
                                            <td>
                                                @foreach($permission->roles as $role)
                                                    <span class="badge badge-success">{{ $role->name }} </span>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @can('permission.delete')
                                                <form action="{{ route('permissionDestroy',$permission->id) }}" method="post">
                                                    @csrf
                                                    <div class="btn-group">
                                                        @can('permission.edit')
                                                        <a href="{{ route('permissionEdit',$permission->id) }}" type="button" class="btn btn-info"> @lang('global.edit')</a>
                                                        @endcan
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="button" class="btn btn-danger" onclick="if (confirm('Вы уверены?')) {this.form.submit()}"> @lang('global.delete')</button>
                                                    </div>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
