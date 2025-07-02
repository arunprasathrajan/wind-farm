<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InspectorController extends Controller
{
    /**
     * Show the login page for the Inspector.
     * 
     * @return View
     */
    public function show(): View
    {
        return view('auth.inspector.login');
    }

    /**
     * Inspector Login.
     *
     * @param  Request $request
     * 
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login_error' => 'Invalid login credentials.',
        ])->onlyInput('email');
    }

     /**
     * Inspector Logout.
     *
     * @param  Request $request
     * 
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
