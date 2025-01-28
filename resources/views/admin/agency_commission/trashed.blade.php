@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">{{ $title }}</span></h4>
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
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('show-commission') }}" class="btn btn-outline-danger float-end me-4">
                            <i class="fas fa-eye"></i> View Active Commissions
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="commission-table" class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Policy #</th>
                        <th>Date</th>
                        <th>Transaction</th>
                        <th>Pro Premium</th>
                        <th>Commission</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Note</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commissions as $commission)
                        <tr>
                            <td>{{ $commission->client->applicant_name }}</td>
                            <td>{{ $commission->policy_number }}</td>
                            <td>{{ $commission->date }}</td>
                            <td>{{ $commission->transaction }}</td>
                            <td>{{ $commission->pro_premium }}</td>
                            <td>{{ $commission->commission }}</td>
                            <td>{{ $commission->paid }}</td>
                            <td>{{ $commission->due }}</td>
                            <td>{{ $commission->notes }}</td>
                            <td>
                                <div class="d-flex action-buttons">
                                    <form method="POST" action="{{ route('restore-commission', $commission->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm me-2" title="Restore">
                                            <i class="fas fa-undo"></i> Restore
                                        </button>
                                    </form>
                                    <form method="POST"
                                          action="{{ route('force-delete-commission', $commission->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Permanently">
                                            <i class="fas fa-trash-alt"></i> Delete Permanently
                                        </button>
                                    </form>
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
    <script src="{{ asset('backend/js/datatables.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2(); // Initialize Select2 dropdown

        });
    </script>
@endpush
