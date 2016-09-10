@extends('layouts/admin')
@section('content')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            账户信息
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">应用数据汇总</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">应用数据汇总</h3>
                    </div>

                    <div class="box-body">

                        <div class="page-content">
                            <!-- BEGIN PAGE CONTAINER-->
                            <div class="container-fluid">
                                <div class="row-fluid" style="margin-top:5px">
                                    <div class="span4">
                                        <div class="control-group">
                                            <label class="control-label">
                                                日期：
                                            </label>
                                            <div class="controls">
                                                <div id="reportrange" class="pull-left dateRange" style="width:350px">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    <span id="searchDateRange"></span>
                                                    <b class="caret"></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                   </div>

<!--以下内容要合并在一起，否则js冲突报错-->
                        <!--日历插件js相关-->

                        <link href="{{asset('/public/daterangepicker/bootstrap.min.css')}}" rel="stylesheet">
                        <link rel="stylesheet" type="text/css" media="all" href="{{asset('/public/daterangepicker/daterangepicker-bs3.css')}}"/>
                        <link rel="stylesheet" type="text/css" media="all" href="{{asset('/public/daterangepicker/daterangepicker-1.3.7.css')}}"/>
                        <link href="{{asset('/public/daterangepicker/font-awesome-4.1.0/css/font-awesome.min.css')}}" rel="stylesheet">


                        <script type="text/javascript" src="{{asset('/public/daterangepicker/jquery-1.10.1.min.js')}}"></script>
                        <script type="text/javascript" src="{{asset('/public/daterangepicker/bootstrap.min.js')}}"></script>
                        <script type="text/javascript" src="{{asset('/public/daterangepicker/moment.js')}}"></script>
                        <script type="text/javascript" src="{{asset('/public/daterangepicker/daterangepicker-1.3.7.js')}}"></script>
                        <!--日历插件 js结束-->

                        <script type="text/javascript">
                              var  jq=jQuery.noConflict(true);
                              jq(document).ready(function (){
                                  //时间插件
                                  jq('#reportrange span').html(moment().subtract('hours', 1).format('YYYY-MM-DD HH:mm:ss') + ' - ' + moment().format('YYYY-MM-DD HH:mm:ss'));

                                  jq('#reportrange').daterangepicker(
                                          {
                                              // startDate: moment().startOf('day'),
                                              //endDate: moment(),
                                              //minDate: '01/01/2012',	//最小时间
                                              maxDate : moment(), //最大时间
                                              dateLimit : {
                                                  days : 30
                                              }, //起止时间的最大间隔
                                              showDropdowns : true,
                                              showWeekNumbers : false, //是否显示第几周
                                              timePicker : true, //是否显示小时和分钟
                                              timePickerIncrement : 60, //时间的增量，单位为分钟
                                              timePicker12Hour : false, //是否使用12小时制来显示时间
                                              ranges : {
                                                  //'最近1小时': [moment().subtract('hours',1), moment()],
                                                  '今日': [moment().startOf('day'), moment()],
                                                  '昨日': [moment().subtract('days', 1).startOf('day'), moment().subtract('days', 1).endOf('day')],
                                                  '最近7日': [moment().subtract('days', 6), moment()],
                                                  '最近30日': [moment().subtract('days', 29), moment()]
                                              },
                                              opens : 'right', //日期选择框的弹出位置
                                              buttonClasses : [ 'btn btn-default' ],
                                              applyClass : 'btn-small btn-primary blue',
                                              cancelClass : 'btn-small',
                                              format : 'YYYY-MM-DD HH:mm:ss', //控件中from和to 显示的日期格式
                                              separator : ' to ',
                                              locale : {
                                                  applyLabel : '确定',
                                                  cancelLabel : '取消',
                                                  fromLabel : '起始时间',
                                                  toLabel : '结束时间',
                                                  customRangeLabel : '自定义',
                                                  daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
                                                  monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月',
                                                      '七月', '八月', '九月', '十月', '十一月', '十二月' ],
                                                  firstDay : 1
                                              }
                                          }, function(start, end, label) {//格式化日期显示框

                                              jq('#reportrange span').html(start.format('YYYY-MM-DD HH:mm:ss') + ' - ' + end.format('YYYY-MM-DD HH:mm:ss'));
                                              //alert( start.format('YYYY-MM-DD HH:mm:ss') + ' - ' + end.format('YYYY-MM-DD HH:mm:ss') );
                                              //此处执行回调函数 ajax请求
                                          });

                                  //设置日期菜单被选项  --开始--
                                  var dateOption ;
                                  if("jq{riqi}"=='day') {
                                      dateOption = "今日";
                                  }else if("jq{riqi}"=='yday') {
                                      dateOption = "昨日";
                                  }else if("jq{riqi}"=='week'){
                                      dateOption ="最近7日";
                                  }else if("jq{riqi}"=='month'){
                                      dateOption ="最近30日";
                                  }else if("jq{riqi}"=='year'){
                                      dateOption ="最近一年";
                                  }else{
                                      dateOption = "自定义";
                                  }
                                  jq(".daterangepicker").find("li").each(function (){
                                      if(jq(this).hasClass("active")){
                                          jq(this).removeClass("active");
                                      }
                                      if(dateOption==jq(this).html()){
                                          jq(this).addClass("active");
                                      }
                                  });


                                  //设置日期菜单被选项  --结束--
                              })
                          </script>
                        <!--以上内容要合并在一起，否则js冲突报错-->


                        <!--  数据统计图表部分 开始-->
                                <div id="main" style="height:600px"></div>
                                <!-- ECharts单文件引入 -->
                                 <script src="{{asset('/public/echarts-2.2.7/build/dist/echarts.js')}}"></script>
                                 <script type="text/javascript">

                            /*图表部分js*/
                            // var adData = new Array();

                            /*     $(document).ready(function(){
                             $.ajax({
                             url : '',
                             type : 'POST',
                             dataType : 'json',
                             async : false,
                             success : function(data) {

                             }
                             });

                             });*/




                            /* 路径配置*/
                            require.config({
                                paths: {
                                    echarts: '{{asset('/public/echarts-2.2.7/build/dist/')}}'
                                }
                            });

                             /*使用*/
                            require(
                                    [
                                        'echarts',
                                        'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
                                    ],
                                    function (ec) {
                                        // 基于准备好的dom，初始化echarts图表
                                        var myChart = ec.init(document.getElementById('main'));

                                        var option = {
                                            tooltip: {
                                                trigger: 'axis'
                                            },
                                            title:{
                                                show:true,
                                                name: '数据统计',
                                            },
                                            legend: {
                                                data: ['总收入', '展现次数', '点击数', '点击率', '每千次展现收入']
                                            },
                                            grid: {
                                                left: '3%',
                                                right: '4%',
                                                bottom: '3%',
                                                containLabel: true
                                            },
                                            toolbox: {
                                                show: true,
                                                feature: {
                                                    mark: {show: true},
                                                    dataView: {show: true, readOnly: false},
                                                    magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                                                    restore: {show: true},
                                                    saveAsImage: {show: true}
                                                }
                                            },
                                            calculable: true,
                                            xAxis: [
                                                {
                                                    type: 'category',
                                                    boundaryGap: false,
                                                    data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
                                                }
                                            ],
                                            yAxis: [
                                                {
                                                    type : 'value',
                                                    position: 'left',
                                                    name : '(元)',
                                                    axisLine : {    // 轴线
                                                        show: true,
                                                        lineStyle: {
                                                            color: 'red',
                                                            type: 'dashed',
                                                            width: 2
                                                        }
                                                    },

                                                },{
                                                    type : 'value',
                                                    position:'right',
                                                    name: '次数',
                                                        axisLabel: {
                                                            formatter: function (value) {
                                                                // Function formatter
                                                                return value + '次'
                                                            }
                                                        },
                                                        splitLine: {
                                                            show: false
                                                        }
                                                    }


                                            ],
                                            series: [
                                                {
                                                    name: '总收入',
                                                    type: 'line',

                                                    data: [120, 132, 101, 134, 90, 230, 210]
                                                },
                                                {
                                                    name: '展现次数',
                                                    type: 'line',

                                                    yAxisIndex:1,
                                                    data: [220, 182, 191, 234, 290, 330, 310]
                                                },
                                                {
                                                    name: '点击数',
                                                    type: 'line',

                                                    yAxisIndex:1,
                                                    data: [150, 232, 201, 154, 190, 330, 410]
                                                },
                                                {
                                                    name: '点击率',
                                                    type: 'line',

                                                    yAxisIndex:1,
                                                    data: [320, 332, 301, 334, 390, 330, 320]
                                                },
                                                {
                                                    name: '每千次展现收入',
                                                    type: 'line',

                                                    data: [820, 932, 901, 934, 1290, 1330, 1320]
                                                }
                                            ]
                                        };//异步加载的时候注释本option
                                   /*     // 异步加载数据
                                        $.get('data.json').done(function (data) {
                                            // 填入数据
                                            myChart.setOption({

                                    tooltip: {
                                    trigger: 'axis'
                                    },
                                    title:{
                                    show:true,
                                    name: '数据统计',
                                    },
                                    legend: {
                                    data: ['总收入', '展现次数', '点击数', '点击率', '每千次展现收入']
                                    },
                                    grid: {
                                    left: '3%',
                                    right: '4%',
                                    bottom: '3%',
                                    containLabel: true
                                    },
                                    toolbox: {
                                    show: true,
                                    feature: {
                                    mark: {show: true},
                                    dataView: {show: true, readOnly: false},
                                    magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                                    restore: {show: true},
                                    saveAsImage: {show: true}
                                    }
                                    },
                                    calculable: true,
                                    xAxis: [
                                    {
                                    type: 'category',
                                    boundaryGap: false,
                                    data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
                                    }
                                    ],
                                    yAxis: [
                                    {
                                    type : 'value',
                                    position: 'left',
                                    name : '(元)',
                                    axisLine : {    // 轴线
                                    show: true,
                                    lineStyle: {
                                    color: 'red',
                                    type: 'dashed',
                                    width: 2
                                    }
                                    },

                                    },{
                                    type : 'value',
                                    position:'right',
                                    name: '次数',
                                    axisLabel: {
                                    formatter: function (value) {
                                    // Function formatter
                                    return value + '次'
                                    }
                                    },
                                    splitLine: {
                                    show: false
                                    }
                                    }


                                    ],
                                    series: [
                                    {
                                    name: '总收入',
                                    type: 'line',

                                    data: [120, 132, 101, 134, 90, 230, 210]
                                    },
                                    {
                                    name: '展现次数',
                                    type: 'line',

                                    yAxisIndex:1,
                                    data: [220, 182, 191, 234, 290, 330, 310]
                                    },
                                    {
                                    name: '点击数',
                                    type: 'line',

                                    yAxisIndex:1,
                                    data: [150, 232, 201, 154, 190, 330, 410]
                                    },
                                    {
                                    name: '点击率',
                                    type: 'line',

                                    yAxisIndex:1,
                                    data: [320, 332, 301, 334, 390, 330, 320]
                                    },
                                    {
                                    name: '每千次展现收入',
                                    type: 'line',

                                    data: [820, 932, 901, 934, 1290, 1330, 1320]
                                    }
                                    ]
                                    };


                                            });
                                        });*/


                                        // 为echarts对象加载数据
                                        myChart.setOption(option);
                                    }
                            );
                        </script>
                            <!--  数据统计图表部分 结束-->

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




