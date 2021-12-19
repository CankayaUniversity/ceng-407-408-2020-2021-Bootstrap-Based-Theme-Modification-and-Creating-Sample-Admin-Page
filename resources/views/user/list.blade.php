@extends('layouts/contentLayoutMaster')

@section('title', 'User List')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<!-- users list start -->
<section class="app-user-list">

  <!-- list and filter start -->
  <div class="card">
    <div class="card-datatable table-responsive pt-0">
      <table class="user-list-table table">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Last Activity</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td class="text-capitalize" style="{{ $user->role == 'admin' ? 'color:#ea5455' : null }}">{{ $user->role }}</td>
            <td>{{ $user->email }}</td>
            <td></td>
            <td>
              <a href="/user/make-admin/{{ $user->id }}" class="btn btn-sm btn-{{ $user->role == 'admin' ? 'warning' : 'primary' }} {{ auth()->user()->id == $user->id ? 'hidden' : null }}" {{ auth()->user()->id == $user->id ? 'disabled' : null }}>Make {{ $user->role == 'admin' ? 'User' : 'Admin' }}</a>
              <a href="/user/delete/{{ $user->id }}" class="btn btn-sm btn-danger {{ auth()->user()->id == $user->id ? 'disabled' : null }}" {{ auth()->user()->id == $user->id ? 'disabled' : null }}>Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- list and filter end -->
</section>
<!-- users list ends -->
@endsection
