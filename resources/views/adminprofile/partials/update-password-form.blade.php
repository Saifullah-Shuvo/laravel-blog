<section>
    <header>
        <h4>Update Password</h4>
        <p>Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('admin.password.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password"><b>Current Password</b></label>
            <input type="password" class="form-control" name="current_password" id="current_password" required>
            @error('current_password')
            <div class="error"><span class="text-danger">{{ $message }}</span></div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password"><b>New Password</b></label>
            <input type="password" class="form-control" name="password" id="password" required>
            @error('password')
            <div class="error"><span class="text-danger">{{ $message }}</span></div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation"><b>Confirm Password</b></label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
            @error('password_confirmation')
            <div class="error"><span class="text-danger">{{ $message }}</span></div>
            @enderror
        </div>

        <div>
            <button class="btn btn-dark">Save</button>
            @if (session('status') === 'password-updated')
                <p>Saved.</p>
            @endif
        </div>
    </form>
</section>
