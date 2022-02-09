<?php

namespace App\Providers;

use App\Contracts\appoinmentContract;
use App\Contracts\doctorContract;
use App\Repositories\appoinmentRepository;
use App\Repositories\doctorRepository;
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
        $this->app->bind(doctorContract::class, doctorRepository::class);
        $this->app->bind(appoinmentContract::class, appoinmentRepository::class);
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
