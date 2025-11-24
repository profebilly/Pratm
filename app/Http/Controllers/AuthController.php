<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on role
            $role = Auth::user()->role;
            if ($role === 'admin') return redirect()->route('admin.dashboard');
            if ($role === 'teacher') return redirect()->route('teacher.dashboard');
            if ($role === 'student') return redirect()->route('student.dashboard');
            if ($role === 'parent') return redirect()->route('parent.dashboard');

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $isAdmin = auth()->check() && auth()->user()->role === 'admin';

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,teacher,student,parent'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'registration_token' => ['nullable', 'string'],
        ]);

        $role = $request->input('role');

        // If the creator is not an admin, require a valid registration token for teacher/admin
        if (!$isAdmin && in_array($role, ['teacher', 'admin'])) {
            $expected = $role === 'teacher' ? env('TEACHER_REGISTRATION_TOKEN') : env('ADMIN_REGISTRATION_TOKEN');
            if (empty($expected) || $request->input('registration_token') !== $expected) {
                return back()->withErrors(['registration_token' => 'Código de registro inválido para el rol seleccionado.'])->withInput();
            }
        }

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
            'avatar' => $avatarPath,
        ]);

        // If current user is admin, don't login as the new user
        if ($isAdmin) {
            return redirect()->route('admin.dashboard')->with('status', 'Usuario creado correctamente.');
        }

        Auth::login($user);

        // Redirect based on role
        if ($user->role === 'student') return redirect()->route('student.dashboard');
        if ($user->role === 'parent') return redirect()->route('parent.dashboard');
        if ($user->role === 'teacher') return redirect()->route('teacher.dashboard');

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
