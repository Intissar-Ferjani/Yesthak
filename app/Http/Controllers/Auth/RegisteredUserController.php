<?php

namespace App\Http\Controllers\Auth;

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
        'name' => ['required', 'string', 'max:255'],
        'dateNaiss' => ['required', 'date'],
        'gouvernorat' => ['required', 'string', 'max:255'],
        'telephone' => ['required', 'string', 'max:20'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'conditions' => ['accepted'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'dateNaiss' => $request->dateNaiss,
        'gouvernorat' => $request->gouvernorat,
        'telephone' => $request->telephone,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'conditions' => $request->has('conditions'),
    ]);
    
    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}
}
