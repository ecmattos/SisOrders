<?php

namespace L52\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \L52\Repositories\UserRepository::class, 
            \L52\Repositories\UserRepositoryEloquent::class);

        $this->app->bind(
            \L52\Repositories\CompanyRepository::class, 
            \L52\Repositories\CompanyRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\ClientRepository::class, 
            \L52\Repositories\ClientRepositoryEloquent::class);

        $this->app->bind(
            \L52\Repositories\ClientTypeRepository::class, 
            \L52\Repositories\ClientTypeRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\StateRepository::class, 
            \L52\Repositories\StateRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\CityRepository::class, 
            \L52\Repositories\CityRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\MaterialUnitRepository::class, 
            \L52\Repositories\MaterialUnitRepositoryEloquent::class);

        $this->app->bind(
            \L52\Repositories\MaterialRepository::class, 
            \L52\Repositories\MaterialRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\PatrimonialBrandRepository::class, 
            \L52\Repositories\PatrimonialBrandRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\PatrimonialModelRepository::class, 
            \L52\Repositories\PatrimonialModelRepositoryEloquent::class);

        $this->app->bind(
            \L52\Repositories\ContractRepository::class, 
            \L52\Repositories\ContractRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\PatrimonialTypeRepository::class, 
            \L52\Repositories\PatrimonialTypeRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\PatrimonialSubTypeRepository::class, 
            \L52\Repositories\PatrimonialSubTypeRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\PatrimonialRepository::class, 
            \L52\Repositories\PatrimonialRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\ServiceRepository::class, 
            \L52\Repositories\ServiceRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\OrderRepository::class, 
            \L52\Repositories\OrderRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\OrderStatusRepository::class, 
            \L52\Repositories\OrderStatusRepositoryEloquent::class);
        
        $this->app->bind(
            \L52\Repositories\OrderServiceRepository::class, 
            \L52\Repositories\OrderServiceRepositoryEloquent::class);

        $this->app->bind(
            \L52\Repositories\OrderMaterialRepository::class, 
            \L52\Repositories\OrderMaterialRepositoryEloquent::class);
        //:end-bindings:
    }
}
