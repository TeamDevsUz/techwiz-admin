@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>API @lang('cruds.user.title') TOKEN</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                            <li class="breadcrumb-item active">API-@lang('cruds.user.title') TOKEN</li>
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
                            <h3 class="card-title">@lang('cruds.user.title_singular') TOKEN</h3>
                            @can('user.add')
                            <a href="{{ route('api-userAdd') }}" class="btn btn-success waves-effect waves-light float-righ">
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
                                        <tr class="text-center">
                                            <th>Username</th>
                                            <th>Token</th>
                                            <th>Token Expire Date</th>
                                            <th>Activate</th>
                                            <th style="width: 10px">@lang('global.actions')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tokens as $token)
                                            <tr class="text-center">
                                                <td>
                                                    {{ $token->user->name }}
                                                </td>
                                                <td>{{ $token->token }}</td>
                                                <td>{{ $token->token_expires_at ?? '-' }}</td>
                                                <td class="text-center">
                                                    <i style="cursor: pointer" id="api_user_{{$token->id}}" class="fas {{ $token->is_active ? "fa-check-circle text-success":"fa-times-circle text-danger" }}"
                                                       @can('api-user.edit') onclick="toggle_api_user({{ $token->id }})" @endcan ></i>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('api-tokenDestroy',$token->id) }}" method="post">
                                                        @csrf
                                                        <div class="btn-group">
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="button" class="btn btn-danger" onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </form>
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
@section('scripts')
    <script>
        function showPassword(id){
            $("#hidden_"+id).hide();
            $("#password_"+id).show();
        }

        function hidePassword(id){
            $("#hidden_"+id).show();
            $("#password_"+id).hide();
        }
        function toggle_api_user(id){
            $.ajax({
                url: "/api/api-token/toggle-status/"+id,
                type: "POST",
                data:{
                    _token: '{!! auth()->user()->password !!}'
                },
                dataType: "JSON",
                success: function(result){
                    if (result.is_active == 1){
                        $('#api_user_'+id).attr('class',"fas fa-check-circle text-success");
                    }else{
                        $('#api_user_'+id).attr('class',"fas fa-times-circle text-danger");
                    }

                },
                error: function (errorMessage){
                    console.log(errorMessage)
                }
            });
        }
    </script>
@endsection
