<?php

namespace App\Http\Controllers;

use App\User;
use App\Restaurants;
use App\Vendor;
use Yajra\Datatables\Facades\Datatables;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {

        return view('backend.Users.users');

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userData()
    {

        return Datatables::of(User::query())->addColumn('action', function ($user) {
            return '<a href="user/'.$user->id.'" class="btn btn-primary">Edit</a>';
        })
        ->make(true);
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
