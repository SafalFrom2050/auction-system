<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{

    public function render(): View
    {
        $categories = Category::all();
        return view('layouts.app', compact('categories'));
    }
}
