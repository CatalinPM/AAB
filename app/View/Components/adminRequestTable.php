<?php

namespace App\View\Components;

use Illuminate\View\Component;

class adminRequestTable extends Component
{
    /**
     * The admin request.
     *
     * @var string
     */
    public $adminRequests;

    /**
     * Create the component instance.
     *
     * @param  string  $adminRequests
     * @return void
     */


    public function __construct($adminRequests)
    {
        $this->adminRequests = $adminRequests;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-request-table');
    }
}
