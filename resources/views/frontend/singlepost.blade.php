
@extends('frontend.master')

@section('title')
Single Post page
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endpush

@section('content')

    <section class="container">
        <div class="page-container">
            <div class="page-content">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header pt-0">
                        <h3 class="card-title mb-4">{{$post->title}}</h3>
                        <div class="blog-media mb-4">
                            <img src="/postimage/{{$post->image}}" alt="" class="w-100">
                            <a href="#" class="badge badge-primary">#Salupt</a>
                        </div>
                        <small class="small text-muted">
                            <a href="#" class="text-muted">POST BY: {{$post->author_name}}</a>
                            <span class="px-2">·</span>
                            <span>{{$post->created_at->diffForHumans()}}</span>
                            <span class="px-2">·</span>
                            <a href="#" class="text-muted">{{ count($post->comments) }} Comments</a>
                        </small>
                    </div>
                    <div class="card-body border-top">
                        <p class="my-3">{{$post->content}}</p>
                    </div>

                    <div class="card-footer">
                        <h6 class="mt-5 mb-3 text-center"><a href="#" class="text-dark">Comments {{ count($post->comments) }}</a></h6>
                        <hr>
                        
                        @foreach ($post->comments as $key => $comment)

                        <div class="comment media mt-5">
                            <img src="{{asset('assets/imgs/avatar-1.jpg')}}" class="mr-3 thumb-sm rounded-circle" alt="...">

                            <div class="media-body">
                                <h6 class="mt-0">{{$comment->visitor_name}}</h6>
                                <span>{{$comment->created_at->diffForHumans()}}</span>
                                <p>{{$comment->body}}</p>
                                <a class="reply-button" class="text-dark small font-weight-bold"><i class="ti-back-right"></i> Replay</a>
                                {{-- <button class="reply-button">Reply</button> --}}
                                {{-- <div id="reply-container"></div> --}}
                                <div class="reply-form" style="display: none;">
                                    @include('frontend.reply-form')
                                </div>

                                @foreach ($comment->replies as $key => $reply )

                                <div class="media mt-5">
                                    <a class="mr-3" href="#">
                                        <img src="{{asset('assets/imgs/avatar.jpg')}}" class="thumb-sm rounded-circle" alt="...">
                                    </a>
                                    <div class="media-body align-items-center">
                                        <h6 class="mt-0">{{$reply->visitor_name}}</h6>
                                        <span>{{$reply->created_at->diffForHumans()}}</span>
                                        <p>{{$reply->body}}</p>
                                        {{-- <a href="#" class="text-dark small font-weight-bold"><i class="ti-back-right"></i> Replay</a> --}}
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>

                        @endforeach

                        <h6 class="mt-5 mb-3 text-center"><a href="#" class="text-dark">Write Your Comment</a></h6>
                        <hr>
                        @auth
                        <form action="{{route('comment.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="col-12 form-group">
                                    <textarea name="body" id="" cols="30" rows="5" class="form-control" placeholder="Enter Your Comment Here"></textarea>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="text" name="visitor_name" class="form-control" value={{$user->name}}>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="email" name="visitor_email" class="form-control" value={{$user->email}}>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="url" name="visitor_website" class="form-control" placeholder="Website">
                                </div>
                                <div class="form-group col-12">
                                    <button class="btn btn-primary btn-block">Post Comment</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <form action="{{route('comment.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="col-12 form-group">
                                    <textarea name="body" id="" cols="30" rows="5" class="form-control" placeholder="Enter Your Comment Here"></textarea>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="text" name="visitor_name" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="email" name="visitor_email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="url" name="visitor_website" class="form-control" placeholder="Website">
                                </div>
                                <div class="form-group col-12">
                                    <button class="btn btn-primary btn-block">Post Comment</button>
                                </div>
                            </div>
                        </form>
                        @endauth
                    </div>
                </div>

                <h6 class="mt-5 text-center">Related Posts</h6>
                <hr>
                <div class="row">

                    <div class="col-md-6 col-lg-4">
                        <div class="card mb-5">
                            <div class="card-header p-0">
                                <div class="blog-media">
                                    <img src="{{asset('assets/imgs/blog-2.jpg')}}" alt="" class="w-100">
                                    <a href="#" class="badge badge-primary">#Placeat</a>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <h6 class="card-title mb-2"><a href="#" class="text-dark">Voluptates Corporis Placeat</a></h6>
                                <small class="small text-muted">January 20 2019
                                    <span class="px-2">-</span>
                                    <a href="#" class="text-muted">34 Comments</a>
                                </small>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Sidebar -->
            <div class="page-sidebar">
                <h6 class=" ">Tags</h6>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#iusto</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#quibusdam</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#officia</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#animi</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#mollitia</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#quod</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#ipsa at</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#dolor</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#incidunt</a>
                <a href="javascript:void(0)" class="badge badge-primary m-1">#possimus</a>

                <div class="ad-card d-flex text-center align-items-center justify-content-center mt-4">
                    <span href="#" class="font-weight-bold">ADS</span>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

{{-- <script>
    $(document).ready(function() {
        $('#show-reply-form').click(function() {
            $('#reply-form').toggle();
        });
    });
</script> --}}
{{-- <script>
    function getCommentId(commentID){
        // localStorage.setItem('commentId',commentId);
        document.getElementById("commentId").value = commentID;
    }
</script> --}}
<script>
    $(document).ready(function() {
        $('.reply-button').click(function() {
            // Find the closest reply-form to the clicked button and toggle its visibility
            $(this).closest('.comment').find('.reply-form').toggle();
            // $('.reply-form').toggle();
        });
        // $('.reply-form form').submit(function(event) {
        // event.preventDefault(); // Prevent the default form submission

        // // You can add code here to handle the form submission, such as sending data to the server via AJAX.
        // });
    });
</script>
@endpush
