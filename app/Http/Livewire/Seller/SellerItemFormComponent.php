<?php

namespace App\Http\Livewire\Seller;

use App\Models\Auction;
use App\Models\Category;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SellerItemFormComponent extends Component
{
    public $message;

    public $item;
    public $itemId;

    private ItemService $itemService;
    public $categories;
    public $auctions;

    protected $rules = [
        'item.title'          => ['required', 'min:2', 'string'],
        'item.lot_no'         => ['required', 'numeric', 'min:10'],
        'item.artist'       => ['required', 'string', 'min:3'],
        'item.classification'      => ['required'],
        'item.production_date'     => ['nullable'],
        'item.est_price'      => ['required', 'min:2', 'numeric'],
        'item.description'          => ['required', 'min:2', 'string'],
        'item.category_id'      => ['required'],
        'item.auction_id'      => ['required']
        ];

    protected $validationAttributes = [
        'item.title'          => 'title',
        'item.lot_no'         => 'lot number',
        'item.artist'       => 'srtist',
        'item.classification'      => 'subject classification',
        'item.production_date'     => 'production date',
        'item.est_price'      => 'estimated price',
        'item.description'          => 'description',
        'item.category_id' => 'category',
        'item.auction_id' => 'auction'
    ];

    public $success = false;

    public function mount(ItemService $itemService, $itemId): void
    {
        $this->itemService = $itemService;
        $this->categories = Category::all();
        $this->auctions = Auction::all();
        if ($itemId){
            $this->item = Item::find($itemId)->toArray();
            $this->itemId = $itemId;
        }
    }

    public function updated($prop): void
    {
        $this->validateOnly($prop);
    }

    public function submitForm(): void
    {
        if ($this->itemId){
            $this->edit();
            return;
        }

        $this->save();
    }

    public function save(): void
    {
        $validatedData = $this->validate()['item'];
        $validatedData['seller_id'] = auth()->id();

        Item::create($validatedData);
        $this->success = true;
        $this->emitUp('added');
    }

    public function edit(): void
    {
        $validatedData = $this->validate()['item'];

        Item::whereId($this->itemId)->get()->first()->update($validatedData);
        $this->success = true;
        unset($this->itemId);
        $this->emitUp('updated');
    }


    public function render()
    {
        return view('livewire.seller.seller-item-form-component');
    }
}
