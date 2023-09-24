<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="{{route('dashboard')}}">Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="{{route('create.posts')}}">
            <i class="bi bi-cloud-plus-fill"></i> Create blog
        </a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="{{route('user.posts')}}">
            <i class="bi bi-cloud-plus-fill"></i> All blogs
        </a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="{{route('user.posts')}}">
            <i class="bi bi-cloud-plus-fill"></i> Edit blog
        </a>
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog Manage
            </a>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('create.posts')}}">Create blog</a>
                <a class="dropdown-item" href="{{route('user.posts')}}">All blogs</a>
                <a class="dropdown-item" href="">Edit blogs</a>
                {{-- <a class="dropdown-item" href="{{route('edit.posts')}}">Edit blogs</a> --}}
            </div>
        </div>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="#!">Overview</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="#!">Events</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="{{route('profile.edit')}}">Update
            Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();">
                Logout
            </a>
        </form>
    </div>
</div>


