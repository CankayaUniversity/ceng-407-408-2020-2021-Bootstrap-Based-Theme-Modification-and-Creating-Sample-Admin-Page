@extends('layouts/contentLayoutMaster')

@section('title', $server->name)

@section('page-style')
 <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')

@livewire('server.statistics', ['system_resource' => $system_resource])
@livewire('server.stat.cpu')

@endsection

@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
@endsection
