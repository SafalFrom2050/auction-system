<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemGalleryComponent extends Component
{
    public $images = [
        'https://picsum.photos/400/300.webp?random=1',
        'https://picsum.photos/400/300.webp?random=2',
        'https://picsum.photos/400/300.webp?random=3',
        'https://picsum.photos/400/300.webp?random=4'
    ];

    public $selectedImage = 'https://picsum.photos/400/300.webp?random=1';

    public function selectImage($image)
    {
        $this->selectedImage = $image;
    }

    public function test()
    {
        dd('test called');
    }

    public function render()
    {
        return view('livewire.item-gallery-component');
    }
}
