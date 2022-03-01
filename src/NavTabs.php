<?php

namespace Osoobe\Livewire\BootstrapComponents;

use Livewire\Component;

class NavTabs extends Component
{

    public $linkable;
    public $tabs;
    public $current_tab;
    public $current_data = [];


    public function switch($key) {
        $this->current_tab = $key;
    }

    public function render()
    {
        if ( empty($this->tabs)) {
            return "";
        }

        if ( empty($this->current_tab) ) {
            $this->current_tab = array_keys($this->tabs)[0];
        }

        if ( !empty($this->current_tab) ) {
            $this->current_data = $this->tabs[$this->current_tab];
        }

        return view('lwbootstrap::livewire.nav-tabs');
    }
}
