@extends('frontend.master')

@section('title')
Forgot password
@endsection

@push('css')

@endpush

@section('content')

<!-- Page Header -->
<header class="header header-mini">
    <div class="header-title">Forgot password?</div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forgot password page</li>
        </ol>
    </nav>
</header>
<!-- End Of Page Header -->
<section class="container">
    <div class="page-container">
        <div class="page-content">
        {{-- <x-guest-layout>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </x-guest-layout> --}}
        
            <div class="mb-4 text-sm text-gray-600">
                <p>Forgot your password? No problem. 
                    Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </p>
            </div>
            <!-- Session Status -->
            {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                    @error('email')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>    

                <div class="flex items-center justify-end mt-4">
                    <button>
                        Email password Reset Link
                    </button>
                </div>
            </form>
        
        </div>
    </div>
</section>

@endsection

@push('js')

@endpush

