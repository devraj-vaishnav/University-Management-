<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('admin.profile',compact('user'));

    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        session()->flash('success_msg', "Successfully Updated Profile");
        return redirect(route('profile'));
    }
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',

        ]);
        $data = User::find($id);
        if (Hash::check($request->old_password, $data->password)) {
            $data->password = Hash::make($request->password);
            $data->save();
            session()->flash('success_msg', "Your Password is Change ");
            return redirect(route('profile'));
        } else {
            session()->flash('danger_msg', 'Your old password is not Correct ');
            return redirect(route('profile'));
        }
    }
}
