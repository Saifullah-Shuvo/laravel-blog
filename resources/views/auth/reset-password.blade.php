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
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout> --}}
            
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    
                    <div>
                        <label for="email"><b>Email</b></label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$request->email}}" required>
                        @error('email')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <!-- Password -->

                    <div>
                        <label for="password"><b>Password</b></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="new password" required>
                        @error('password')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->

                    <div>
                        <label for="password_confirmation"><b>Confirm Password</b></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="confirm password" required>
                        @error('confirm_password')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div>
                        <button>
                            Reset Password
                        </button>
                    </div>
                </form>
            
        </div>
    </div>
</section>

@endsection

@push('js')

@endpush


