<div wire:key="vmem-chart">
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
            <h4 class="card-title mb-25">Virtual Memory</h4>
          </div>
        </div>
        <div class="card-body">
          <div id="vmem-chart"></div>
        </div>
      </div>
    </div>
    <!-- Line Chart Ends -->
</div>

@push('scripts')
  
@endpush