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
                    <div class="input-group margin col-md-5 ">
                        <input type="text" id="app_name" class="form-control"  placeholder="按应用名称搜索">
                    <span class="input-group-btn">
                      <button type="button" id="app_search"  class="btn btn-info btn-flat">搜索</button> &nbsp &nbsp &nbsp
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
                                <td>{{$appinfo->app_name}}</td>
                                <td>{{$appinfo->app_remark}}</td>
                                <td>{{$appinfo->create_time}}</td>
                                <td>{{$appinfo->update_time}} </td>
                                <td><a href=" {{'/admin/add_adPosition/' }}{{$appinfo->app_id}}">添加广告位</a></td>
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

                    {!! $appInfo->links() !!}
                    {{--<div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" id="example2_previous">
                                    <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">上一页</a>
                                </li>
                                <li class="paginate_button active">
                                    <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a>
                                </li>
                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a>
                                </li>
                                <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">下一页</a>
                                </li>
                            </ul>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection


<script type="text/javascript" src="{{ asset('/public/admin/js/jquery-1.8.2.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#app_search").click(function(){
            var app_name=$("#app_name").val();
    /*        var url='{{url("/admin/app_manage/")}}';

            $.get("url", function(result){
                alert(12);
                location.href='{{url("/admin/app_manage/")}}/'+app_name;
            });*/

             location.href='{{url("/admin/app_manage/")}}/'+app_name;
        });
    });
</script>

