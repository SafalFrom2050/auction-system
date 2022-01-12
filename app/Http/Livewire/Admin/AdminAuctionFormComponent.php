<?php

namespace App\Http\Livewire\Admin;

use App\Models\Auction;
use Livewire\Component;

class AdminAuctionFormComponent extends Component
{
    public $message;
    public $success = false;

    public $auctionId;
    public $auction;

    protected $rules = [
        'auction.heading' => ['required', 'min:2', 'string'],
        'auction.description' => ['required', 'string', 'min:3'],
        'auction.location' => ['required'],
        'auction.date_time' => ['nullable', 'date'],
        'auction.end_date' => ['nullable'],
        'auction.image_url' => ['nullable'],
        'auction.period' => ['required', 'min:2', 'string'],
    ];

    protected $validationAttributes = [
        'auction.heading' => 'heading',
        'auction.description' => 'description',
        'auction.location' => 'location',
        'auction.date_time' => 'date_time',
        'auction.end_date' => 'end_date',
        'auction.image_url' => 'image_url',
        'auction.period' => 'period',
    ];

    public function getStrippedValidationAttributes($arrayName = 'auction'): array
    {
       return array_map(function ($value) use($arrayName) {
            return [$value => $value[$arrayName]];
        }, array_keys($this->rules));
    }

    public function mount($auctionId=''): void
    {
        if ($auctionId) {
            $this->auction = Auction::find($auctionId)->toArray();
            $this->auctionId = $auctionId;
        }
    }

    public function updated($prop): void
    {
        $this->validateOnly($prop);
    }

    public function submitForm(): void
    {
        if ($this->auctionId) {
            $this->edit();
            return;
        }

        $this->save();
    }

    public function save(): void
    {
        $validatedData = $this->validate()['auction'];

        Auction::create($validatedData);
        $this->success = true;
        $this->emitUp('added');
    }

    public function edit(): void
    {
        $validatedData = $this->validate()['auction'];

        Auction::whereId($this->auctionId)->get()->first()->update($validatedData);
        $this->success = true;
        unset($this->auctionId);
        $this->emitUp('updated');
    }


    public function render()
    {
        return view('livewire.admin.admin-auction-form-component');
    }
}
