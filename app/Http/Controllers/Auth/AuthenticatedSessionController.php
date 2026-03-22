<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();
    //     if ($request->user()->accountsType==='Admin') {
    //         return redirect('/dashboard');

    //      }
    //      if ($request->user()->accountsType==='Boat') {
    //          return redirect('/boatdashboard');
    //      }
    //      if ($request->user()->accountsType==='Fisherman') {
    //          return redirect('/fishermandashboard');
    //      }

    //     return redirect()->intended(route('nopermition', absolute: false));
    // }
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $user = $request->user();

    if ($user->accountsType === 'Admin') {
        return redirect()->route('dashboard');
    }

    if ($user->accountsType === 'Boat') {
        return redirect()->route('boatdashboard');
    }

    if ($user->accountsType === 'Fisherman') {
        return redirect()->route('fishermandashboard');
    }

    return redirect()->route('nopermition');
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
