<?php

namespace App\Providers;

use App\Modules\V1\Contact\Providers\ContactServiceProvider;
use App\Modules\V1\Email\Providers\EmailServiceProvider;
use App\Modules\V1\Phone\Providers\PhoneServiceProvider;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(PhoneServiceProvider::class);
        $this->app->register(EmailServiceProvider::class);
        $this->app->register(ContactServiceProvider::class);
    }
}
