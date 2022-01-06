<div class="position-relative">
    <a class="btn btn-primary position-absolute" style="top:-50px; right:0" href="/server/add" id="add-server-btn">Add Server</a>
    <div class="card table-responsive">
        @if($servers)
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>CPU</th>
                <th>V. Memory</th>
                <th>Swap Memory</th>
                <th>Disk</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($servers as $server)
            @php
            $last = $server->last_system_resources();
            @endphp
            <tr wire:key="{{$server}}">
                <td>
                    <a href="{{ route('server-overview', $server->id) }}">
                        <strong>{{ $server['name'] }}</strong>
                        @if(!$last)
                        <small class="badge bg-warning" style="margin-left:10px">Pending Installation</small>
                        @endif
                    </a>
                </td>
                <td>
                    @if(isset($last->cpu))
                    @php
                        $pclass = 'primary';
                        if($last->cpu < 30) $pclass = 'success';
                        elseif($last->cpu >=  30 && $last->cpu < 70) $pclass = 'warning';
                        else $pclass = 'danger';
                    @endphp
                    <div class="progress progress-bar-{{ $pclass }}">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $last->cpu }}" aria-valuemin="{{ $last->cpu }}" aria-valuemax="100" style="min-width: 50px; width: {{ $last->cpu }}%">
                            <strong style="font-size: 10px">{{ $last->cpu }}%</strong>
                        </div>
                    </div>
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if(isset($last->vmem))
                    @php
                        $pclass = 'primary';
                        if($last->vmem < 30) $pclass = 'success';
                        elseif($last->vmem >=  30 && $last->vmem < 70) $pclass = 'warning';
                        else $pclass = 'danger';
                    @endphp
                    <div class="progress progress-bar-{{ $pclass }}">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $last->vmem }}" aria-valuemin="{{ $last->vmem }}" aria-valuemax="100" style="min-width: 50px; width: {{ $last->vmem }}%">
                            <strong style="font-size: 10px">{{ $last->vmem }}%</strong>
                        </div>
                    </div>
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if(isset($last->swap_mem))
                    @php
                        $pclass = 'primary';
                        if($last->swap_mem < 30) $pclass = 'success';
                        elseif($last->swap_mem >=  30 && $last->swap_mem < 70) $pclass = 'warning';
                        else $pclass = 'danger';
                    @endphp
                    <div class="progress progress-bar-{{ $pclass }}">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $last->swap_mem }}" aria-valuemin="{{ $last->swap_mem }}" aria-valuemax="100" style="min-width: 50px; width: {{ $last->swap_mem }}%">
                            <strong style="font-size: 10px">{{ $last->swap_mem }}%</strong>
                        </div>
                    </div>
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if(isset($last->disk))
                    @php
                        $pclass = 'primary';
                        if($last->disk < 30) $pclass = 'success';
                        elseif($last->disk >=  30 && $last->disk < 70) $pclass = 'warning';
                        else $pclass = 'danger';
                    @endphp
                    <div class="progress progress-bar-{{ $pclass }}">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $last->disk }}" aria-valuemin="{{ $last->disk }}" aria-valuemax="100" style="min-width: 50px; width: {{ $last->disk }}%">
                            <strong style="font-size: 10px">{{ $last->disk }}%</strong>
                        </div>
                    </div>
                    @else
                    -
                    @endif
                </td>
                <td style="width: 1px">
                    <button type="button" wire:click="delete({{$server->id}})" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-warning">
        No server found.
        </div>
    @endif
    </div>
</div>