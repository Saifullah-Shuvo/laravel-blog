@extends('frontend.master')

@section('title')
    Home
@endsection

@push('css')
@endpush

@section('content')
    <div class="container">
        <section>
            <div class="feature-posts">
                <a href="single-post.html" class="feature-post-item">
                    <span>Featured Posts</span>
                </a>
                <a href="single-post.html" class="feature-post-item">
                    <img src="{{asset('assets/imgs/img-1.jpg')}}" class="w-100" alt="">
                    <div class="feature-post-caption">Incidunt Quaerat</div>
                </a>
                <a href="single-post.html" class="feature-post-item">
                    <img src="{{asset('assets/imgs/img-2.jpg')}}" class="w-100" alt="">
                    <div class="feature-post-caption">Culpa Ducimus</div>
                </a>
                <a href="single-post.html" class="feature-post-item">
                    <img src="{{asset('assets/imgs/img-3.jpg')}}" class="w-100" alt="">
                    <div class="feature-post-caption">Temporibus Simile</div>
                </a>
                <a href="single-post.html" class="feature-post-item">
                    <img src="{{asset('assets/imgs/img-4.jpg')}}" class="w-100" alt="">
                    <div class="feature-post-caption">Adipisicing</div>
                </a>
            </div>
        </section>
        <hr>
        <div class="page-container">
            <div class="page-content">
                {{-- <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title">Voluptates Corporis Placeat</h5>
                    <small class="small text-muted">January 24 2019
                        <span class="px-2">-</span>
                        <a href="#" class="text-muted">32 Comments</a>
                    </small>
                </div>
                <div class="card-body">
                    <div class="blog-media">
                        <img src="assets/imgs/blog-6.jpg" alt="" class="w-100">
                        <a href="#" class="badge badge-primary">#Salupt</a>
                    </div>
                    <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos saepe dolores et nostrum porro odit reprehenderit animi, est ratione fugit aspernatur ipsum. Nostrum placeat hic saepe voluptatum dicta ipsum beatae.</p>
                </div>

                <div class="card-footer d-flex justify-content-between align-items-center flex-basis-0">
                    <button class="btn btn-primary circle-35 mr-4"><i class="ti-back-right"></i></button>
                    <a href="single-post.html" class="btn btn-outline-dark btn-sm">READ MORE</a>
                    <a href="#" class="text-dark small text-muted">By : Joe Mitchell</a>
                </div>
                </div> --}}
                <hr>
                <div id="data-wrapper">
                    <div class="row">
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
                                        <small class="small text-muted">{{ $post->created_at->diffForHumans() }}
                                            <span class="px-2">-</span>
                                            <a href="#" class="text-muted">{{count($post->comments)}} Comments</a>
                                        </small>
                                        <p class="my-2">{{ $post->content }}</p>
                                    </div>
                                    <div class="card-footer p-0 text-center">
                                        <a href="{{ route('blog.post.details', $post->id) }}"
                                            class="btn btn-outline-dark btn-sm">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{ $posts->links() }}
            </div>
            <!-- Sidebar -->
            <div class="page-sidebar text-center">
                <h6 class="sidebar-title section-title mb-4 mt-3">About</h6>
                <img src="{{asset('assets/imgs/avatar.jpg')}}" alt="" class="circle-100 mb-3">
                <div class="socials mb-3 mt-2">
                    <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
                    <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
                    <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
                    <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
                    <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
                </div>
                <p>Consectetur adipisicing elit Possimus tempore facilis dolorum veniam impedit nobis. Quia, soluta incidunt
                    nesciunt dolorem reiciendis iusto.</p>


                <h6 class="sidebar-title mt-5 mb-4">Newsletter</h6>
                <form action="">
                    <div class="subscribe-wrapper">
                        <input type="email" class="form-control" placeholder="Email Address">
                        <button type="submit" class="btn btn-primary"><i class="ti-location-arrow"></i></button>
                    </div>
                </form>

                <h6 class="sidebar-title mt-5 mb-4">Tags</h6>
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

                <h6 class="sidebar-title mt-5 mb-4">Instagram</h6>
                <div class="row px-3">
                    <div class="col-4 p-1 figure">
                        <a href="#" class="figure-img">
                            <img src="{{asset('assets/imgs/insta-1.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="col-4 p-1 figure">
                        <a href="#" class="figure-img">
                            <img src="{{asset('assets/imgs/insta-2.jpg')}}" alt="" class="w-100 m-0">
                        </a>
                    </div>
                    <div class="col-4 p-1 figure">
                        <a href="#" class="figure-img">
                            <img src="{{asset('assets/imgs/insta-3.jpg')}}" alt="" class="w-100">
                        </a>
                    </div>
                    <div class="col-4 p-1 figure">
                        <a href="#" class="figure-img">
                            <img src="{{asset('assets/imgs/insta-4.jpg')}}" alt="" class="w-100 m-0">
                        </a>
                    </div>
                    <div class="col-4 p-1 figure">
                        <a href="#" class="figure-img">
                            <img src="{{asset('assets/imgs/insta-5.jpg')}}" alt="" class="w-100">
                        </a>
                    </div>
                    <div class="col-4 p-1 figure">
                        <a href="#" class="figure-img">
                            <img src="{{asset('assets/imgs/insta-6.jpg')}}" alt="" class="w-100 m-0">
                        </a>
                    </div>
                </div>

                <figure class="figure mt-5">
                    <a href="single-post.html" class="figure-img">
                        <img src="{{asset('assets/imgs/img-4.jpg"')}} alt="" class="w-100">
                        <figcaption class="figcaption">Laboriosam</figcaption>
                    </a>
                </figure>

                <h6 class="sidebar-title mt-5 mb-4">Popular Posts</h6>
                <div class="card mb-4">
                    <a href="single-post.html" class="overlay-link"></a>
                    <div class="card-header p-0">
                        <div class="blog-media">
                            <img src="{{asset('assets/imgs/blog-6.jpg')}}" alt="" class="w-100">
                            <a href="#" class="badge badge-primary">#Lorem</a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h5 class="card-title mb-2">Corporis Placeat</h5>
                        <small class="small text-muted"><i class="ti-calendar pr-1"></i> January 24 2019
                        </small>
                        <p class="my-2">consectetur adipisicing Cum veritatis minus iustorpo cupiditate voluptas ...</p>
                    </div>
                </div>

                <div class="media text-left mb-4">
                    <a href="single-post.html" class="overlay-link"></a>
                    <img class="mr-3" src="{{asset('assets/imgs/blog-1.jpg')}}" width="100px" alt="Generic placeholder image">
                    <div class="media-body">
                        <h6 class="mt-0">Nobis Mollitia</h6>
                        <p class="mb-2"> deserunt quisqua...</p>
                        <p class="text-muted small"><i class="ti-calendar pr-1"></i> January 02 2019</p>
                    </div>
                </div>
                <div class="media text-left mb-4">
                    <a href="single-post.html" class="overlay-link"></a>
                    <img class="mr-3" src="{{asset('assets/imgs/blog-2.jpg')}}" width="100px" alt="Generic placeholder image">
                    <div class="media-body">
                        <h6 class="mt-0">Officiis Laborum</h6>
                        <p class="mb-2"> deserunt quisqua...</p>
                        <p class="text-muted small"><i class="ti-calendar pr-1"></i> January 10 2019</p>
                    </div>
                </div>
                <div class="media text-left mb-4">
                    <a href="single-post.html" class="overlay-link"></a>
                    <img class="mr-3" src="{{asset('assets/imgs/blog-3.jpg')}}" width="100px" alt="Generic placeholder image">
                    <div class="media-body">
                        <h6 class="mt-0">Sapiente fugit vero</h6>
                        <p class="mb-2"> deserunt ard quisqua...</p>
                        <p class="text-muted small"><i class="ti-calendar pr-1"></i> January 04 2019</p>
                    </div>
                </div>
                <div class="ad-card d-flex text-center align-items-center justify-content-center">
                    <span href="#" class="font-weight-bold">ADS</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
@endpush
