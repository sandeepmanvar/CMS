@extends('layouts.admin.app')

@section('title', __('Members'))

@push('css')
    <link href="{{ asset('assets/admin') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('scripts-b')
    <script src="{{ asset('assets/admin') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $.extend( true, $.fn.dataTable.defaults, {
                "searching": true,
                "ordering": true,
                "scrollX": true,
                "lengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
                "processing": true,
                // "deferLoading": 50
            } );

            $('#usersTable').DataTable({
            });
        });
    </script>
@endpush

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Members') }}</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>{{ __('Id') }}</th>
                <th>{{ __('First Name') }}</th>
                <th>{{ __('Last Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Register Date') }}</th>
                <th>{{ __('Last Updated') }}</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>{{ __('Id') }}</th>
                <th>{{ __('First Name') }}</th>
                <th>{{ __('Last Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Register Date') }}</th>
                <th>{{ __('Last Updated') }}</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
@endsection