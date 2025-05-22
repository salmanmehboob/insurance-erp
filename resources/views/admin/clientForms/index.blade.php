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

            <div class="card-body">
                @if($type === 'agent_broker')
                    @include('admin.clientForms.agent_broker.index')
                @endif

                @if($type === 'additional_remarks')
                    @include('admin.clientForms.additional_remarks.index')
                @endif

                @if($type === 'evidenceOfProperty')
                    @include('admin.clientForms.evidence_property.index')
                @endif

                @if($type === 'invoiceForPayment')
                    @include('admin.clientForms.invoice_payment.index')
                @endif

                @if($type === 'propertyLoss')
                    @include('admin.clientForms.property_loss.index')
                @endif

                @if($type === 'propertyInsurance')
                    @include('admin.clientForms.property_insurance.index')
                @endif

                @if($type === 'liabilityInsurance')
                    @include('admin.clientForms.liability_insurance.index')
                @endif
                @if($type === 'InsuranceCard')
                    @include('admin.clientForms.insurance_card.index')
                @endif
                    @if($type === 'GeneralLiability')
                    @include('admin.clientForms.general_liability.index')
                @endif
            </div>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->
@endsection

@push('script')
    <script src="{{ asset('backend/js/datatables.js') }}"></script>

@endpush
