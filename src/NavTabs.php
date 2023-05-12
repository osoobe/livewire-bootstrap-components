<?php

namespace Osoobe\Livewire\BootstrapComponents;

use Livewire\Component;

class NavTabs extends Component
{

    public $linkable;
    public $tabs;
    public $current_tab;
    public $current_data = [];
    public $navStyle = "pills";

    protected $listeners = ['navTabRefresh' => '$refresh'];


    public function switch($key) {
        $this->current_tab = $key;
    }

    public function render()
    {
        if ( empty($this->tabs)) {
            return "";
        }

        if ( empty($this->current_tab) ) {
            $this->current_tab = request()->input('lvtab', null);
        }

        if ( empty($this->current_tab) ) {
            $this->current_tab = array_keys($this->tabs)[0];
        }


        if ( !empty($this->current_tab) ) {
            $this->current_data = $this->tabs[$this->current_tab];
        }
        switch ($this->navStyle) {
            case 'pills':
                $view = 'lwbootstrap::livewire.nav-pills';
                break;

            case 'tabs':
                $view = 'lwbootstrap::livewire.nav-tabs';
                break;

            default:
                $view = 'lwbootstrap::livewire.nav-pills';
                break;
        }
        return view($view);
    }
}
