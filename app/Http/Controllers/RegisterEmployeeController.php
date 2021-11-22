<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function create()
    {   
        return view('auth.employee_register');   
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role_id' => '0',
            'password' => Hash::make($request['password']),
        ]);
    }
}
