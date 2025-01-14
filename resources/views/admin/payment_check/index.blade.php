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
                            @can('create-payment-check')
                            <a href="{{ route('add-payment-check') }}" class="btn btn-outline-primary float-end">
                                <b><i class="fas fa-plus"></i></b> {{ $title }}
                            </a>
                            @endcan

                            <a href="{{ route('trashed-payment-check') }}" class="btn btn-outline-danger float-end me-4">
                                <i class="fas fa-trash-restore"></i> View Trashed Check
                            </a>


                        </div>
                </div>
            </div>

            <div class="card-body">
                <table id="payment-table" class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Pay to</th>
                        <th>Check No</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paymentChecks as $payment)
                         <tr>
                            <td>{{ $payment->client->applicant_name }}</td>
                             <td>{{ $payment->payTo->name }}</td>
                             <td>{{ $payment->check_no }}</td>
                             <td>{{ $payment->payment_date }}</td>
                             <td>{{ $payment->amount   }}</td>
                            <td>
                                <div class="d-flex action-buttons">
                                    @can('edit-payment-check')
                                        <a title="Edit" href="{{ route('edit-payment-check', $payment->id) }}"
                                           class="text-primary me-2 action-buttons">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('delete-payment-check')
                                        <a href="javascript:void(0)"
                                           data-url="{{ route('destroy-payment-check') }}"
                                           data-status="0"
                                           data-label="delete"
                                           data-id="{{ $payment->id }}"
                                           class="text-danger me-1 change-status-record action-buttons"
                                           title="Suspend Record">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endcan
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

@endpush
