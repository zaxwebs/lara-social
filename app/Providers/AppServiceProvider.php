<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Http\Database\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        DatabaseNotificationCollection::macro('withModels', function () {
            return $this->each(function ($notification) {
                if(Arr::exists($notification->data, 'models')) {
                    foreach($notification->data['models'] as $key => $id) {
                        $model = "\App\Models\\$key";
                        $models[$key] = $model::find((int)$id); // find() and findOrFail() need an integer to return one element.
                    }
                    $notification->models = $models;
                }
            });
        });
    }
}
