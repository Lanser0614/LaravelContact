<?php

namespace App\Modules\V1\Contact\Providers;

use App\Modules\V1\Contact\Repositories\Contracts\IContactReadRepository;
use App\Modules\V1\Contact\Repositories\Contracts\IContactWriteRepository;
use App\Modules\V1\Contact\Repositories\ContactWriteRepository;
use App\Modules\V1\Contact\Repositories\ContactReadRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\V1\Contact\Models\Contact;

/**
 */
class ContactServiceProvider extends ServiceProvider
{


    protected $namespace = "App\Modules\V1\Contact\Http\Controllers";

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
        $this->app->bind(IContactWriteRepository::class, ContactWriteRepository::class);
        $this->app->bind(IContactReadRepository::class, ContactReadRepository::class);
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php",
            "contact"
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
