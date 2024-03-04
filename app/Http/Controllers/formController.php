<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class formController extends Controller
{
 
    public function showForm()
    {
        return view('form'); 
    }



    public function store(Request $request)
{
    $loginTime = Carbon::now()->addHours(2);
    // $loginTime = now()->addHours(2); 
    // this is the same with shorter syntax
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:administrators,EmailAdmin|max:255',
        'password' => 'required|string|min:8|confirmed',
        'username' => 'required|string|max:255',
        'access_type' => 'required|string|max:50',
        'status' => 'required|string|max:50',
    ]);
    //it is better to use form request for validation

    // Hash the password
    $hashedPassword = bcrypt($request->password);
    // if you use model correctly you don't need to bcrypt your password

    DB::table('administrators')->insert([
        
        'NameAdmin' => $request->name,
        'EmailAdmin' => $request->email,
        'PasswordAdmin' => $hashedPassword,
        'UsernameAdmin' => $request->username,
        'AccessType' => $request->access_type,
        'Status' => $request->status,
        'CreatedAt' => $loginTime,
        'UpdatedAt' => $loginTime,
        'Active' => 1,
    ]);

    return redirect('/')->with('success', 'Administrator created successfully.');
}

}


