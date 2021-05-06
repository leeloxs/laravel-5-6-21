<?php

namespace App\Providers;

use App\Http\Repositories\Eloquents\ItemRepository;
use App\Http\Repositories\Eloquents\PostRepository;
use App\Http\Repositories\Eloquents\UserRepository;
use App\Http\Repositories\Interfaces\ItemRepositoryInterface;
use App\Http\Repositories\Interfaces\PostRepositoryInterface;
use App\Http\Repositories\Interfaces\UserRepositoryInterface;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
