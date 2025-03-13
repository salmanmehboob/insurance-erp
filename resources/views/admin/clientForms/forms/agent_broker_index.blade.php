<table id="agent-broker-table" class="table table-striped datatables-reponsive">
    <thead>
    <tr>
        <th>Client</th>
        <th>Agent</th>
        <th>Agency</th>
        <th>Insurance Company</th>
        <th class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($forms as $row)
        <tr>
            <td>{{ $row->client->applicant_name ?? '' }}</td>
            <td>{{ $row->agent->name ?? '' }}</td>
            <td>{{ $row->agency->agency_name ?? ''   }}</td>
            <td>{{ $row->insuranceCompany->name ?? '' }}</td>
            <td>
                <div class="d-flex action-buttons">

                    <a title="View" href="{{ route('show.form', ['id' =>$row->id ,'type' => $type]) }}"
                       class="text-primary me-2">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
