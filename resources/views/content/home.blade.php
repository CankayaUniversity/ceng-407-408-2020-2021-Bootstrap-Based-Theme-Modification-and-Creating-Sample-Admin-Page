@extends('layouts/contentLayoutMaster')

@section('title', 'Servers')

@section('content')

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
      <tr>
        <td>{{ $server['name'] }}</td>
        <td>{{ $server['cpu'] }}%</td>
        <td>{{ $server['memory'] }}%</td>
        <td>{{ $server['disk'] }}%</td>
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

@endsection
