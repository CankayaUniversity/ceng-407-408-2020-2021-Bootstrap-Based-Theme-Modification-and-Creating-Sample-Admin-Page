@extends('layouts/contentLayoutMaster')

@section('title', $server->name)

@section('page-style')
 <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')

@if($system_resource)

  @php
  $chart      = $system_resource->chart_data();
  $chart_load = \App\Models\SystemResource::parse_chart_data($chart, 'load_avg');
  $chart_cpu  = \App\Models\SystemResource::parse_chart_data($chart, 'cpu');
  $chart_vmem = \App\Models\SystemResource::parse_chart_data($chart, 'vmem');
  $chart_swap = \App\Models\SystemResource::parse_chart_data($chart, 'swap_mem');
  @endphp

  @livewire('server.statistics', ['system_resource' => $system_resource])
  <div class="row">
    <div class="col-lg-6">
      @livewire('server.stat.load')
    </div>
    <div class="col-lg-6">
      @livewire('server.stat.cpu')
    </div>
    <div class="col-lg-6">
      @livewire('server.stat.vmem')
    </div>
    <div class="col-lg-6">
      @livewire('server.stat.swap')
    </div>
  </div>

  @if($process)
  <h4>Running Tasks</h4>
  <div class="card">
    <table class="table">
      <thead>
        <tr>
          <th>PID</th>
          <th>Name</th>
          <th>User</th>
        </tr>
      </thead>
      <tbody>
        @foreach($process as &$p)
        <tr>
          <td>{{ $p->pid }}</td>
          <td><strong>{{ $p->name }}</strong></td>
          <td>{{ $p->username }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif

@else
  @include('server.installation-guide')
@endif

@endsection


@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
@endsection


@section('page-script')
@if($system_resource)
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>

  <script>
    // Line Chart
    // --------------------------------------------------------------------
    var lineChartEl = document.querySelector('#cpu-chart'),
      lineChartConfig = {
        chart: {
          height: 300,
          type: 'line',
          zoom: {
            enabled: false
          },
          parentHeightOffset: 0,
          toolbar: {
            show: false
          }
        },
        series: [
          {
            data: {{ json_encode( $chart_cpu['data'] ) }}
          }
        ],
        markers: {
          strokeWidth: 7,
          strokeOpacity: 1,
          strokeColors: [window.colors.solid.white],
          colors: [window.colors.solid.warning]
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight',
          width: 3,
        },
        colors: [window.colors.solid.warning],
        grid: {
          xaxis: {
            lines: {
              show: true
            }
          },
          padding: {
            top: -20
          }
        },
        tooltip: {
          custom: function (data) {
            return (
              '<div class="px-1 py-50">' +
              '<span>' +
              data.series[data.seriesIndex][data.dataPointIndex] +
              '%</span>' +
              '</div>'
            );
          }
        },
        xaxis: {
          categories: {!! json_encode( $chart_cpu['labels'] ) !!},
        },
        yaxis: {
          opposite: false
        }
      };
    if (typeof lineChartEl !== undefined && lineChartEl !== null) {
      var lineChart = new ApexCharts(lineChartEl, lineChartConfig);
      lineChart.render();
    }
  </script>


<script>
    // Line Chart
    // --------------------------------------------------------------------
    var lineChartElLoad = document.querySelector('#load-chart'),
      lineChartConfigLoad = {
        chart: {
          height: 300,
          type: 'line',
          zoom: {
            enabled: false
          },
          parentHeightOffset: 0,
          toolbar: {
            show: false
          }
        },
        series: [
          {
            data: {{ json_encode( $chart_load['data'] ) }}
          }
        ],
        markers: {
          strokeWidth: 7,
          strokeOpacity: 1,
          strokeColors: [window.colors.solid.white],
          colors: ['#7367f0']
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight',
          width: 3,
        },
        colors: ['#7367f0'],
        grid: {
          xaxis: {
            lines: {
              show: true
            }
          },
          padding: {
            top: -20
          }
        },
        tooltip: {
          custom: function (data) {
            return (
              '<div class="px-1 py-50">' +
              '<span>' +
              data.series[data.seriesIndex][data.dataPointIndex] +
              '</span>' +
              '</div>'
            );
          }
        },
        xaxis: {
          categories: {!! json_encode( $chart_load['labels'] ) !!},
        },
        yaxis: {
          opposite: false
        }
      };
    if (typeof lineChartElLoad !== undefined && lineChartElLoad !== null) {
      var lineChartLoad = new ApexCharts(lineChartElLoad, lineChartConfigLoad);
      lineChartLoad.render();
    }
  </script>


  <script>
    // Line Chart
    // --------------------------------------------------------------------
        var lineChartElVmem = document.querySelector('#vmem-chart'),
        lineChartConfigVmem = {
          chart: {
            height: 300,
            type: 'line',
            zoom: {
              enabled: false
            },
            parentHeightOffset: 0,
            toolbar: {
              show: false
            }
          },
          series: [
            {
              data: {{ json_encode( $chart_vmem['data'] ) }}
            }
          ],
          markers: {
            strokeWidth: 7,
            strokeOpacity: 1,
            strokeColors: ['#fff'],
            colors: ['#00cfe8']
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'straight',
            width: 3,
          },
          colors: ['#00cfe8'],
          grid: {
            xaxis: {
              lines: {
                show: true
              }
            },
            padding: {
              top: -20
            }
          },
          tooltip: {
            custom: function (data) {
              return (
                '<div class="px-1 py-50">' +
                '<span>' +
                data.series[data.seriesIndex][data.dataPointIndex] +
                '%</span>' +
                '</div>'
              );
            }
          },
          xaxis: {
            categories: {!! json_encode( $chart_vmem['labels'] ) !!},
          },
          yaxis: {
            opposite: false
          }
        };
        var lineChartVmem = new ApexCharts(lineChartElVmem, lineChartConfigVmem);
        lineChartVmem.render();
  </script>



<script>
    // Line Chart
    // --------------------------------------------------------------------
    var lineChartElSwap = document.querySelector('#swap-chart'),
      lineChartConfigSwap = {
        chart: {
          height: 300,
          type: 'line',
          zoom: {
            enabled: false
          },
          parentHeightOffset: 0,
          toolbar: {
            show: false
          }
        },
        series: [
          {
            data: {{ json_encode( $chart_swap['data'] ) }}
          }
        ],
        markers: {
          strokeWidth: 7,
          strokeOpacity: 1,
          strokeColors: [window.colors.solid.white],
          colors: ['#ea5455']
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight',
          width: 3,
        },
        colors: ['#ea5455'],
        grid: {
          xaxis: {
            lines: {
              show: true
            }
          },
          padding: {
            top: -20
          }
        },
        tooltip: {
          custom: function (data) {
            return (
              '<div class="px-1 py-50">' +
              '<span>' +
              data.series[data.seriesIndex][data.dataPointIndex] +
              '%</span>' +
              '</div>'
            );
          }
        },
        xaxis: {
          categories: {!! json_encode( $chart_swap['labels'] ) !!},
        },
        yaxis: {
          opposite: false
        }
      };
    if (typeof lineChartElSwap !== undefined && lineChartElSwap !== null) {
      var lineChartSwap = new ApexCharts(lineChartElSwap, lineChartConfigSwap);
      lineChartSwap.render();
    }
  </script>



@endif
@endsection
