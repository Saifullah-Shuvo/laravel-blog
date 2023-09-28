<nav class="navbar custom-navbar navbar-expand-md navbar-light bg-info sticky-top">
    <div class="container">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('component')}}">Component</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('singlepost')}}">Single Post</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <div class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('login')}}" class="ml-4 btn btn-dark mt-1 btn-sm">login</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('register')}}" class="ml-4 btn btn-dark mt-1 btn-sm">register</a>
                </li>
            </div>
        </div>
    </div>
</nav>
