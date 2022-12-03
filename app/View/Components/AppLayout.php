<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title;
    public $dashboard;

    public function __construct($title = null, $dashboard = false)
    {
        $this->title = $title;
        $this->dashboard = $dashboard;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
