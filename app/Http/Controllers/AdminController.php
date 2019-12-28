<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => 1])) {

                return redirect('/admin/dashboard');
            } else {
                return redirect()->back()->with('message', 'Invalid User Name Or Password');
            }
        }
        return view('admin.admin_login');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('message', 'Logout Successfully');
    }

    public function setting()
    {
        return view('admin.setting');
    }
}
