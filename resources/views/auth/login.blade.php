@extends('frontend.master')

@section('title')
Login
@endsection

@push('css')

@endpush

@section('content')

<!-- Page Header -->
<header class="header header-mini">
    <div class="header-title">Login</div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
</header>
<!-- End Of Page Header -->
<section class="container">
    <div class="page-container">
        <div class="page-content">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    {{-- @if ($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <label for="name"><b>Email</b></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    @error('email')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                    @error('password')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember_me">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember_me">
                        <span><b>Remember me</b></span>
                    </label>
                </div>
                <div class="form-check">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"> <b>Forgot your password? </b> </a>
                    @endif
                    <button type="submit" class="btn btn-dark">LOG IN</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@push('js')

@endpush
