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
                        @can('create-reminder')
                            <a href="{{ route('add-reminder') }}" class="btn btn-outline-primary float-end">
                                <b><i class="fas fa-plus"></i></b> {{ $title }}
                            </a>
                        @endcan

                        <a href="{{ route('trashed-reminders') }}" class="btn btn-outline-danger float-end me-4">
                            <i class="fas fa-trash-restore"></i> View Deleted Reminders
                        </a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="reminder-table" class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Reminder From</th>
                        <th>Reminder To</th>
                        <th>Set Reminder</th>
                        <th>Date</th>
                        <th>Critical</th>
                        <th>Insurance Company</th>
                        <th>Note</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reminders as $reminder)
                        <tr>
                            <td>{{ $reminder->client->applicant_name }}</td>
                            <td>{{ $reminder->reminderFrom->name }}</td>
                            <td>{{ $reminder->reminderTo->name }}</td>
                            <td>{{ $reminder->set_reminder == 1 ? 'YES' : 'No' }}</td>
                            <td>{{ showDate($reminder->date) }}</td>
                            <td>{{ $reminder->is_critical == 1 ? 'YES' : 'No'}}</td>
                            <td>{{ $reminder->insuranceCompany->name }}</td>
                            <td>{{ $reminder->notes }}</td>
                            <td>
                                <div class="d-flex action-buttons">
                                    @can('edit-reminder')
                                        <a title="Edit" href="{{ route('edit-reminder', $reminder->id) }}"
                                           class="text-primary me-2 action-buttons">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('delete-reminder')
                                        <a href="javascript:void(0)"
                                           data-url="{{ route('destroy-reminder') }}"
                                           data-status="0"
                                           data-label="delete"
                                           data-id="{{ $reminder->id }}"
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
    <script>
        $(document).ready(function () {
            $('.select2').select2(); // Initialize Select2 dropdown

            // Populate modal with reminder details on row click
            $(".clickable-row").on("click", function () {
                var name = $(this).data("name");
                var email = $(this).data("email");
                var phone_no = $(this).data("phone_no");
                var city = $(this).data("city");
                var state = $(this).data("state");
                var zip_code = $(this).data("zip_code");
                var address = $(this).data("address");
                var reminder_name = $(this).data("reminder_name");
                var reminder_percentage = $(this).data("reminder_percentage");
                var reminder_fee = $(this).data("reminder_fee");
                var notes = $(this).data("notes");
                var locations = $(this).data("locations");
                var permissions = $(this).data("permissions");

                $('#name').val(name);
                $('#email').val(email);
                $('#phone_no').val(phone_no);
                $('#city').val(city);
                $('#state').val(state);
                $('#zip_code').val(zip_code);
                $('#address').val(address);
                $('#reminder_name').val(reminder_name);
                $('#reminder_percentage').val(reminder_percentage);
                $('#reminder_fee').val(reminder_fee);
                $('#notes').val(notes);
                $('#locations').val(locations);
                // $('#permissions').val(permissions);

                // Clear the permissions container
                $("#permissions-container").empty();

                // Retrieve data from the clicked row
                var permissions = $(this).data("permissions").split(','); // IDs of permissions
                var permissionNames = $(this).data("permission-names").split(','); // Names of permissions

                // Generate checkboxes dynamically
                permissionNames.forEach((permissionName, index) => {
                    var permissionId = permissions[index];
                    var isChecked = permissions.includes(permissionId.toString()) ? "checked" : "";

                    $("#permissions-container").append(`
                <div class="form-check">
                    <input class="form-check-input" disabled type="checkbox" id="permission-${permissionId}" value="${permissionId}" ${isChecked}>
                    <label class="form-check-label" for="permission-${permissionId}">
                        ${permissionName}
                    </label>
                </div>
            `);
                });

            });

        });
    </script>
@endpush
