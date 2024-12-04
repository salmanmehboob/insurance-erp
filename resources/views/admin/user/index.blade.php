@extends('admin.layouts.app')

@section('content')


    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">{{$title}}</span>
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>

            </div>


        </div>

    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title"></h5>
                <div class="header-elements">
                    @can('create-users')
                        <div class="col-md-12 mt-5">

                            <a href="{{route('add-user')}}"
                               class="btn btn-outline-primary float-end"><b><i
                                        class="fas fa-plus"></i></b> {{$title}}
                            </a>
                        </div>
                    @endcan
                </div>
            </div>

            <div class="card-body">
                <table id="" class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles[0]->name ?? 'N/A' }}</td>
                            <td>
                                @if($user->trashed())
                                    <span class="badge bg-danger">Suspended</span>
                                @else
                                    <span class="badge bg-success">Active</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    @if(!$user->trashed()) {{-- Show Edit and Delete for Active Users --}}
                                    @can('edit-users')
                                        <a title="Edit" href="{{ route('edit-user', $user->id) }}"
                                           class="text-primary mr-2"><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('delete-users')
                                        <a href="javascript:void(0)" data-url="{{ route('changeStatus-user') }}"
                                           data-status="0" data-label="delete"
                                           data-id="{{ $user->id }}"
                                           class="text-danger mr-2 change-status-record"
                                           title="Suspend Record"><i class="fas fa-trash"></i></a>
                                    @endcan
                                    @else {{-- Show Restore for Suspended Users --}}
                                         <a href="javascript:void(0)" data-url="{{ route('restore-user') }}"
                                           data-id="{{ $user->id }}"  data-status="0" data-label="restore"
                                           class="text-success change-status-record"
                                           title="Restore Record"><i class="fas fa-undo"></i></a>
                                     @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->
@endsection

@push('script')
    <script src="{{asset('backend/js/datatables.js')}}"></script>

@endpush
