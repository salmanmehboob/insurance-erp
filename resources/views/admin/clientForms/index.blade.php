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
                    @include('admin.clientForms.forms.agent_broker_index')
                @endif
            </div>

            <div class="card-body">
                @if($type === 'additional_remarks')
                    @include('admin.clientForms.forms.additional_remarks_index')
                @endif
            </div>
            <div class="card-body">
                @if($type === 'evidenceOfProperty')
                    @include('admin.clientForms.forms.evidence_of_property_index')
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
