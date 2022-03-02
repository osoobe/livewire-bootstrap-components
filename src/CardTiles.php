<?php

namespace Osoobe\Livewire\BootstrapComponents;

use Livewire\Component;


class CardTiles extends Component
{
    public $search = '';
    public $cards = [];

    public function render()
    {
        $tiles = collect(array_values($this->cards));
        if ( !empty($this->search) ) {
            $search = $this->search;
            $tiles = $tiles->filter(function($val, $key) use($search){
                return (
                    str_contains( strtolower(__($val['title'])), $search) ||
                    str_contains( strtolower(__($val['description'])), $search)
                );
            });
        }

        return view('lwbootstrap::livewire.card-tiles', compact('tiles'));
    }
}
