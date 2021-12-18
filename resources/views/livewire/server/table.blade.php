<div class="position-relative">
    <a class="btn btn-primary position-absolute" style="top:-50px; right:0" href="/server/add" id="add-server-btn">Add Server</a>
    <div class="card">
        @if($servers)
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>CPU</th>
                <th>Memory</th>
                <th>Disk</th>
            </tr>
            </thead>
            <tbody>
            @foreach($servers as $server)
            @php
            $last = $server->last_system_resources();
            @endphp
            <tr>
                <td><a href="{{ route('server-overview', $server->id) }}">{{ $server['name'] }}</a></td>
                <td><strong>@if(isset($last->cpu)) {{ $last->cpu }}% @endif</strong></td>
                <td><strong>@if(isset($last->vmem)) {{ $last->vmem }}% @endif</strong></td>
                <td><strong>@if(isset($last->disk)) {{ $last->disk }}% @endif</strong></td>
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