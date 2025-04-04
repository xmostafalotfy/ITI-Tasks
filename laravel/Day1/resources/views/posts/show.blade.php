<x-layout>
    <div class="container mt-4">
        <div class="card mb-3">
            <div class="card-header bg-light">
                <strong>Post Info</strong>
            </div>
            <div class="card-body">
                <p><strong>Title :-</strong> {{ $post['title'] }}</p>
                <p><strong>Description :-</strong> {{ $post['des'] }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <strong>Post Creator Info</strong>
            </div>
            <div class="card-body">
                <p><strong>Name :-</strong> {{ $post['posted_by'] }}</p>
                <p><strong>Created At :-</strong> {{ explode(' ', $post['created_at'])[0] }}</p>
            </div>
        </div>
    </div>

</x-layout>