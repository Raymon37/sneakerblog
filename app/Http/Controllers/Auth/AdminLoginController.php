<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showloginform()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //validate the form date
        $this->validate($request, [
          'email'  => 'required|email',
          'password' => 'required|min:6' 
        ]);

        //attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            //if succesful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->wihtInput($request->only('email', 'remember'));
    }
}
