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
                             <a href="{{ route('show-bank') }}" class="btn btn-outline-danger float-end me-4">
                                 <i class="fas fa-eye"></i> View Active Banks
                             </a>
                        </div>
                 </div>
            </div>

            <div class="card-body">
                <table id="bank-table" class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                        <th>Account Holder Name</th>
                        <th>Account #</th>
                        <th>Bank Name</th>
                        <th>Branch Name</th>
                        <th>Account Type</th>
                        <th>Locations</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banks as $bank)
                         <tr>
                             <td>{{ $bank->account_holder_name }}</td>
                             <td>{{ $bank->account_number }}</td>
                             <td>{{ $bank->bank_name }}</td>
                             <td>{{ $bank->branch_name }}</td>
                             <td>{{ $bank->account_type }}</td>
                             <td>{{ $bank->agency->agency_name ?? 'No Locations' }}</td>
                             <td>
                                 <div class="d-flex action-buttons">
                                     <form method="POST" action="{{ route('restore-bank', $bank->id) }}">
                                         @csrf
                                         <button type="submit" class="btn btn-success btn-sm me-2" title="Restore">
                                             <i class="fas fa-undo"></i> Restore
                                         </button>
                                     </form>
                                     <form method="POST" action="{{ route('force-delete-bank', $bank->id) }}">
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
