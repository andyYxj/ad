@extends('layouts/admin')
@section('content')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户管理页
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">用户管理</a></li>
            <li class="active">新增用户</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">新增用户</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form  action="{{url("/admin/add_user_info")}}" class="form-horizontal">

                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                @if(session('msg'))
                                    <div class="col-sm-10">
                                        {{session('msg')}}
                                    </div>
                                @endif
                                </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>

                                <div class="col-sm-10">
                                    <input type="user" name="username"  class="form-control" id="inputEmail3" placeholder="请输入用户名...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3"  class="col-sm-2 control-label">密码 &nbsp &nbsp</label>

                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword3"
                                           placeholder="请输入密码...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">角色选择</label>
                                <div class="col-sm-10">
                                    <select name="role_id" class="form-control select2" style="width: 100%;background-color: ">
                                        @foreach($roles as $role){
                                        <option selected="selected"  value="{{$role->role_id}}">{{$role->role_name}}</option>
                                        }
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default pull-right">取消</button>
                            <button type="submit" class="btn btn-info pull-right">新增</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

