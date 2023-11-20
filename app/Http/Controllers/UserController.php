<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::orderBy('created_at', 'desc')->paginate(10);
        $users = DB::table('users')
            ->when($request->input('name'), function($query, $name) {
                return $query->where('name', 'like', '%' .$name. '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pages.user.index', compact('users'));
    }
}
