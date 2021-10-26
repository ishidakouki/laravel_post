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
        return view('users.show')->with('user', $user);

    }
    public function edit($id)
    {
        return view('users.edit');
    }
    public function update($id, Request $request)
    {

        return view('/');
    }
}
