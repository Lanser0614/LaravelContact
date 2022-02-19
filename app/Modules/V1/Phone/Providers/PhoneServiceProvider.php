<?php

namespace App\Modules\V1\Phone\Providers;

use App\Modules\V1\Phone\Repositories\Contracts\IPhoneReadRepository;
use App\Modules\V1\Phone\Repositories\Contracts\IPhoneWriteRepository;
use App\Modules\V1\Phone\Repositories\PhoneWriteRepository;
use App\Modules\V1\Phone\Repositories\PhoneReadRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\V1\Phone\Models\Phone;

/**
 */
class PhoneServiceProvider extends ServiceProvider
{


    protected $namespace = "App\Modules\V1\Phone\Http\Controllers";

    protected $apiPrefix = "/api/v1/";

    protected $defer = false;

    public function boot()
    {
        $this->registerConfig();
        $this->routes();

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }

        $this->loadingRepositories();
    }

    public function loadingRepositories()
    {
        $this->app->bind(IPhoneWriteRepository::class, PhoneWriteRepository::class);
        $this->app->bind(IPhoneReadRepository::class, PhoneReadRepository::class);
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php",
            "phone"
        );
    }

    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../database/migrations");
    }

    public function routes()
    {
        Route::prefix($this->apiPrefix)
            ->namespace($this->namespace)
            ->middleware("api")
            ->group(__DIR__ . "/../routes/route.php");
    }
}
