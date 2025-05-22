<table id="agent-broker-table" class="table table-striped datatables-reponsive">
    <thead>
    <tr>
        <th>Agency</th>
         <th>Insured Name</th>
         <th>Vehicle Number </th>
        <th class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($forms as $row)
        <tr>
            <td>{{ $row->agency_name . ' ' . $row->agency_address  }}</td>
            <td>{{ $row->insured_name  }}</td>
            <td>{{ $row->vehicle_number  }}</td>
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
