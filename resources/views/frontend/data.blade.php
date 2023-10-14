@foreach ($posts as $post)
    <div class="col-lg-6">
        <div class="card text-center mb-5">
            <div class="card-header p-0">
                <div class="blog-media">
                    <img src="/postimage/{{ $post->image }}" alt="" class="w-100">
                    <a href="#" class="badge badge-primary">#Placeat</a>
                </div>
            </div>
            <div class="card-body px-0">
                <h5 class="card-title mb-2">{{ $post->title }}</h5>
                <small class="small text-muted">{{ $post->updated_at }}
                    <span class="px-2">-</span>
                    <a href="#" class="text-muted">34 Comments</a>
                </small>
                <p class="my-2">{{ $post->content }}</p>
            </div>
            <div class="card-footer p-0 text-center">
                <a href="{{ route('blog.post.details', $post->id) }}" class="btn btn-outline-dark btn-sm">READ MORE</a>
            </div>
        </div>
    </div>
@endforeach
