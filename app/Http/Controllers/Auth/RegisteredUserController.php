<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        'accountsType' => ['required', 'string', 'max:255'],
        'accountDP' => ['required', 'file', 'image', 'max:2048'],
        'contactnumber' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);


    $file = $request->file('accountDP');
    $dp = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('storage/profiles'), $dp);

    $user = User::create([
        'name' => $request->name,
        'accountsType' => $request->accountsType,
        'contactnumber' => $request->contactnumber,
        'accountDP' => $dp,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));
    Auth::login($user);

    if ($user->accountsType === 'Admin') {
        return redirect('/dashboard');
    }
    if ($user->accountsType === 'Boat') {
        return redirect('/boatdashboard');
    }
    if ($user->accountsType === 'Fisherman') {
        return redirect('/fishermandashboard');
    }

    return redirect(route('nopermition', absolute: false));
}

}
