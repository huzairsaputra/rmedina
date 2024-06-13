<?php

namespace App\Http\Livewire\LoginForm;

use App\Providers\RouteServiceProvider;
use App\Rules\StandardPassword;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $isValidEmail = false;
    public $rememberMe = true;

    public function submit(){
        if (!$this->isValidEmail)
            $this->submitEmail();
        else
            $this->submitPassword();
    }

    private function submitEmail(){
        $this->validateOnly('email', [
            'email' => 'required|string|exists:users',
        ]);

        $this->isValidEmail = true;
        $this->emit('newfocus');
    }

    private function submitPassword(){
        $this->validate([
            'email' => 'required|string|exists:users',
            'password' => ['required', new StandardPassword()],
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'active' => User::ACTIVE], $this->rememberMe))
            return redirect()->to(RouteServiceProvider::HOME);

        session()->flash('error', trans('auth.failed'));
        $this->emit('newfocus');
    }

    public function render()
    {
        return view('livewire.login-form.login-form');
    }
}
