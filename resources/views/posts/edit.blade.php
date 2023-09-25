<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Steveblog | Dashboard</title>
    {{-- User sidebar CSS --}}
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .custom-image{
            width: 250px;
            height: 250px;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="container p-1 text-center bg-info text-white">
            <h4>
                {{ Auth::user()->name }}{{ __('\'s Dashboard') }}
            </h4>
        </div>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <hr>
            <hr>
            @include('frontend.userdashboard.sidebar')
            <!-- Page content wrapper-->
            <div id="page-content-wrapper" class="w-100">
                <!-- Top navigation-->
                <!-- Page content-->
                <div class="container mt-5">
                    <h1 class="text-center">Edit a Blog Post</h1>
                    <form method="post" action="{{ route('update.posts', ['id' => $post->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{$post->title}}" required>
                                @error('title')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                        </div>
                        {{-- @dd($post) --}}
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                                @error('image')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image Preview</label>
                            <img src="{{asset('postimage/'.$post->image)}}" alt="Blog Image" class="img-thumbnail custom-image">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="8" required>{{$post->content}}</textarea>
                            @error('content')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
    {{-- User Sidebar JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="usersidebar/js/scripts.js"></script>
</body>
</html>
