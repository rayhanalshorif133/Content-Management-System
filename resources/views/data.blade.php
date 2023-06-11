<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contents as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- rander design --}}
{{ $contents->links() }}
{{ $contents->links('pagination::bootstrap-4') }}
{{-- rander design --}}
