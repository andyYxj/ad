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
            <div class="col-md-10">
                <!-- Horizontal Form -->
                <div class="box box-info">

                    <div class="box-body">
                        <form  action="{{url('/admin/add_adPositionInfo')}}" class="form-horizontal">

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
                                    <label for="inputPassword3"  class="col-sm-2 control-label">广告位名称</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="ad_position_name"   class="form-control " id="inputPassword3"
                                               placeholder="广告位名称...">
                                    </div>
                                    <input type="hidden" name="app_id"  value="{{$app_id}}">
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">广告位类型</label>
                                    <div class="col-sm-10">
                                       <select name="adType_id" class="form-control select2" style="width: 100%;background-color: ">
                                            @foreach($ad_type as $type){
                                            <option selected="selected"  value="{{$type->aT_id}}">{{$type->ad_type}}</option>
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

                        <div class="box-header with-border">
                            <h3 class="box-title">广告位列表</h3>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>广告位id</th>
                                <th>广告位名称</th>
                                <th>广告位类型</th>
                                <th>增加时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ad_info as $ad_infos)
                                <tr>
                                    <td>{{$ad_infos->ad_position_id}}</td>
                                    <td>{{$ad_infos->ad_position_name}}</td>
                                    <td>{{$ad_infos->ad_type}}</td>
                                    <td>{{$ad_infos->create_time}}</td>
                                    <td>{{$ad_infos->update_time}} </td>
                                    <td><a href="{{'/admin/del_adPosition/'}}{{$ad_infos->appAd_id}}">删除</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $ad_info->links() !!}
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

