@extends('admin.layouts.app')

@push('style')

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
            <!-- Agency form -->
            <form action="{{ route('store-agency') }}" method="POST" enctype="multipart/form-data" class="flex-fill form-validate-jquery">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Agency Name -->
                                    <div class="col-md-12">
                                        <label class="col-form-label">Agency Name <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="agency_name" class="form-control" placeholder="Agency Name" value="{{ old('agency_name') }}">
                                            @if ($errors->has('agency_name'))
                                                <span class="text-danger">{{ $errors->first('agency_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-12">
                                        <label class="col-form-label">Address</label>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">City</label>
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}">
                                            @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- State -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">State</label>
                                        <div class="form-group">
                                            <select name="state_id" class="form-control select2" data-placeholder="Select State">
                                                <option></option>
                                                @foreach($states as $state)
                                                    <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                            <input type="text" name="zip_code" class="form-control" placeholder="Zip Code" value="{{ old('zip_code') }}">
                                            @if ($errors->has('zip_code'))
                                                <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">Phone</label>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'" value="{{ old('phone') }}">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Secondary Phone -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">Secondary Phone</label>
                                        <div class="form-group">
                                            <input type="text" name="secondary_phone" class="form-control" placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'" value="{{ old('secondary_phone') }}">
                                            @if ($errors->has('secondary_phone'))
                                                <span class="text-danger">{{ $errors->first('secondary_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Fax -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">Fax</label>
                                        <div class="form-group">
                                            <input type="text" name="fax" class="form-control" placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'" value="{{ old('fax') }}">
                                            @if ($errors->has('fax'))
                                                <span class="text-danger">{{ $errors->first('fax') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Account Number -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Account Number</label>
                                        <div class="form-group">
                                            <input type="text" name="account_number" class="form-control" placeholder="Account Number" value="{{ old('account_number') }}">
                                            @if ($errors->has('account_number'))
                                                <span class="text-danger">{{ $errors->first('account_number') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Bank -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Default Bank Account</label>
                                        <div class="form-group">
                                            <select name="bank_id" class="form-control select2" data-placeholder="Select Bank">
                                                <option></option>
                                                @foreach($banks as $bank)
                                                    <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>{{ $bank->bank_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('bank_id'))
                                                <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Custom Message -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Custom Message</label>
                                        <div class="form-group">
                                            <textarea name="custom_message" class="form-control" rows="3" placeholder="Custom Message">{{ old('custom_message') }}</textarea>
                                            @if ($errors->has('custom_message'))
                                                <span class="text-danger">{{ $errors->first('custom_message') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <!-- Logo Preview -->
                                            <img id="logo-preview"
                                                 src="{{asset('backend/img/avatars/avatar-5.jpg')}}"
                                                 class="rounded-circle img-responsive mt-2"
                                                 width="128"
                                                 height="128"
                                                 alt="Logo Preview" />

                                            <!-- Upload Button -->
                                            <div class="mt-2">
                                                <label for="logo-input" class="btn btn-primary">
                                                    <i class="fas fa-upload"></i> Upload Logo
                                                </label>
                                                <input type="file"
                                                       name="logo"
                                                       id="logo-input"
                                                       class="d-none"
                                                       accept="image/*" />
                                            </div>

                                            <small>For best results, use an image at least 128px by 128px in .jpg format</small>

                                            <!-- Hidden Input for Form Submission -->
                                            <input type="hidden" id="logo-hidden-input">
                                        </div>
                                    </div>



                                    <!-- Save Button -->
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-primary float-end">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /agency form -->
        </div>
        <!-- /form validation -->
    </div>
    <!-- /content area -->

    <!-- Modal -->
    <div class="modal fade" id="agencyModal" tabindex="-1" aria-labelledby="agencyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agencyModalLabel">Agency Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="agency_name" class="form-label">Agency Name</label>
                                <input type="text" class="form-control" id="agency_name" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="state_id" class="form-label">State</label>
                                <input type="text" class="form-control" id="state_id" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="zip_code" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="secondary_phone" class="form-label">Secondary Phone</label>
                                <input type="text" class="form-control" id="secondary_phone" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="fax" class="form-label">Fax</label>
                                <input type="text" class="form-control" id="fax" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="account_number" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="bank_id" class="form-label">Bank</label>
                                <input type="text" class="form-control" id="bank_id" disabled>
                            </div>
                            <div class="col-md-12">
                                <label for="custom_message" class="form-label">Custom Message</label>
                                <textarea class="form-control" id="custom_message" rows="3" disabled></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="logo" class="form-label">Logo</label>
                                <img id="logo" class="img-fluid rounded-circle" width="128" height="128" src="" alt="Agency Logo">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')
      <script>
          document.getElementById('logo-input').addEventListener('change', function(event) {
              const file = event.target.files[0]; // Get the selected file
              if (file) {
                  // Ensure the file is an image
                  if (file.type.startsWith('image/')) {
                      const reader = new FileReader();

                      // Load the image file and update the preview
                      reader.onload = function(e) {
                          document.getElementById('logo-preview').src = e.target.result;
                      };
                      reader.readAsDataURL(file);

                      // Convert the image file to Base64 and save in the hidden input
                      reader.onloadend = function() {
                          document.getElementById('logo-hidden-input').value = e.target.result;
                      };
                  } else {
                      alert('Please select a valid image file.');
                      this.value = ''; // Reset file input
                  }
              }
          });


          $(document).ready(function () {
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });

            // Apply input mask
            $(":input").inputmask();
        });
    </script>
@endpush
