<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $categories;
    public function __construct()
    {

        return $this->categories =  Category::has('articles')->inRandomOrder()->take(5)->get();
        // return $this->categories = Category::has('articles')->get();
        /*  Category::with('articles')->get() */
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}