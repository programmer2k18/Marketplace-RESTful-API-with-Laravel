<?php

namespace App\Providers;
// Repositories
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Transaction\TransactionRepository;
use App\Repositories\User\BuyerRepository;
use App\Repositories\User\SellerRepository;
use App\Repositories\User\UserRepository;
//Facades
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //users
        $this->app->bind(UserRepository::class,UserRepository::class);
        $this->app->bind(BuyerRepository::class,BuyerRepository::class);
        $this->app->bind(SellerRepository::class,SellerRepository::class);

        //components
        $this->app->bind(ProductRepository::class,ProductRepository::class);
        $this->app->bind(CategoryRepository::class,CategoryRepository::class);
        $this->app->bind(TransactionRepository::class,TransactionRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
