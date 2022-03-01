<?php

namespace Osoobe\Livewire\BootstrapComponents;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireBootstrapComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lwbootstrap');
        Livewire::component('nav-tabs', NavTabs::class);
    }
}
