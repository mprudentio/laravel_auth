<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class Register extends Component
{   
    public $name,$email, $password, $password_confirmation;
    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.app')->section('content');
    }

    public function rules(){
        return [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:10', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
        ];
    }
    public function messages()
    {
        return [
            'password.regex' => 'Your password must include at least one lowercase letter, one uppercase letter, one number, and one special character.',
        ];
    }
    public function registerUser(){
        $this->validate();

        $user=User::create(
           [ 
            "name" =>$this->name,
            "email"=>$this->email,
            "password"=>bcrypt($this->password)
            ]
        );

        Auth::login($user,true);
        return redirect()->to(route('verification.notice'));
    }
}
