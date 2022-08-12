<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login() {
        return view('admin.login');
    }
    public function logout() {
        auth()->logout();
        return redirect('/');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($validated)) {
            return redirect('admin');
        } else {
            return redirect()->back()->withErrors([
                'loginError' => 'You have some errors',
            ]);
        }
    }
    public function index() {
        return view('admin.index');
    }
    public function users() {
        return view('admin.users');
    }
}
