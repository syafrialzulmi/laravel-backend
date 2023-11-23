<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\User;

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

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('user.index')->with('success', 'User successfulyy created');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        dd($user);
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('user.index')->with('success', 'User successfully updated');
    }

    public function delete($id)
    {
        $user = User::find($id);
        return view('pages.user.delete', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User successfully deleted');
    }
}
