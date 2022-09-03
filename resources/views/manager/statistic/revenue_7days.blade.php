@extends('manager.master')
@section('content')
    @push('custom-style')
        <link href="{{ asset('css/britecharts.min.css') }}" rel="stylesheet" type="text/css"/>

    @endpush
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">Bar Chart


            </h4>
            <div class="bar-container" style="width: 100%;height: 300px;" data-colors="#3688fc">
            </div>
        </div>

        <!-- end card body-->
    </div>

    @push('custom-scripts')
        <script src="{{ asset('js/d3.min.js') }}"></script>
        <script src="{{ asset('js/britecharts.min.js') }}"></script>
{{--    <script src="{{ asset('js/demo.britechart.js') }}"></script>--}}
    @endpush

    <script>
        <?php
        $d = array();
        for($i = 0; $i < 7; $i++)
            $d[] = date("d/m", strtotime('-'. $i .' days'));
        ?>

        var briteChartApp=window.briteChartApp||{};!function(i,e){var c=["#727cf5","#0acf97","#6c757d","#fa5c7c","#ffbc00","#39afd1","#e3eaef"];e.createBarChart=function(e,t){var a=i(e).data("colors"),l=a?a.split(","):c.concat(),n=new britecharts.miniTooltip,u=new britecharts.bar,o=d3.select(e),r=!!o.node()&&o.node().getBoundingClientRect().width,d=!!o.node()&&o.node().getBoundingClientRect().height;u.isAnimated(!0).width(r).height(d).margin({top:10,left:55,bottom:20,right:10}).betweenBarsPadding(.5).colorSchema(l).on("customMouseOver",n.show).on("customMouseMove",n.update).on("customMouseOut",n.hide),o.datum(t).call(u),d3.select(e+" .metadata-group").datum([]).call(n)},e.createHorizontalBarChart=function(e,t){var a=i(e).data("colors"),l=a?a.split(","):c.concat(),n=new britecharts.bar,u=d3.select(e),o=!!u.node()&&u.node().getBoundingClientRect().width,r=!!u.node()&&u.node().getBoundingClientRect().height;n.colorSchema(l).isAnimated(!0).isHorizontal(!0).width(o).margin({top:10,left:50,bottom:20,right:10}).enableLabels(!0).percentageAxisToMaxRatio(1.3).labelsNumberFormat(1).height(r),u.datum(t).call(n)},e.createLineChart=function(e,t){var a=new britecharts.line,l=new britecharts.tooltip,n=d3.select(e),u=!!n.node()&&n.node().getBoundingClientRect().width;a.isAnimated(!0).aspectRatio(.7).tooltipThreshold(100).grid("horizontal").width(u).dateLabel("date").valueLabel("value").on("customMouseOver",l.show).on("customMouseMove",l.update).on("customMouseOut",l.hide),l.title("Sample Data"),n.datum(t).call(a),d3.select(e+" .metadata-group .hover-marker").datum([]).call(l)},e.createDonutChart=function(e,t){var a=i(e).data("colors"),l=a?a.split(","):c.concat(),n=britecharts.donut(),u=britecharts.legend();u.width(250).height(200).colorSchema(l).numberFormat("s"),n.height(300).highlightSliceById(3).colorSchema(l).hasFixedHighlightedSlice(!0).internalRadius(80).on("customMouseOver",function(e){u.highlight(e.data.id)}).on("customMouseOut",function(){u.clearHighlight()}),d3.select(e).datum(t).call(n),d3.select(".legend-chart-container").datum(t).call(u)},e.createBrushChart=function(e,t){var a=d3.select(e),l=britecharts.brush(),n=!!a.node()&&a.node().getBoundingClientRect().width;l.height(320).width(n).on("customBrushStart",function(e){var t=d3.timeFormat("%m/%d/%Y");console.log("Start date = "+t(e[0])),console.log("End date = "+t(e[1]))}).on("customBrushEnd",function(e){console.log("rounded extent",e)}),a.datum(t).call(l),l.dateRange(["9/15/2015","1/25/2016"])},e.createStepChart=function(e,t){var a=britecharts.step(),l=britecharts.miniTooltip(),n=d3.select(e),u=!!n.node()&&n.node().getBoundingClientRect().width;a.width(u).height(320).margin({top:40,right:40,bottom:80,left:50}).on("customMouseOver",l.show).on("customMouseMove",l.update).on("customMouseOut",l.hide),n.datum(t).call(a),l.nameLabel("key"),d3.select(e+" .step-chart .metadata-group").datum([]).call(l)},i(function(){


                var e=
                [    {name:"{{$d[0]}}" ,value:{{$data[0]}}}
                    ,{name:"{{$d[1]}}",value:{{$data[1]}}}
                    ,{name:"{{$d[2]}}",value:{{$data[2]}}}
                    ,{name:"{{$d[3]}}",value:{{$data[3]}}}
                    ,{name:"{{$d[4]}}",value:{{$data[4]}}}
                    ,{name:"{{$d[5]}}",value:{{$data[5]}}}
                    ,{name:"{{$d[6]}}",value:{{$data[6]}}}
                ];

            function u(){d3.selectAll(".bar-chart").remove(),0<i(".bar-container").length&&briteChartApp.createBarChart(".bar-container",e),0<i(".bar-container-horizontal").length&&briteChartApp.createHorizontalBarChart(".bar-container-horizontal",e),0<i(".line-container").length&&briteChartApp.createLineChart(".line-container",t),0<i(".donut-container").length&&briteChartApp.createDonutChart(".donut-container",a),0<i(".brush-container").length&&briteChartApp.createBrushChart(".brush-container",l),0<i(".step-container").length&&briteChartApp.createStepChart(".step-container",n)}i(window).on("resize",function(e){e.preventDefault(),setTimeout(u,200)}),u()})}(jQuery,briteChartApp);
    </script>

@endsection

