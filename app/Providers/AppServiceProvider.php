<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Employee;
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
        $employees = Employee::where('status',1)->latest()->get();
        view()->share(compact('employees'));
    }
}
