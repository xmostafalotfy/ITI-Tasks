<x-layout>

    <div class="container">
        <h2>Edit Post</h2>
        <form action="{{ route('posts.edit', $post['id']) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post['title'] }}" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $post['des'] }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="post_creator" class="form-label">Post Creator</label>
                <input type="text" class="form-control" id="post_creator" name="post_creator" value="{{ $post['posted_by'] }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</x-layout>