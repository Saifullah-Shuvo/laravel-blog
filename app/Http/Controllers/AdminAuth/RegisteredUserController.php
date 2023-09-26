<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
                'name' => ['required', 'string', 'min:4'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'name.required' => 'Name is required',
                'name.string' => 'Name should be a string',
                'name.max' => 'Name should be within 255 character',
                'email.required' => 'Email is required',
                'email.string' => 'Email should be a string',
                'email.max' => 'Email should be within 255 character',
                'email.unique' => 'Email shuld be unique',
                'password.required' => 'Password is required',
                //'password.min' => 'Password should be atleast 8 character',
                'password.confirmed' => 'Password should be confirmed',
            ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
