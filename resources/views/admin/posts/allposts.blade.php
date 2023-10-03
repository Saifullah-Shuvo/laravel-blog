<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SteveBlog | Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @stack('css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.partials.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('admin.partials.settings')
            <!-- partial -->

            <!-- partial:partials/_sidebar.html -->
            @include('admin.partials.sidebar')
            <!-- partial -->

            <div class="main-panel">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('danger'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>
                        {{session()->get('danger')}}
                    </div>
                @endif
                <div class="content-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-sm-center">Admin Posts</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Posted By</th>
                                                    <th>User type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin)
                                                <tr>
                                                    <td>{{$admin->title}}</td>
                                                    <td>{{$admin->content}}</td>
                                                    <td>
                                                        <img src="/postimage/{{$admin->image}}" alt="post image">
                                                    </td>
                                                    <td>
                                                        @if($admin->post_status == 'active')
                                                        <a href="{{route('blog.post.reject',$admin->id)}}" onclick="return confirm('Are you sure to reject this post?')">
                                                            <label class="btn btn-success btn-sm">Active</label>
                                                        </a>
                                                        @else
                                                        <a href="{{route('blog.post.accept',$admin->id)}}" onclick="return confirm('Are you sure to active this post?')">
                                                            <label class="btn btn-danger btn-sm">Inactive</label>
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td>{{$admin->author_name}}</td>
                                                    <td>{{$admin->user_type}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.posts', ['id' => $admin->id]) }}">
                                                            <button class="btn btn-outline-info btn-sm">edit</button>
                                                        </a>
                                                        <a href="{{ route('admin.delete.posts', ['id' => $admin->id]) }}">
                                                        <button class="btn btn-outline-danger btn-sm" onclick="return myFunction()">delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <h4 class="card-title text-sm-center">Users Posts</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Posted By</th>
                                                    <th>User type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>{{$user->title}}</td>
                                                    <td>{{$user->content}}</td>
                                                    <td>
                                                        <img src="/postimage/{{$user->image}}" alt="post image">
                                                    </td>
                                                    <td>
                                                        @if($user->post_status == 'active')
                                                        <a href="{{route('blog.post.reject',$user->id)}}" onclick="return confirm('Are you sure to reject this post?')">
                                                            <label class="btn btn-success btn-sm">Active</label>
                                                        </a>
                                                        @else
                                                        <a href="{{route('blog.post.accept',$user->id)}}" onclick="return confirm('Are you sure to active this post?')">
                                                            <label class="btn btn-danger btn-sm">Inactive</label>
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td>{{$user->author_name}}</td>
                                                    <td>{{$user->user_type}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.posts', ['id' => $user->id]) }}">
                                                            <button class="btn btn-outline-info btn-sm">edit</button>
                                                        </a>
                                                        <a href="{{ route('admin.delete.posts', ['id' => $user->id]) }}">
                                                        <button class="btn btn-outline-danger btn-sm" onclick="return myFunction()">delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Striped Table</h4>
                                    <p class="card-description">
                                        Add class <code>.table-striped</code>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        User
                                                    </th>
                                                    <th>
                                                        First name
                                                    </th>
                                                    <th>
                                                        Progress
                                                    </th>
                                                    <th>
                                                        Amount
                                                    </th>
                                                    <th>
                                                        Deadline
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="../../images/faces/face1.jpg" alt="image" />
                                                    </td>
                                                    <td>
                                                        Herman Beck
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $ 77.99
                                                    </td>
                                                    <td>
                                                        May 15, 2015
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="../../images/faces/face2.jpg" alt="image" />
                                                    </td>
                                                    <td>
                                                        Messsy Adam
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $245.30
                                                    </td>
                                                    <td>
                                                        July 1, 2015
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="../../images/faces/face3.jpg" alt="image" />
                                                    </td>
                                                    <td>
                                                        John Richards
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $138.00
                                                    </td>
                                                    <td>
                                                        Apr 12, 2015
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="../../images/faces/face4.jpg" alt="image" />
                                                    </td>
                                                    <td>
                                                        Peter Meggik
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $ 77.99
                                                    </td>
                                                    <td>
                                                        May 15, 2015
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="../../images/faces/face5.jpg" alt="image" />
                                                    </td>
                                                    <td>
                                                        Edward
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 35%" aria-valuenow="35"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $ 160.25
                                                    </td>
                                                    <td>
                                                        May 03, 2015
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="../../images/faces/face6.jpg" alt="image" />
                                                    </td>
                                                    <td>
                                                        John Doe
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 65%" aria-valuenow="65"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $ 123.21
                                                    </td>
                                                    <td>
                                                        April 05, 2015
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="../../images/faces/face7.jpg" alt="image" />
                                                    </td>
                                                    <td>
                                                        Henry Tom
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 20%" aria-valuenow="20"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $ 150.00
                                                    </td>
                                                    <td>
                                                        June 16, 2015
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/progressbar.js/progressbar.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        function myFunction() {
            if(!confirm("Are You Sure to delete this?"))
            event.preventDefault();
        }
    </script>
    <script>
        function warning() {
            if(!confirm("Are You Sure to make this change?"))
            event.preventDefault();
        }
    </script>
    @stack('js')
</body>

</html>
