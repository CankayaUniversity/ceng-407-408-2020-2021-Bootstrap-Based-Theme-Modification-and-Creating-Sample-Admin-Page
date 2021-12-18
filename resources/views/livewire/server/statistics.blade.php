<div>
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">System Resources</h4>
            <div class="d-flex align-items-center">
                <p class="card-text me-25 mb-0">Updated 1 month ago</p>
            </div>
        </div>
        <div class="card-body statistics-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-primary me-2">
                            <div class="avatar-content">
                                <i data-feather="trending-up" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{ $system_resource->cpu }}%</h4>
                            <p class="card-text font-small-3 mb-0">CPU</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-info me-2">
                            <div class="avatar-content">
                                <i data-feather="user" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{ $system_resource->vmem }}%</h4>
                            <p class="card-text font-small-3 mb-0">Memory</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-danger me-2">
                            <div class="avatar-content">
                                <i data-feather="box" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{ $system_resource->disk }}%</h4>
                            <p class="card-text font-small-3 mb-0">Disk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-success me-2">
                            <div class="avatar-content">
                                <i data-feather="dollar-sign" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{ $system_resource->load_avg * 100 }}%</h4>
                            <p class="card-text font-small-3 mb-0">Load</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>