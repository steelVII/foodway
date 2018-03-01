<?php

namespace App\Http\Controllers;

use App\User;
use App\Restaurants;
use App\Vendor;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {

        $users = User::paginate(10);

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

    public function update($id, Request $request, Restaurants $restaurants) {

        $user = User::find($id);

        $vendor_id = Vendor::select('id')->where('user_id', $id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant = $restaurants::find($restaurant_id);

        $user->email = request('email');
        $user->save();

        $restaurant->email = request('email');
        $restaurant->save();

        return back();

    }
}
