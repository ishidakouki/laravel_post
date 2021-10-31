<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequests;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show')->with('user',$user);

    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.update',compact('user'));
    }
    public function update($id,UsersRequests $request)
    {
        $user = User::find($id);

        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->password_confirmation=$request->input('password_confirmation');
        $user->save();

        return view('users.show', compact('user'));
    }
}
