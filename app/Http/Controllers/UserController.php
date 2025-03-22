<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //index 
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:guru,admin,dudi',
            'status' => 'required|in:active,nonactive',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        // dd($request->all());
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'role' => 'required|in:guru,admin,dudi',
            'status' => 'required|in:active,nonactive',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }


}
