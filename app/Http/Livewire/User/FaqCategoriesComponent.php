<?php

namespace App\Http\Livewire\User;

use App\Models\FaqCategory;
use Livewire\Component;

class FaqCategoriesComponent extends Component
{

    public $categories;
    public $expandedId;
    public $selectedCategory;

    public $selectedSubCategory;

    public function mount()
    {
        $this->categories = FaqCategory::where('is_parent', 1)
            ->where('status', 1)
            ->get();
    }

    public function selectSubCategory($id)
    {
        $this->selectedSubCategory = FaqCategory::where('id', $id)
            ->where('status', 1)
            ->get()->first();
    }

    public function selectCategory($id)
    {
        $this->selectedCategory = FaqCategory::where('id', $id)
            ->where('status', 1)
            ->get()->first();
    }

    public function back()
    {
        if ($this->selectedSubCategory) {
            $this->selectedSubCategory = null;
            return;
        }

        $this->selectedCategory = null;
    }


    public function expandId($id)
    {
//      To close if clicked on already selected id
        if ($this->expandedId == $id) {
            $this->expandedId = null;
            return;
        }
//
        $this->expandedId = $id;
    }

    public function render()
    {
        return view('livewire.user.faq-categories-component');
    }
}
