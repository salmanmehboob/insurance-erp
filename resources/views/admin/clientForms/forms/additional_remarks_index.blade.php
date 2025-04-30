<table id="additional-remarks-table" class="table table-striped datatables-reponsive">
    <thead>
    <tr>
        <th>Agency</th>
        <th>Name Insured</th>
        <th>Carrier</th>
        <th>NAIC Code</th>
        <th>Form No</th>
        <th>Form Title</th>
        <th class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($forms as $row)
        <tr>
            <td>{{ $row->agency_name ?? ''   }}</td>
            <td>{{ $row->name_insured ?? ''   }}</td>
            <td>{{ $row->carrier ?? ''   }}</td>
            <td>{{ $row->naic_code ?? ''   }}</td>
            <td>{{ $row->form_no ?? ''   }}</td>
            <td>{{ $row->form_title ?? ''   }}</td>

            <td>
                <div class="d-flex action-buttons">

                    <a target="_blank" title="View" href="{{ route('show.form', ['id' =>$row->id ,'type' => $type]) }}"
                       class="text-primary me-2">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
