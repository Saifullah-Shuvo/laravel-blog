<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Steveblog | Dashboard</title>
    {{-- User sidebar CSS --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .custom-image{
            height: 100px;
            width: 100px;
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
                <div class="container">
                    <h1 class="text-center">All blog posts</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th col-md-1>ID</th>
                                <th col-md-2>Image</th>
                                <th col-md-2>Category</th>
                                <th col-md-3>Title</th>
                                <th col-md-4>Content</th>
                                <th col-md-2>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $serialNumber = 1;

                            @endphp
                            @foreach ($posts as $post)
                            <tr>
                                <td col-md-1>{{$serialNumber ++}}</td>
                                <td col-md-2><img src="{{asset('postimage/'.$post->image)}}" alt="Blog Image" class="img-thumbnail custom-image"></td>
                                <td col-md-2>Category</td>
                                <td col-md-3><h6>{{$post->title}}</h6></td>
                                <td col-md-4>{{$post->content}}</td>
                                <td col-md-2>
                                    <a href="{{ route('edit.posts', ['id' => $post->id]) }}">
                                        <button type="button" class="btn btn-warning">
                                            Edit
                                        </button>
                                    </a>

                                    <!-- Delete Button -->
                                    <a href=" {{route('delete.posts', ['id' => $post->id]) }}">
                                        <button type="button" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
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
