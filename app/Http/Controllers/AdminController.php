<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember = $request->has('remember') ? true : false;
        // config/session.php set 'expire_on_close' => true,
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember)) {
            if(Auth::user()->isAdmin()){
                return redirect('admin/dashboard')->withSuccess('You have Successfully loggedin');
            } else {
                return redirect("admin/login")->withErrors('You have entered invalid credentials!');
            }
        }
        return redirect("admin/login")->withErrors('You have entered invalid credentials!');
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){

            if(Auth::user()->isAdmin()){
                $user = Auth::user();
                return view('admin.dashboard')->with('user',$user);
            } else {
                return redirect("admin/login")->withErrors('You do not have access!');
            }
        }
        return redirect("admin/login")->withErrors('You do not have access!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('admin/login')->withSuccess('You have successfully loged out!');
    }

}
