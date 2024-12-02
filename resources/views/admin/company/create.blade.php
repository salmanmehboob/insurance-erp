@extends('admin.layouts.app')

@push('style')
    <style>
        .repeater-item {
            margin-bottom: 20px;
        }

        .repeater-item .btn-danger {
            margin-top: 10px;
        }

    </style>
@endpush

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold"></span>{{ $title }}</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <!-- Form validation -->
        <div class="card">
            <!-- Company form -->
            <form action="{{ route('store-company') }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                <div class="card-body">

                    <!-- Tab navigation -->
                    <ul class="nav nav-tabs ">
                        <li class="nav-item">
                            <a href="#general-tab" class="nav-link active" data-bs-toggle="tab">General</a>
                        </li>
                        <li class="nav-item">
                            <a href="#location-tab" class="nav-link" data-bs-toggle="tab">Attachments</a>
                        </li>
                        <li class="nav-item">
                            <a href="#notes-tab" class="nav-link" data-bs-toggle="tab">Notes</a>
                        </li>

                    </ul>

                    <!-- Tab content -->
                    <div class="tab-content">
                        <!-- General tab -->
                        <div class="tab-pane fade show active" id="general-tab">


                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3 azm-color-444">Contact Information</legend>
                                <div class="row mt-3">
                                    <!-- Company Name -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Company Name <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Company Name"
                                                   value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Address</label>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" placeholder="Address"
                                                   value="{{ old('address') }}">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">City</label>
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control" placeholder="City"
                                                   value="{{ old('city') }}">
                                            @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- State -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">State</label>
                                        <div class="form-group">
                                            <select name="state_id" class="form-control select2"
                                                    data-placeholder="Select State">
                                                <option></option>
                                                @foreach($states as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Zip Code -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">Zip Code</label>
                                        <div class="form-group">
                                            <input type="text" name="zip_code" class="form-control"
                                                   placeholder="Zip Code" value="{{ old('zip_code') }}">
                                            @if ($errors->has('zip_code'))
                                                <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="phone_no" class="form-control"
                                                   placeholder="(999) 999-9999"
                                                   data-inputmask="'mask': '(999) 999-9999'"
                                                   value="{{ old('phone_no') }}">
                                            @if ($errors->has('phone_no'))
                                                <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Fax <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="fax_no" class="form-control"
                                                   placeholder="(999) 999-9999"
                                                   data-inputmask="'mask': '(999) 999-9999'"
                                                   value="{{ old('fax_no') }}">
                                            @if ($errors->has('fax_no'))
                                                <span class="text-danger">{{ $errors->first('fax_no') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="col-form-label">Website <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="website" class="form-control"
                                                   placeholder="Website" value="{{ old('website') }}">
                                            @if ($errors->has('website'))
                                                <span class="text-danger">{{ $errors->first('website') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label">Agency Code <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="agency_code" class="form-control"
                                                   placeholder="Agency Code" value="{{ old('agency_code') }}">
                                            @if ($errors->has('agency_code'))
                                                <span class="text-danger">{{ $errors->first('agency_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3 azm-color-444">Commission</legend>
                                <div class="row mt-3">
                                    <!-- Commission -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Commission (%)</label>
                                        <div class="form-group">
                                            <input type="number" name="commission_in_percentage" class="form-control"
                                                   placeholder="Commission Percentage"
                                                   value="{{ old('commission_in_percentage') }}">
                                            @if ($errors->has('commission_in_percentage'))
                                                <span
                                                    class="text-danger">{{ $errors->first('commission_in_percentage') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </fieldset>

                        </div>


                        <!-- Location tab -->
                        <div class="tab-pane fade" id="location-tab">
                            <div class="row mt-3">

                                <div id="attachments-container"></div>

                                <!-- Hidden Template -->
                                <template id="attachment-template">
                                    <div class="attachment-row mt-5">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="attachment_name">Attachment Name</label>
                                                    <input type="text" name="attachment_name[]" class="form-control" placeholder="Enter attachment name">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="attachment_file">Attachment File</label>
                                                    <input type="file" name="attachment_file[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger mt-3 remove-row"><i class="fa fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <div class="col-md-6 mt-5">
                                    <button type="button" class="btn btn-primary" id="add-attachment">Add Attachment
                                    </button>
                                </div>

                            </div>
                        </div>

                        <!-- Notes tab -->
                        <div class="tab-pane fade" id="notes-tab">
                            <div class="row mt-3">
                                <!-- Notes -->
                                <div class="col-md-12">
                                    <label class="col-form-label">Notes</label>
                                    <div class="form-group">
                                        <textarea name="note" class="form-control" rows="5"
                                                  placeholder="Add notes here...">{{ old('note') }}</textarea>
                                        @if ($errors->has('note'))
                                            <span class="text-danger">{{ $errors->first('note') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Submit button -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-end m-5">Save</button>
                </div>
            </form>
            <!-- /company form -->
        </div>
        <!-- /form validation -->
    </div>
    <!-- /content area -->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            // Initialize Select2 dropdowns
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });




            // Add new attachment row
            $('#add-attachment').click(function () {
                let template = document.getElementById('attachment-template').content.cloneNode(true);
                let newAttachment = $(template); // Convert the cloned template into a jQuery object
                $('#attachments-container').append(newAttachment); // Append to container
                newAttachment.hide().slideDown(); // Hide it initially and then slide it down
            });


            // Remove attachment row
            $(document).on('click', '.remove-row', function () {
                let deleteElement = $(this).closest('.attachment-row'); // Store the row element to delete

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteElement.slideUp(function () {
                            $(this).remove(); // Remove the element after animation completes
                        });

                        // // Show a success message
                        // Swal.fire(
                        //     'Deleted!',
                        //     'Your attachment has been deleted.',
                        //     'success'
                        // );
                    }
                });
            });
        });


    </script>
@endpush
