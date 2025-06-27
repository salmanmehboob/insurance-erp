@extends('admin.layouts.app')
@push('style')
    <link href="{{asset('backend/vendor/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <style>
        .tab-error {
            color: #dc3545 !important;
            font-weight: bold;
            border-bottom: 2px solid #dc3545 !important;
        }
    </style>
@endpush
@section('content')
    <!--**********************************
            Content body start
        ***********************************-->

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4> <span class="font-weight-semibold"></span>{{$title}}
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>


        </div>


    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Form validation -->
        <div class="card">

            <!-- Registration form -->
            <form action="{{route('update-user', $user->id)}}" method="post"
                  name="user_registration" class="flex-fill form-validate-jquery">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="col-form-label  ">Name <span
                                                class="text-danger">*</span> </label>
                                        <div
                                            class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="text" required class="form-control required-field"
                                                   name="name"
                                                   value="{{old('name') ?? $user->name}}"
                                                   placeholder=" Name">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                            @if ($errors->has('name'))
                                                <span
                                                    class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label class="col-form-label  ">Email <span class="text-danger">*</span></label>
                                        <div
                                            class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="email" name="email"
                                                   class="form-control required-field"
                                                   placeholder="Your email"
                                                   value="{{ old('email')?? $user->email}}">
                                            <div class="form-control-feedback">
                                                <i class="icon-mention text-muted"></i>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span
                                                    class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label  ">Password   </label>
                                        <div
                                            class="form-group form-group-feedback form-group-feedback-right">
                                            <input   type="password" name="password"
                                                   class="form-control  " id="password"
                                                   placeholder="Create password">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span
                                                    class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label  ">Repeat Password   </label>
                                        <div
                                            class="form-group form-group-feedback form-group-feedback-right">
                                            <input   type="password" name="password_confirmation"
                                                   class="form-control "
                                                   placeholder="Create password">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <span
                                                    class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label  ">Select Role <span
                                                class="text-danger">*</span> </label>
                                        <div
                                            class="form-group form-group-feedback form-group-feedback-right">
                                            <select data-placeholder="Select Role" required
                                                    name="role_id" id="role_id"
                                                    class="form-control select2 mb-3 required-field"
                                                    data-fouc>
                                                <option></option>
                                                @foreach($roles as $key =>  $row)
                                                    <option
                                                        {{($user->roles[0]->id == $row->id) ? 'selected' : ''}}
                                                        value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span
                                                    class="text-danger">{{ $errors->first('role_id') }}</span>
                                            @endif
                                            <span class="error-message text-danger"></span>
                                                </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit"
                                                class="btn  btn-outline-primary float-end">
                                            <b><i class="icon-plus3"></i></b> Update
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /registration form -->
        </div>
        <!-- /form validation -->

    </div>
    <!-- /content area -->
    <!--**********************************
        Content body end
    ***********************************-->

@endsection

@push('script')
    <script>    
        $(document).ready(function () { 
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });
            function shouldValidateField($input) {
                let $tabPane = $input.closest('.tab-pane');
                if ($tabPane.length === 0) {
                    // Not inside any tab-pane, always validate
                    return true;
                }
                let tabId = $tabPane.attr('id');
                let $tabLink = $('.nav-link[href="#' + tabId + '"]');
                if ($tabLink.length === 0) {
                    return false;
                }
                if ($tabLink.is(':hidden') || $tabLink.parent().is(':hidden')) {
                    return false;
                }
                return true;
            }

            // Real-time validation for required fields
            $(document).on('input change blur', '.required-field', function() {
                let $input = $(this);
                
                // Only validate if the field should be validated based on policy type
                if (!shouldValidateField($input)) {
                    return;
                }
                
                // let value = $input.val().trim();
                let inputName = $input.attr('name');
                let $errorSpan = $input.closest('.form-group').find('.error-message');
                let $tabPane = $input.closest('.tab-pane');
                let tabId = $tabPane.attr('id');
                let $tabLink = $('.nav-link[href="#' + tabId + '"]');

                let isCheckbox = $input.is(':checkbox');
                console.log('isCheckbox', isCheckbox);
                let value = isCheckbox ? $input.is(':checked') : $input.val().trim();


                if (!value) {
                    // Show error
                    console.log('❌ Validation Error:', {
                        fieldName: inputName,
                        fieldType: $input.attr('type') || 'select',
                        tabId: tabId,
                        message: 'This field is required.'
                    });
                    $errorSpan.text('This field is required.');
                    $tabLink.addClass('tab-error');
                } else {
                    // Remove error
                    $errorSpan.text('');
                    // Check if this tab has any other errors
                    let hasOtherErrors = $tabPane.find('.error-message').not($errorSpan).text().length > 0;
                    if (!hasOtherErrors) {
                        $tabLink.removeClass('tab-error');
                    }
                }
            });

            // On form submit
            $('form').on('submit', function (e) {
                let isValid = true;
                let firstErrorTab = null;

                // Remove previous errors
                $('.error-message').text('');
                $('.nav-link').removeClass('tab-error');

                // Validate each required field
                $('.required-field').each(function () {
                    let $input = $(this);
                    
                    // Only validate if the field should be validated based on policy type
                    if (!shouldValidateField($input)) {
                        return;
                    }
                    
                    let isCheckbox = $input.is(':checkbox');
                    let value = isCheckbox ? $input.is(':checked') : $input.val().trim();
                    let $tabPane = $input.closest('.tab-pane');
                    let tabId = $tabPane.attr('id');
                    let $tabLink = $('.nav-link[href="#' + tabId + '"]');

                    if (!value) {
                        isValid = false;
                        let inputName = $input.attr('name');
                        console.log('❌ Form Submit Validation Error:', {
                            fieldName: inputName,
                            fieldType: $input.attr('type') || 'select',
                            tabId: tabId,
                            message: 'This field is required.'
                        });
                        // Set a specific error message for checkboxes
                        let errorMsg = isCheckbox ? 'Please check this box if you want to proceed.' : 'This field is required.';
                        $input.closest('.form-group').find('.error-message').text(errorMsg);
                        $tabLink.addClass('tab-error');
                        if (!firstErrorTab) firstErrorTab = $tabLink;
                    }
                });

                // If not valid, prevent submit and switch to first error tab
                if (!isValid) {
                    e.preventDefault();
                    if (firstErrorTab) firstErrorTab.tab('show');
                }
            });
        });
    </script>   
    <script src="{{asset('assets/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/inputs/touchspin.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/demo_pages/form_validation.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/inputs/inputmask.js')}}"></script>


    <script src="{{asset('assets/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>

    <script src="{{asset('assets/global_assets/js/demo_pages/picker_date.js')}}"></script>

@endpush
