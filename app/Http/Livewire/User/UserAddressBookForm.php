<?php

namespace App\Http\Livewire\User;

use App\Models\DefaultCities;
use App\Models\DefaultProvinces;
use App\Models\UserAddress;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserAddressBookForm extends Component
{
    public $message;

    public $userAddress;
    public $address_id;
    public $hasDefault;

    protected $rules = [
        'userAddress.name'          => ['required', 'min:2', 'string'],
        'userAddress.phone'         => ['required', 'string', 'min:10', 'max:20'],
        'userAddress.address'       => ['required', 'string', 'min:3'],
        'userAddress.zip_code'      => ['required', 'min:5', 'max:8'],
        'userAddress.isDefault'     => ['digits_between:0, 1'],
        'userAddress.province'      => ['required', 'min:2', 'string'],
        'userAddress.city'          => ['required', 'min:2', 'string'],
        'userAddress.country'       => ['required', 'min:2', 'string'],
    ];

    protected $validationAttributes = [
        'userAddress.name'          => 'name',
        'userAddress.phone'         => 'phone',
        'userAddress.address'       => 'address',
        'userAddress.zip_code'      => 'zip code',
        'userAddress.isDefault'     => 'set default',
        'userAddress.province'      => 'province',
        'userAddress.city'          => 'city',
        'userAddress.country'       => 'country',
    ];

    public $success = false;

    public function mount($addressId): void
    {

        if ($addressId){
            $this->userAddress = UserAddress::find($addressId)->toArray();
            $this->address_id = $addressId;
        }

        // To check for existing default address
        $this->hasDefault = UserAddress::where('isDefault', 1)->get()->isNotEmpty();
    }

    public function updated($prop): void
    {
        $this->validateOnly($prop);
    }

    public function submitForm(): void
    {
        if ($this->address_id){
            $this->editAddress();
            return;
        }

        $this->saveAddress();
    }

    public function saveAddress(): void
    {
        $validatedData = $this->validate()['userAddress'];
        $validatedData['user_id'] = auth()->id();

        DB::beginTransaction();

        try {
            $validatedData = $this->replaceDefaultIfDefault($validatedData);

            UserAddress::create($validatedData);
            $this->success = true;
            $this->emitUp('addressAdded');

            DB::commit();

        }catch (Exception $e){
            DB::rollback();
            $this->message = [
                'type'=>'fail',
                'content' => 'Error saving address!'
            ];
            dd($e);
        }
    }

    public function editAddress(): void
    {
        $validatedData = $this->validate()['userAddress'];

        $validatedData = $this->replaceDefault($validatedData);

        UserAddress::whereId($this->address_id)->get()->first()->update($validatedData);
        $this->success = true;
        unset($this->address_id);
        $this->emitUp('addressUpdated');
    }

    private function replaceDefaultIfDefault($data): array
    {
        // Remove current default address if exists when set default is checked
        if ($this->hasDefault && isset($data['isDefault']) && $data['isDefault'] == 1) {
            UserAddress::where('isDefault', 1)->get()->first()->update(['isDefault' => 0]);
        }

        return $data;
    }

    public function render(): View
    {
        return view('livewire.user.user-address-book-form');
    }
}
