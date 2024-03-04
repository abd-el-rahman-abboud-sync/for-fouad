<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class loginController extends Controller
{
 
    public function showLogin()
    {
        return view('login'); 
    }


    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $admin = DB::table('administrators')
                    ->where('EmailAdmin', $request->email)
                    ->first();
    
        if ($admin) {
            if ($admin->Active == 0) {
                return back()->withErrors([
                    'message' => 'Your account is deactivated. Please contact the administrator.',
                ]);
            }
    
            if (Hash::check($request->password, $admin->PasswordAdmin)) {
                $loginTime = Carbon::now()->addHours(2);
                DB::table('administrators')
                    ->where('IDAdmin', $admin->IDAdmin)
                    ->update(['LastLogin' => $loginTime]);
    
                Session::put('admin_id', $admin->IDAdmin);
                Session::put('admin_name', $admin->NameAdmin);
                return redirect()->intended('dashboard');
            }
        }
    
        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ]);
    }
    
    
}