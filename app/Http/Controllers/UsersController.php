<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {

        $users = User::all();

        return view('backend.Users.users', compact('users'));

    }

    public function edit($id) {

        $user = User::find($id);

        //If user account exists
        if($user) {

            return view('backend.Users.user_update', compact('user'));

        }

       return redirect('admin/users');

    }

    public function update($id) {

        $user = User::find($id);

        $user->email = request('email');

        $user->save();

        return back();

    }
}
