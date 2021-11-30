@extends('layouts/contentLayoutMaster')

@section('title', $server->name)

@section('content')

@livewire('server.statistics', ['system_resource' => $system_resource])

@endsection
