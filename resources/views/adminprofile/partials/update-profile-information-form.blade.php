<section>
    <header>
        <h4>Profile Information</h4>
        <p>Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('admin.profile.update') }}">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name"><b>Name</b></label>
            <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}" required>
            @error('name')
            <div class="error"><span class="text-danger">{{ $message }}</span></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name"><b>Email</b></label>
            <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" required>
            @error('name')
            <div class="error"><span class="text-danger">{{ $message }}</span></div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p>
                        Your email address is unverified.
                        <button form="send-verification">
                            'Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p>
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <button class="btn btn-dark">Save</button>

            @if (session('status') === 'profile-updated')
                <p>Saved.</p>
            @endif
        </div>
    </form>
</section>
