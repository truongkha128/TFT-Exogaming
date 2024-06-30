<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\Contracts\WebsiteRepository::class, \App\Repositories\Eloquent\WebsiteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\NewsRepository::class, \App\Repositories\Eloquent\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\NewsCategoryRepository::class, \App\Repositories\Eloquent\NewsCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\JobsRepository::class, \App\Repositories\Eloquent\JobsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\PageRepository::class, \App\Repositories\Eloquent\PageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ServiceRepository::class, \App\Repositories\Eloquent\ServiceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ContactRepository::class, \App\Repositories\Eloquent\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\WatchesRepository::class, \App\Repositories\Eloquent\WatchesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\EncountersRepository::class, \App\Repositories\Eloquent\EncountersRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ItemsRepository::class, \App\Repositories\Eloquent\ItemsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TraitsRepository::class, \App\Repositories\Eloquent\TraitsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\AugmentsRepository::class, \App\Repositories\Eloquent\AugmentsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ChampionsRepository::class, \App\Repositories\Eloquent\ChampionsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TierListsRepository::class, \App\Repositories\Eloquent\TierListsRepositoryEloquent::class);
        //:end-bindings:
    }
}
