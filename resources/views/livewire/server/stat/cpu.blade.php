<div>
    <!-- Line Chart Starts -->
    <div class="col-12">
      <div class="card">
        <div
          class="
            card-header
            d-flex
            flex-sm-row flex-column
            justify-content-md-between
            align-items-start
            justify-content-start
          "
        >
          <div>
            <h4 class="card-title mb-25">CPU</h4>
          </div>
        </div>
        <div class="card-body">
          <div id="cpu-chart"></div>
        </div>
      </div>
    </div>
    <!-- Line Chart Ends -->
</div>

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
@endsection

@section('page-script')
  <script>
    // Line Chart
    // --------------------------------------------------------------------
    var lineChartEl = document.querySelector('#cpu-chart'),
      lineChartConfig = {
        chart: {
          height: 400,
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
            data: {{ json_encode( $this->chart_data['data'] ) }}
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
          curve: 'straight'
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
          categories: {!! json_encode( $this->chart_data['labels'] ) !!}
          
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
@endsection
