<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{   
    public $email;
    public $password; 
    public $gRecaptchaResponse;

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.app')->section('content');
    }
    public function rules(){
        return [
            'email' => ['required','email'],
            'password' => ['required'],
            // 'gRecaptchaResponse' => ['required','recaptcha'],
        ];
    }
    
    public function loginUser(){
        $this->validate();
        $throttleKey=strtolower($this->email) . '|' . request()->ip();
        if(RateLimiter::tooManyAttempts($throttleKey,3)){
            // RateLimiter::resetAttempts($throttleKey);
            $this->addError('email', trans('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttleKey)
            ]));

            return null;
        }
        
        if(!Auth::attempt($this->only(['email','password']))){
            RateLimiter::hit($throttleKey,33);
            $this->addError('email',_('Your email or password is wrong'));
            return null;
        }
        return redirect()->to(RouteServiceProvider::HOME);
    }

}
