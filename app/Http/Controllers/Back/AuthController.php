<?php

namespace App\Http\Controllers\Back;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()  {
        return view ('back.auth.login');
    }

    public function LoginForm(Request $request)
    {
        $request->validate([
            'email_or_phone' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = ['password' => $request->password];
        $input = $request->email_or_phone;
    
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $input;
            $admin = Admin::where('email', $input)->first();
        } else {
            $credentials['phone'] = $input;
            $admin = Admin::where('phone', $input)->first();
        }
    
        if ($admin) {
            if (Auth::guard('admin')->attempt($credentials)) {
                toastr()->success('Welcome back Mr' . " " . $admin->name);
                return redirect()->intended('/admin/dashboard');
            } else {
                return back()->withErrors(['password' => 'incorrect_password']);
            }
        } else {
            return back()->withErrors(['email_or_phone' => 'no_account_found']);
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function editProfile(){
        $admin = auth()->guard('admin')->user();

        return view('back.auth.edit_profile',compact('admin'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            'phone' => 'required|unique:admins,phone,'.$id,
            'password' => 'nullable|min:6',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();
        toastr()->success('Data updated successfully');

        return redirect()->back();
    }

    
}
