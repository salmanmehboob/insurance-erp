@extends('admin.layouts.app')
@push('styles')

@endpush
@section('content')

    <div class="mb-3">
        <a href="{{ asset('forms/'.$formType.'.pdf') }}" class="btn btn-outline-info" download>
            @php
                $displayFormType = preg_replace('/([a-z])([A-Z])/', '$1 $2', $formType); // camelCase to space
                $displayFormType = ucwords(str_replace('_', ' ', $displayFormType)); // snake_case to space and capitalize
            @endphp
            Download Sample {{ $displayFormType }} PDF
        </a>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-white">
                        <h5 class="mb-0">Upload {{ $displayFormType }} PDF for Client  {{ $client->applicant_name }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('upload-form') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="client_id" id="modal-client-id" value="{{ $client->id }}">
                            <input type="hidden" name="form_type" id="modal-form-type" value="{{ $formType }}">
                            <div class="mb-3">
                                <label for="pdf_file" class="form-label">Select PDF File</label>
                                <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept="application/pdf" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
