<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="{{route('dashboard')}}">Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-white" href="#!">
            <i class="bi bi-cloud-plus-fill"></i> Add blog
        </a>
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </a>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action 1</a>
                <a class="dropdown-item" href="#">Action 2</a>
                <a class="dropdown-item" href="#">Action 3</a>
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


