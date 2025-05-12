<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class SearchableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */

    public function boot()
    {
        Config::set('searchable.title', 'title_' . app()->getLocale());
        Config::set('searchable.position', 'position_' . app()->getLocale());
        Config::set('searchable.name', 'name_' . app()->getLocale());
        Config::set('searchable.details', 'details_' . app()->getLocale());
    }

}
