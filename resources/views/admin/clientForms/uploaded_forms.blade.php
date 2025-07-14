@extends('admin.layouts.app')

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">{{ $title }}</span></h4>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <h5>Uploaded {{ ucwords(str_replace('_', ' ', $type)) }} Forms for Client  {{ $client->applicant_name }}</h5>
                @if($uploadedForms->count())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>File</th>
                                <th>Uploaded At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uploadedForms as $form)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ basename($form->path) }}</td>
                                    <td>{{ $form->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a href="{{ asset('storage/'.$form->path) }}" target="_blank" class="btn btn-info btn-sm">View/Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">No uploaded forms found for this client and form type.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
