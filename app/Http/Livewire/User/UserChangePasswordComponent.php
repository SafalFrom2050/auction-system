<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use PHPUnit\Exception;

class UserChangePasswordComponent extends Component
{

    public $password;
    public $message;

    protected $rules = [
        'password.current' => ['required', 'current_password'],
        'password.new_confirmation' => ['required', 'min:6', 'different:password.current'],
        'password.new' => ['confirmed'],
    ];


    protected $validationAttributes = [
        'password.current' => 'current password',
        'password.new_confirmation' => 'new password',
        'password.new' => 'new password',
    ];

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function save()
    {
        DB::beginTransaction();

        try{
            $password = Hash::make($this->validate()['password']['new']);

            $user = auth()->user();
            $user->update(compact('password'));

            // Reset password without auto logout
            session()->forget('password_hash_web');
            Auth::guard('web')->login($user);
            //

            $this->reset('password');

            DB::commit();

            $this->message = [
                'type'=>'success',
                'content' => 'Password changed.'
            ];

        }catch (Exception $ex) {

            DB::rollback();
            $this->message = [
                'type'=>'fail',
                'content' => 'Error updating password!'
            ];
        }
    }

    public function render()
    {
        return view('livewire.user.user-change-password-component');
    }
}
