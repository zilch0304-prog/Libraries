<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show signup form
     */
    public function showSignup()
    {
        return view('auth.signup');
    }

    /**
     * Handle signup
     */
    public function signup(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => 0, // default normal user
        ]);

        $this->loginUser($user);

        return $this->redirectBasedOnRole($user);
    }

    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
        }

        $this->loginUser($user);

        return $this->redirectBasedOnRole($user);
    }

    /**
     * Handle logout
     */
    public function logout()
    {
        session()->flush();
        return redirect()->route('login.form');
    }

    /**
     * Store user session securely
     */
    private function loginUser(User $user)
    {
        // Regenerate session ID to prevent session fixation
        request()->session()->regenerate();

        session([
            'user_id'  => $user->id,
            'is_admin' => $user->is_admin,
        ]);
    }

    /**
     * Redirect based on role
     */
    private function redirectBasedOnRole(User $user)
    {
        return $user->is_admin
            ? redirect()->route('dashboard')        // Admin → dashboard
            : redirect()->route('user.books.index'); // User → user_books.user_index
    }
}
