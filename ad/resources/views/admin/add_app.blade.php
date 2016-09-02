@extends('layouts/admin')
@section('content')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            应用管理
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">应用管理</a></li>
            <li class="active">应用列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">新增应用</h3>
                    </div>
                    <form  action="{{url("/admin/add_app_info")}}" class="form-horizontal">

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
                            <label for="inputEmail3" class="col-sm-2 control-label">应用名称</label>

                            <div class="col-sm-10">
                                <input type="user" name="appName"  class="form-control" id="inputEmail3" placeholder="请输入应用名称...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">应用备注</label>

                            <div class="col-sm-10">
                                <input type="user" name="appRemark"  class="form-control" id="inputEmail3" placeholder="请输入应用备注...(例如:app内banner展示)">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default pull-right">取消</button>
                        <button type="submit" class="btn btn-info pull-right">新增</button>
                    </div>
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


