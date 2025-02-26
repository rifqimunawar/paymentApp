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
  <div class="row mb-2">
    <div class="col-lg-12">
      <div id="advance-daterange" class="btn btn-primary btn-sm d-flex text-center align-items-center">
        <span class="flex-1" id="selected-date">&emsp;</span>
        <i class="fa fa-caret-down" style="margin-left: 5px"></i>
      </div>
    </div>
  </div>

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
      <!-- END panel -->
    </div>
  </div>
@endsection
<script>
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
      $.ajax({
        url: '{{ route('statistik') }}', // Pastikan ini dalam file Blade, bukan .js terpisah
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log("Data Statistik:", response);

          var data1 = response.data1;
          var data2 = response.data2;
          var data3 = response.data3;
          var xLabel = response.xLabel;

          // Render Chart setelah data diterima
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
            },
            {
              data: data2,
              label: "Visitors",
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
            },
            {
              data: data3,
              label: "Visitors2",
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
            }
          ], {
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

          // Tooltip Handler
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
        },
        error: function(xhr, status, error) {
          console.error("Gagal mengambil data statistik:", error);
        }
      });
    }
  };
</script>
