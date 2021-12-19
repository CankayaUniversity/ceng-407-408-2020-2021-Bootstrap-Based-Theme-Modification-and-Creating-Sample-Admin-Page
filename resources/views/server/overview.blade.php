@extends('layouts/contentLayoutMaster')

@section('title', $server->name)

@section('page-style')
 <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')

@if($system_resource)

  @php
  $chart      = $system_resource->chart_data();
  $chart_boot = \App\Models\SystemResource::parse_chart_data($chart, 'boot_time');
  $chart_cpu  = \App\Models\SystemResource::parse_chart_data($chart, 'cpu');
  $chart_vmem = \App\Models\SystemResource::parse_chart_data($chart, 'vmem');
  $chart_swap = \App\Models\SystemResource::parse_chart_data($chart, 'swap_mem');
  @endphp

  @livewire('server.statistics', ['system_resource' => $system_resource])
  <div class="row row-eq-height">
    
    <div class="col-lg-6">
      @livewire('server.stat.cpu')
    </div>
    <div class="col-lg-6">
      <div class="card" style="height:179px; overflow: auto">
        <div class="p-1 pb-0"><h4>Users</h4></div>
        <ul class="list-group list-group-flush">
          @foreach($users as &$user)
          <li class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            {{ $user }}
          </li>
          @endforeach
        </ul>
      </div>
      <div class="card" style="height:179px; overflow: auto">
        <div class="p-1 pb-0"><h4>Disk Partitions</h4></div>
        <table class="table">
          <thead>
            <tr>
              <th>Device</th>
              <th>FileSystem</th>
              <th>Opts</th>
              <th>Maxfile</th>
              <th>Maxpath</th>
            </tr>
          </thead>
          @foreach($disk->partitions as &$disk)
          <tbody>
            <tr>
              <td><strong>{{ $disk[0] }}</strong></td>
              <td>{{ $disk[2] }}</td>
              <td>{{ $disk[3] }}</td>
              <td>{{ $disk[4] }}</td>
              <td>{{ $disk[5] }}</td>
            </tr>
          </tbody>
          @endforeach
          </table>
      </div>
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
            data: {{ json_encode( $chart_boot['data'] ) }}
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
          categories: {!! json_encode( $chart_boot['labels'] ) !!},
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
