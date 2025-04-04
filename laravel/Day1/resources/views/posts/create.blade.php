<x-layout>

    <div class="container">
        <h2>Create Post</h2>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="post_creator" class="form-label">Post Creator</label>
                <input type="text" class="form-control" id="post_creator" name="post_creator" required>
            </div>

            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>

</x-layout>