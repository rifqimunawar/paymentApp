@extends('dashboard::layouts.master')

@section('content')
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TOTAL VISITORS</h4>
                    <p>3,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>BOUNCE RATE</h4>
                    <p>20.44%</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-orange">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>UNIQUE VISITORS</h4>
                    <p>1,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>AVG TIME ON SITE</h4>
                    <p>00:12:23</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
    </div>
    <!-- END row -->

    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-8 -->
        <div class="col-xl-12">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                                class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body pe-1">
                    <div id="interactive-chart" class="h-300px"></div>
                </div>
            </div>
            <p>{{ $imagickStatus }}</p>
            <!-- END panel -->
        </div>
    </div>
@endsection
<script>
    var handleVectorMap = function() {
        "use strict";
        if ($('#world-map').length !== 0) {
            var fillColor = ($('#world-map').attr('data-theme') == 'transparent') ? 'rgba(' + app.color.whiteRgb +
                ', .25)' : app.color.gray600;
            $('#world-map').empty();
            $('#world-map').vectorMap({
                map: 'world_mill',
                scaleColors: [app.color.gray300, app.color.gray600],
                normalizeFunction: 'polynomial',
                hoverOpacity: 0.5,
                hoverColor: false,
                zoomOnScroll: false,
                markerStyle: {
                    initial: {
                        fill: app.color.teal,
                        stroke: 'transparent',
                        r: 3
                    }
                },
                regionStyle: {
                    initial: {
                        fill: fillColor,
                        "fill-opacity": 1,
                        stroke: 'none',
                        "stroke-width": 0.4,
                        "stroke-opacity": 1
                    },
                    hover: {
                        "fill-opacity": 0.8
                    },
                    selected: {
                        fill: 'yellow'
                    },
                    selectedHover: {}
                },
                focusOn: {
                    x: 0.5,
                    y: 0.5,
                    scale: 0
                },
                backgroundColor: 'transparent',
                markers: [{
                        latLng: [41.90, 12.45],
                        name: 'Vatican City'
                    },
                    {
                        latLng: [43.73, 7.41],
                        name: 'Monaco'
                    },
                    {
                        latLng: [-0.52, 166.93],
                        name: 'Nauru'
                    },
                    {
                        latLng: [-8.51, 179.21],
                        name: 'Tuvalu'
                    },
                    {
                        latLng: [43.93, 12.46],
                        name: 'San Marino'
                    },
                    {
                        latLng: [47.14, 9.52],
                        name: 'Liechtenstein'
                    },
                    {
                        latLng: [7.11, 171.06],
                        name: 'Marshall Islands'
                    },
                    {
                        latLng: [17.3, -62.73],
                        name: 'Saint Kitts and Nevis'
                    },
                    {
                        latLng: [3.2, 73.22],
                        name: 'Maldives'
                    },
                    {
                        latLng: [35.88, 14.5],
                        name: 'Malta'
                    },
                    {
                        latLng: [12.05, -61.75],
                        name: 'Grenada'
                    },
                    {
                        latLng: [13.16, -61.23],
                        name: 'Saint Vincent and the Grenadines'
                    },
                    {
                        latLng: [13.16, -59.55],
                        name: 'Barbados'
                    },
                    {
                        latLng: [17.11, -61.85],
                        name: 'Antigua and Barbuda'
                    },
                    {
                        latLng: [-4.61, 55.45],
                        name: 'Seychelles'
                    },
                    {
                        latLng: [7.35, 134.46],
                        name: 'Palau'
                    },
                    {
                        latLng: [42.5, 1.51],
                        name: 'Andorra'
                    },
                    {
                        latLng: [14.01, -60.98],
                        name: 'Saint Lucia'
                    },
                    {
                        latLng: [6.91, 158.18],
                        name: 'Federated States of Micronesia'
                    },
                    {
                        latLng: [1.3, 103.8],
                        name: 'Singapore'
                    },
                    {
                        latLng: [1.46, 173.03],
                        name: 'Kiribati'
                    },
                    {
                        latLng: [-21.13, -175.2],
                        name: 'Tonga'
                    },
                    {
                        latLng: [15.3, -61.38],
                        name: 'Dominica'
                    },
                    {
                        latLng: [-20.2, 57.5],
                        name: 'Mauritius'
                    },
                    {
                        latLng: [26.02, 50.55],
                        name: 'Bahrain'
                    },
                    {
                        latLng: [0.33, 6.73],
                        name: 'S�o Tom� and Pr�ncipe'
                    }
                ]
            });
        }
    };

    var handleInteractiveChart = function() {
        "use strict";
        $('#interactive-chart').empty();

        function showTooltip(x, y, contents) {
            $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css({
                top: y - 45,
                left: x - 55
            }).appendTo("body").fadeIn(200);
        }
        if ($('#interactive-chart').length !== 0) {

            var data1 = [
                [1, 40],
                [2, 50],
                [3, 60],
                [4, 60],
                [5, 60],
                [6, 65],
                [7, 75],
                [8, 90],
                [9, 100],
                [10, 105],
                [11, 110],
                [12, 110],
                [13, 120],
                [14, 130],
                [15, 135],
                [16, 145],
                [17, 132],
                [18, 123],
                [19, 135],
                [20, 150]
            ];
            var data2 = [
                [1, 10],
                [2, 6],
                [3, 10],
                [4, 12],
                [5, 18],
                [6, 20],
                [7, 25],
                [8, 23],
                [9, 24],
                [10, 25],
                [11, 18],
                [12, 30],
                [13, 25],
                [14, 25],
                [15, 30],
                [16, 27],
                [17, 20],
                [18, 18],
                [19, 31],
                [20, 23]
            ];
            var xLabel = [
                [1, ''],
                [2, ''],
                [3, 'May 15'],
                [4, ''],
                [5, ''],
                [6, 'May 19'],
                [7, ''],
                [8, ''],
                [9, 'May 22'],
                [10, ''],
                [11, ''],
                [12, 'May 25'],
                [13, ''],
                [14, ''],
                [15, 'May 28'],
                [16, ''],
                [17, ''],
                [18, 'Agus 31'],
                [19, ''],
                [20, '']
            ];

            $.plot($("#interactive-chart"), [{
                data: data1,
                label: "Page Views",
                color: app.color.blue,
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 2
                },
                points: {
                    show: true,
                    radius: 3,
                    fillColor: app.color.componentBg
                },
                shadowSize: 0
            }, {
                data: data2,
                label: 'Visitors',
                color: app.color.green,
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 2
                },
                points: {
                    show: true,
                    radius: 3,
                    fillColor: app.color.componentBg
                },
                shadowSize: 0
            }], {
                xaxis: {
                    ticks: xLabel,
                    tickDecimals: 0,
                    tickColor: 'rgba(' + app.color.darkRgb + ', .2)'
                },
                yaxis: {
                    ticks: 10,
                    tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
                    min: 0,
                    max: 200
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
                    borderWidth: 1,
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(' + app.color.darkRgb + ', .2)'
                },
                legend: {
                    labelBoxBorderColor: 'rgba(' + app.color.darkRgb + ', .2)',
                    margin: 10,
                    noColumns: 1,
                    show: true
                }
            });
            var previousPoint = null;
            $("#interactive-chart").bind("plothover", function(event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;
                        $("#tooltip").remove();
                        var y = item.datapoint[1].toFixed(2);

                        var content = item.series.label + " " + y;
                        showTooltip(item.pageX, item.pageY, content);
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
                event.preventDefault();
            });
        }
    };
</script>
