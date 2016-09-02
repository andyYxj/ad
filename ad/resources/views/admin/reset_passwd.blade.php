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
            <li class="active">密码重置</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">密码重置</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form  action="{{url("/admin/reset_password")}}" class="form-horizontal">

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
                                <label for="inputEmail3" class="col-sm-2 control-label">原密码</label>

                                <div class="col-sm-10">
                                    <input type="user" name="old_passwd"  class="form-control" id="inputEmail3" placeholder="请输入原密码...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3"  class="col-sm-2 control-label">新密码 &nbsp &nbsp</label>

                                <div class="col-sm-10">
                                    <input type="password" name="new_passwd" class="form-control" id="inputPassword3"
                                           placeholder="请输入新密码...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3"  class="col-sm-2 control-label">确认新密码</label>

                                <div class="col-sm-10">
                                    <input type="password" name="new_passwd_again" class="form-control" id="inputPassword3"
                                           placeholder="确认新密码...">
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default pull-right">取消</button>
                            <button type="submit" class="btn btn-info pull-right">确定</button>
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

