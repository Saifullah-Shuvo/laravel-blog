@extends('frontend.master')

@section('title')
Register
@endsection

@push('css')

@endpush

@section('content')

<!-- Page Header -->
<header class="header header-mini">
    <div class="header-title">Registation</div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
</header>
<!-- End Of Page Header -->
<section class="container">
    <div class="page-container">
        <div class="page-content">
            <form method="POST" action="{{route('register')}}">
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
                    <label for="name"><b>Name</b></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                    @error('name')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
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
                    <label for="password_confirmation"><b>Confirm Password</b></label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                    @error('password_confirmation')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="form-check">
                    <a href="{{route('login')}}"> <b>Already registered? </b> </a>
                    <button type="submit" class="btn btn-dark">Register</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@push('js')

@endpush
