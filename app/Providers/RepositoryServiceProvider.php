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
        $this->app->bind(\App\Repositories\BankRepository::class, \App\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProdukRepository::class, \App\Repositories\ProdukRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OrderRepository::class, \App\Repositories\OrderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SellerRepository::class, \App\Repositories\SellerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AccountRepository::class, \App\Repositories\AccountRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BoothRepository::class, \App\Repositories\BoothRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TransaksiRepository::class, \App\Repositories\TransaksiRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\JenisProdukRepository::class, \App\Repositories\JenisProdukRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\JenisUsahaRepository::class, \App\Repositories\JenisUsahaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BiodataRepository::class, \App\Repositories\BiodataRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StatusFeeRepository::class, \App\Repositories\StatusFeeRepositoryEloquent::class);
        //:end-bindings:
    }
}
