<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;


class dashboardController extends Controller
{
    
    public function showDashboard()
    {
        $adminId = Session::get('admin_id');
        $categories = DB::table('NewsCategory')->get();

        $users = DB::table('administrators')->get();

        return view('dashboard', ['categories' => $categories, 'users' => $users]);
        // return view('dashboard', compact('categories', 'users'));
        // shorter syntax, more readable
    }


    public function logout()
    {
        try {
            Session::flush();

            return redirect('/');
        } catch (\Exception $e) {
            Log::error('Error logging out: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while logging out');
        }
    }


    public function deleteUser($id)
    {
        try {
            // Check if the user being deactivated is the same as the session user
            $loggedInUserId = Session::get('admin_id');
            
            // Fetch user from the database
            $user = DB::table('administrators')->where('IDAdmin', $id)->first();
    
            // Update user's active status in the database
            DB::table('administrators')
                ->where('IDAdmin', $id)
                ->update(['active' => 0]);
    
            if ($loggedInUserId == $user->IDAdmin) {
                $this->logout();
            }
    
            // Return a JSON response
            return response()->json(['success' => 'User deactivated successfully']);
        } catch (\Exception $e) {
            Log::error('Error deactivating user: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deactivating the user']);
        }
    }


public function editform($id)
{
    // Fetch user from the database by ID
    $user = DB::table('administrators')->where('IDAdmin', $id)->first();

    // Pass user data to the view
    return view('editform', ['user' => $user]);
}



public function updateUser(Request $request, $id)
{
    try {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'access_type' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            // return back()->withErrors($validator)->withInput();
        }

        // Update user in the database
        DB::table('administrators')
            ->where('IDAdmin', $id)
            ->update([
                'NameAdmin' => $request->name,
                'UsernameAdmin' => $request->username,
                'AccessType' => $request->access_type,
                'Status' => $request->status,
            ]);

        // Redirect with success message
        return redirect()->route('dashboard')->with('success', 'User updated successfully');
    } catch (\Exception $e) {
        Log::error('Error updating user: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while updating the user');
        // return back()->with('error', 'An error occurred while updating the user');
        // this will work as well
    }
}
}
