@extends('manager.master')
@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Column Chart with Datalabels</h4>
            <div id="datalabels-column" class="apex-charts" data-colors="#3688fc"></div>
        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
    @push('custom-scripts')
 <script src="{{ asset('js/apexcharts.min.js') }}" ></script>
        <script>
            var colors=["#727cf5","#0acf97","#fa5c7c"];
            (dataColors=$("#datalabels-column").data("colors"))&&(colors=dataColors.split(","));
            options={chart:{height:380,type:"bar",toolbar:{show:!1}},
                plotOptions:{bar:{dataLabels:{position:"top"}}},dataLabels:{enabled:!0,formatter:function(o){return o},offsetY:10,style:{fontSize:"12px",colors:["#304758"]}},colors:colors,
                series:[{name:"Thu nhập",data:[{{implode(',',$data)}}]}],
                xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]
                    ,position:"top",labels:{offsetY:7},axisBorder:{show:!1},axisTicks:{show:!1},crosshairs:{fill:{type:"gradient",gradient:{colorFrom:"#D8E3F0",colorTo:"#BED1E6",stops:[0,100],opacityFrom:.4,opacityTo:.5}}},tooltip:{enabled:!0,offsetY:-35}},fill:{gradient:{enabled:!1,shade:"light",type:"horizontal",shadeIntensity:.25,gradientToColors:void 0,inverseColors:!0,opacityFrom:1,opacityTo:1,stops:[50,0,100,100]}},yaxis:{axisBorder:{show:!1},axisTicks:{show:!1},labels:{show:!1,formatter:function(o){return o+'.000đ'}}},title:{text:"Thu nhập hàng tháng",floating:!0,offsetY:350,align:"center",style:{color:"#444"}},grid:{row:{colors:["transparent","transparent"],opacity:.2},borderColor:"#f1f3fa"}};(chart=new ApexCharts(document.querySelector("#datalabels-column"),options)).render();colors=["#39afd1","#ffbc00","#e3eaef"];var chart;options={chart:{height:380,type:"rangeBar"},plotOptions:{bar:{horizontal:!1}},dataLabels:{enabled:!0},legend:{offsetY:7},colors:colors,series:[{name:"Product A",data:[{x:"Team A",y:[1,5]},{x:"Team B",y:[4,6]},{x:"Team C",y:[5,8]},{x:"Team D",y:[3,11]}]},{name:"Product B",data:[{x:"Team A",y:[2,6]},{x:"Team B",y:[1,3]},{x:"Team C",y:[7,8]},{x:"Team D",y:[5,9]}]}]};(chart=new ApexCharts(document.querySelector("#range-column"),options)).render();
        </script>
    @endpush


@endsection
