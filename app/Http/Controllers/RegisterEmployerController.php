<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterEmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function create()
    {   
        return view('auth.employer_register');   
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'company_name' => 'required',
            'password' => 'required|confirmed'
        ]);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'company_name' => $request['company_name'],
            'role_id' => '0',
            'password' => Hash::make($request['password']),
        ]);
    }
}
