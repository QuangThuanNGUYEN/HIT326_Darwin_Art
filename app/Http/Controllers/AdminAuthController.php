<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // Show admin login form
    public function showLogin()
    {
        return view('admin.login');
    }

    // Handle admin login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('Username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->PasswordHash)) {
            // Regenerate session to prevent session fixation
            Session::regenerate();

            session(['admin_logged_in' => true]);
            session(['admin_id' => $admin->AdminID]);
            session(['admin_username' => $admin->Username]);

            return redirect('/admin')
                ->with('success', 'Welcome back, ' . $admin->Username . '!');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ]);
    }

    // Handle admin logout
    public function logout()
    {
        Session::forget(['admin_logged_in', 'admin_id', 'admin_username']);
        Session::regenerate();

        return redirect('/admin/login')
            ->with('success', 'Logged out successfully.');
    }
}