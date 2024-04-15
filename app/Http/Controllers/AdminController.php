<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function admin_index()
    {
        $users = User::where('role', 1)->get();
        return view('admin_index',['users'=>$users]);
    }

    public function userSearch(Request $request)
    {
        $query = $request->input('query');
    
        $users = User::where('role', 1)
                 ->where(function ($queryBuilder) use ($query) {
                     $queryBuilder->where('first_name', 'like', '%' . $query . '%')
                                  ->orWhere('last_name', 'like', '%' . $query . '%');
                 })
                 ->get();
        
        return view('partials.user_table_rows', ['users' => $users])->render();
    
        return response()->json(['html' => $html]);
    }
}
