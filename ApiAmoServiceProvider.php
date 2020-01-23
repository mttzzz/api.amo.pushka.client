<?php


namespace mttzzz\ApiAmocrmPushkaClient;


use Illuminate\Support\ServiceProvider;

class ApiAmoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config.php' => config_path('api-amo-pushka.php'),
        ], 'config');
    }
}
