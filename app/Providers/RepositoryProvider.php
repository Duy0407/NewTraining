<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepositories;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepositories::class);
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
