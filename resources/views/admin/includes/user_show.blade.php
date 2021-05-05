<table class="table  table-borderless table-responsive">
    <tbody>
        <tr>
            <th>
                ID
            </th>
            <td>
                {{ $user->id }}
            </td>
        </tr>
        <tr>
            <th>
                Name
            </th>
            <td>
                {{ $user->name }}
            </td>
        </tr>
        <tr>
            <th>
                Email
            </th>
            <td>
                {{ $user->email }}
            </td>
        </tr>
        <tr >
            <th>
                Created At
            </th>
            <td>
                {{ $user->created_at->format('Y-m-d')  }}
            </td>
        </tr>
    </tbody>
</table>
