<?php

namespace App\View\Components;

use Illuminate\View\Component;

class revisorRequestTable extends Component
{
    /**
     * The revisor request.
     *
     * @var string
     */
    public $revisorRequests;

    /**
     * Create the component instance.
     *
     * @param  string  $revisorRequests
     * @return void
     */
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($revisorRequests)
    {
        $this->revisorRequests = $revisorRequests;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.revisor-request-table');
    }
}
