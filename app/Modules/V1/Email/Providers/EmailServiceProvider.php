<?php

namespace App\Modules\V1\Email\Providers;

use App\Modules\V1\Email\Repositories\Contracts\IEmailReadRepository;
use App\Modules\V1\Email\Repositories\Contracts\IEmailWriteRepository;
use App\Modules\V1\Email\Repositories\EmailWriteRepository;
use App\Modules\V1\Email\Repositories\EmailReadRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\V1\Email\Models\Email;

/**
 */
class EmailServiceProvider extends ServiceProvider
{


    protected $namespace = "App\Modules\V1\Email\Http\Controllers";

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
        $this->app->bind(IEmailWriteRepository::class, EmailWriteRepository::class);
        $this->app->bind(IEmailReadRepository::class, EmailReadRepository::class);
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php",
            "email"
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
