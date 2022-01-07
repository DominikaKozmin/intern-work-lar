<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'owner_id' => 'required',
            'author_id' => '',
            'category' => '',
            'slug' => '',
            'name' => 'required',
            'email' => 'required|email',
            'item' => 'required',
            'content' => 'required'
        ]);
        Message::create([
            'owner_id' => $request->owner_id,
            'author_id' => Auth::id(),
            'category' => '0',
            'slug' => '0',
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'item' => $request->input('item'),
            'content' => $request->input('content')
        ]);
        return redirect('/');
    }
    public function show($id)
    {
        $message = Message::where('id', $id)->first();

        if($message==null || (Auth::id()!=$message['owner_id'])){
            return redirect('/profil/wiadomosci');
        }
        return view('profile.message')
            ->with('message', Message::where('id', $id)
                ->first());
    }
}
