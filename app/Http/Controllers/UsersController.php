<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show')->with('user', $user);

    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    public function update(UsersRequest $request,$id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->save();

        return view('users.show', compact('user'));
    }
}
