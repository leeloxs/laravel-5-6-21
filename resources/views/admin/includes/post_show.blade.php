<table class="table  table-borderless table-responsive">
    <tbody>
        <tr>
            <th>
                ID
            </th>
            <td>
                {{ $post->id }}
            </td>
        </tr>
        <tr>
            <th>
                Title
            </th>
            <td>
                {{ $post->title }}
            </td>
        </tr>
        <tr>
            <th>
                Description
            </th>
            <td>
                {{ $post->body }}
            </td>
        </tr>
        <tr>
            <th>
                Author
            </th>
            <td>
                {{ $post->user->name }}
            </td>
        </tr>
        <tr >
            <th>
                Created At
            </th>
            <td>
                {{ $post->created_at->format('Y-m-d')  }}
            </td>
        </tr>
    </tbody>
</table>
