@extends('admin.layouts.app')

@push('style')
@endpush

@section('content')


    <!-- Content area -->
    <div class="content">
        <!-- Form validation -->
        <div class="card">
            <!-- Agent form -->
            <form action="{{ route('add-client') }}" method="GET" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                <div class="card-body">
                    <legend class="mb-3 azm-color-444">{{ $title }}</legend>
                    <div class="col-md-4">
                        <label class="col-form-label">Select the type of policy you would like to create</label>
                        <div class="form-group">
                            <select name="policy_type_id" class="form-control select2"
                                    data-placeholder="Select option">
                                <option></option>
                                @foreach($types as $row)
                                    <option
                                        value="{{ $row->id }}" {{ old('policy_type_id') == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('policy_type_id'))
                                <span class="text-danger">{{ $errors->first('policy_type_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button  type="submit" class="btn btn-primary  m-5">Ok</button>
                        <a href="" class="btn btn-danger">Cancel</a>
                    </div>


                </div>

            </form>


            <!-- /agent form -->
        </div>
        <!-- /form validation -->
    </div>
    <!-- /content area -->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });


            // Handle click event to toggle selection
            $(document).on('click', '.list-group-item', function () {
                $(this).toggleClass('selected');
            });

            // Move items from available list to selected list
            $('#move-to-selected').click(function () {
                $('#available-list .selected').each(function () {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    $(this).removeClass('selected').appendTo('#selected-list');

                    // Update hidden input fields with selected location data
                    addLocationToInputs(id, name);
                });
            });

            // Move items from selected list to available list
            $('#move-to-available').click(function () {
                $('#selected-list .selected').each(function () {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    $(this).removeClass('selected').appendTo('#available-list');

                    // Update hidden input fields by removing location data
                    removeLocationFromInputs(id, name);
                });
            });

            // Function to add location data to hidden inputs
            function addLocationToInputs(id, name) {
                var currentIds = $('#selected-location-ids').val().split(',');
                var currentNames = $('#selected-location-names').val().split(',');
                if (!currentIds.includes(id.toString())) {
                    currentIds.push(id);
                    currentNames.push(name);
                }
                $('#selected-location-ids').val(currentIds.join(','));
                $('#selected-location-names').val(currentNames.join(','));
            }

            // Function to remove location data from hidden inputs
            function removeLocationFromInputs(id, name) {
                var currentIds = $('#selected-location-ids').val().split(',');
                var currentNames = $('#selected-location-names').val().split(',');
                var index = currentIds.indexOf(id.toString());
                if (index !== -1) {
                    currentIds.splice(index, 1);
                    currentNames.splice(index, 1);
                }
                $('#selected-location-ids').val(currentIds.join(','));
                $('#selected-location-names').val(currentNames.join(','));
            }


        });

        // Function to toggle all checkboxes
        function toggleAllPermissions() {
            let checkboxes = document.querySelectorAll('.permission-checkbox');
            let isChecked = document.getElementById('select-all').checked;

            checkboxes.forEach(function (checkbox) {
                checkbox.checked = isChecked;
            });
        }
    </script>

    <style>
        .list-group-item.selected {
            background-color: #007bff;
            color: white;
        }
    </style>

@endpush
