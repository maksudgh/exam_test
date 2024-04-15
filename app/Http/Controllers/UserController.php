<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userProfile()
    {
        $user = auth()->user();
        return view('userProfile',['user'=>$user]);
    }

    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request)
    {
        //data validation
        $data = $request->validate([
            'oldPassword'   => 'required',
            'password'      => 'required|confirmed',
        ]);

        $user = auth()->user();

        // Check if the old password matches the current password
        if (Hash::check($data['oldPassword'], $user->password)) {
            $user->update([
                'password' => bcrypt($data['password']),
            ]);

            return redirect(route('userProfile'))->with('success', 'Your password is changed successfully');
        } 
        else {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }
    }
}
