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
                        <h3 class="box-title">应用列表</h3>
                    </div>
                    <div class="input-group margin col-md-4 ">
                        <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">搜索</button> &nbsp &nbsp &nbsp
                        <a  href="{{url('/admin/add_app')}}"><button type="button" id="addApp" class="btn btn-info btn-flat">添加应用</button></a>
                    </span>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>应用名称</th>
                                <th>应用备注</th>
                                <th>添加时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appInfo as $appinfo)
                            <tr>
                                <td>{{$appinfo['app_name']}}</td>
                                <td>{{$appinfo['app_remark']}}</td>
                                <td>{{$appinfo['create_time']}}</td>
                                <td>{{$appinfo['update_time']}} </td>
                                <td><a>添加广告位</a></td>
                            </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>应用名称</th>
                                <th>应用备注</th>
                                <th>添加时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

{{--<!--js-->
<script type="text/javascript" src="{{ asset('/public/admin/js/jquery-1.8.2.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#addApp").click(function(){
           location.href('{{url('/admin/add_app')}}}');
           // alert(123);
        });
    });
</script>--}}

