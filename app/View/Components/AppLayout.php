<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title;
    public $home;
    public $dashboard;

    public function __construct($title = null, $home = false, $dashboard = false)
    {
        $this->title = $title;
        $this->home = $home;
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
