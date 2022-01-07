<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index')
            ->with('user', User::where('id', Auth::id())
                ->first());
    }
    public function settings()
    {
        return view('profile.settings');
    }
    public function changeAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $newAvatarName = uniqid().'-'.Auth::user()->name.'.'.$request->avatar->extension();
        $request->avatar->move(public_path('storage\avatars'),$newAvatarName);

        User::where('id', Auth::id())->update(['avatar' => $newAvatarName]);
        return view('profile.index');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'password' => 'required|confirmed|min:6'
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);
        return view('profile.index');
    }
    public function messages()
    {
        return view('profile.messages')
            ->with('messages', Message::where('owner_id', Auth::id())->get());
    }
}
