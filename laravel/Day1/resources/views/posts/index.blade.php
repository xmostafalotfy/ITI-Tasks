<x-layout>
    <div class="container mt-4">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>

        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)       
                    @php ($createDate = explode(' ', $post['created_at'])[0] ) @endphp
                    <tr>
                        <td>{{ $post['id']  }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['posted_by'] }}</td>
                        <td>{{ $createDate }}</td>
                        <td>
                            <a href="{{ route('posts.show',$post['id']) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('posts.editpage', $post['id']) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('posts.delete', $post['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>