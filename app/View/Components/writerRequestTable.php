<?php

namespace App\View\Components;

use Illuminate\View\Component;

class writerRequestTable extends Component
{
     /**
     * The writer request.
     *
     * @var string
     */
    public $writerRequests;

    /**
     * Create the component instance.
     *
     * @param  string  $writerRequests
     * @return void
     */
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($writerRequests)
    {
        $this->writerRequests = $writerRequests;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.writer-request-table');
    }
}
