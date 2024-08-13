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
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    // Get the authenticated user
    $user = auth()->user();

    // Check the role of the user and redirect accordingly
    if ($user->hasRole('admin')) {
        return redirect()->intended(route('dashboard', absolute: false));
    } elseif ($user->hasRole('manager')) {
        return redirect()->intended(route('companies.employees.index', ['company' => $user->company_id], absolute: false));
    } else {
        // Default redirection for other roles if needed
        return redirect()->intended(route('home', absolute: false));
    }
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
