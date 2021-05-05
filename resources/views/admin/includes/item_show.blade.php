<table class="table  table-borderless table-responsive">
    <tbody>
        <tr>
            <th>
                ID
            </th>
            <td>
                {{ $item->id }}
            </td>
        </tr>
        <tr>
            <th>
                Title
            </th>
            <td>
                {{ $item->title }}
            </td>
        </tr>
        <tr>
            <th>
                Description
            </th>
            <td>
                {{ $item->body }}
            </td>
        </tr>
        <tr>
            <th>
                Quantity
            </th>
            <td>
                {{ $item->quantity }}
            </td>
        </tr>
        <tr>
            <th>
                Author
            </th>
            <td>
                {{ $item->user->name }}
            </td>
        </tr>
        <tr >
            <th>
                Created At
            </th>
            <td>
                {{ $item->created_at->format('Y-m-d')  }}
            </td>
        </tr>
    </tbody>
</table>
