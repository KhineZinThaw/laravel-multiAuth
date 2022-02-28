<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AdminLoginRequest;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-user.dashboard');
    }

    /**
     * Show the form for register
     *
     * @return \Illuminate\Http\Response
     */
    public function registerForm()
    {
        return view('admin-user.register');
    }

    /**
     * Admin Register
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $admin = AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('admin')->attempt($request->only('email', 'password'), 
        $request->boolean('remember'));

        return redirect('/admin/dashboard');
    }

    /**
     * Show the form for Admin login
     *
     * @return \Illuminate\Http\Response
     */
    public function loginForm()
    {
        return view('admin-user.login');
    }

    /**
     * Admin Login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(AdminLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        return redirect('/admin/dashboard');
    }

    /**
     * Admin Logout
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
