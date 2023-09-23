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
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-md-8">
                                <h1>{{$post->title}}</h1>
                            {{-- <p>Published on September 23, 2023 by John Doe</p> --}}
                            {{-- <img src="post-image.jpg" alt="Post Image" class="img-fluid"> --}}
                                <p>{{$post->content}}</p>
                        </div>
                        @endforeach
                    </div>
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
