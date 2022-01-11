<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserDetailsComponent extends Component
{
    public $user = [];

    public $message;


    public array $rules = [
        'user.name' => ['required', 'string', 'min:2', 'max:100'],
        'user.phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
        'user.dob' => ['required', 'date'],
        'user.email' => ['required', 'email'],
        'user.bank_account_no' => ['nullable', 'min:16'],
        'user.bank_sort_code' => ['nullable', 'min:4']
    ];

    protected array $validationAttributes = [
        'user.name' => 'name',
        'user.email' => 'email address',
        'user.profile_photo_path' => 'profile photo'
    ];

    public function mount()
    {
        $user = auth()->user();
        $this->user = $user->toArray();

        if ($user->profile){
            $this->user['phone'] = $user->profile->phone;
            $this->user['dob'] = $user->profile->dob;
        }

        // Unique email rule, but ignore current user's email
        array_push($this->rules['user.email'], 'unique:users,email,' . auth()->id());

        // DOB must be before now
        array_push($this->rules['user.dob'], 'before:' . Carbon::now());
    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
        $this->message = null;
    }

    public function saveUser()
    {

        DB::beginTransaction();
        try {

            User::whereId(auth()->id())->get()->first()->update($this->validate()['user']);
            $this->message = 'User details updated.';

            $this->emit('userDetailsChanged');
            DB::commit();

        }catch (Exception $e){
            $this->message = [
                'type'=> 'fail',
                'content'=>"Please check your input!"
            ];
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.user.user-details-component');
    }
}
