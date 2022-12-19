<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tagsTable extends Component
{
    /**
     * The revisor request.
     *
     * @var string
     */
    public $tags;

    /**
     * Create the component instance.
     *
     * @param  string  $tags
     * @return void
     */
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tags)
    {
        $this->tags = $tags;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tags-table');
    }
}
