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
            <td><strong>{{ $last->cpu }}%</strong></td>
            <td><strong>{{ $last->memory }}%</strong></td>
            <td><strong>{{ $last->disk }}%</strong></td>
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