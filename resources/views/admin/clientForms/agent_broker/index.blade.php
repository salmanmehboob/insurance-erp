<table id="agent-broker-table" class="table table-striped datatables-reponsive">
    <thead>
    <tr>
        <th>Agency Name</th>
        <th>Agency Phone</th>
        <th>Insurance Company Name</th>
        <th>Current Agency</th>
        <th>Email</th>
        <th class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($forms as $row)
        <tr>
            <td>{{ $row->agency_name ?? '' }}</td>
            <td>{{ $row->agency_phone ?? '' }}</td>
            <td>{{ $row->insurance_company_name ?? '' }}</td>
            <td>{{ $row->current_agency ?? '' }}</td>
            <td>{{ $row->email ?? '' }}</td>
            <td>    
                <div class="d-flex action-buttons">
                    <a target="_blank" title="View" href="{{ route('show.form', ['id' =>$row->id, 'type' => $type]) }}"
                       class="text-primary me-2">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
