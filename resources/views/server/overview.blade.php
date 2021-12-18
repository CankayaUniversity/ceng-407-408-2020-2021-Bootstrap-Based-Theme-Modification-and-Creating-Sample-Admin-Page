@extends('layouts/contentLayoutMaster')

@section('title', $server->name)

@section('page-style')
 <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')

@if($system_resource)
  @livewire('server.statistics', ['system_resource' => $system_resource])
  @livewire('server.stat.cpu')
@else
  @include('server.installation-guide')
@endif

@endsection

@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
@endsection
