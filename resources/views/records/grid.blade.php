<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th></th>

            @if($visibleColumns['file_number'])
                <th>File Number</th>
            @endif

            @if($visibleColumns['manager_name'])
                <th>Manager</th>
            @endif

            @if($visibleColumns['company_name'])
                <th>Company</th>
            @endif
        </tr>

        <tr>
            <th></th>

            @if($visibleColumns['file_number'])
                <th>
                    <input type="text" name="file_number" class="form-control filter">
                </th>
            @endif

            @if($visibleColumns['manager_name'])
                <th>
                    <input type="text" name="manager_name" class="form-control filter">
                </th>
            @endif

            @if($visibleColumns['company_name'])
                <th>
                    <input type="text" name="company_name" class="form-control filter">
                </th>
            @endif
        </tr>
    </thead>

    <tbody>
        @foreach($records as $record)

        <tr>
            <td>
                <button
                    class="btn btn-sm btn-outline-primary expand-row"
                    data-id="{{ $record->id }}">
                    ↓
                </button>
            </td>

            @if($visibleColumns['file_number'])
                <td>{{ $record->file_number }}</td>
            @endif

            @if($visibleColumns['manager_name'])
                <td>{{ $record->manager_name }}</td>
            @endif

            @if($visibleColumns['company_name'])
                <td>{{ $record->company_name }}</td>
            @endif
        </tr>

        <tr
            class="detail-row"
            id="detail-{{ $record->id }}"
            style="display:none;">

            <td colspan="100%"></td>

        </tr>

        @endforeach
    </tbody>
</table>