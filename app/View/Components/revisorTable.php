<?php

namespace App\View\Components;

use Illuminate\View\Component;

class revisorTable extends Component
{
    /**
     * The revisor request.
     *
     * @var string
     */
    public $articles;

    /**
     * Create the component instance.
     *
     * @param  string  $articles
     * @return void
     */
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($articles)
    {
        $this->articles = $articles;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.revisor-table');
    }
}
