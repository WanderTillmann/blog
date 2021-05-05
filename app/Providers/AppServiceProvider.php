<?php

namespace App\Providers;

use App\Observers\PostObserver;
use App\Post;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Blade::component('components.social', 'social');

        Blade::directive('datebr', function ($ex) {
            return "<?php echo(new DateTime($ex))->format('d/m/Y'); ?>";
        });

        Blade::if('posttype', function ($posttype, $c) {
            return $posttype == $c;
        });

        Post::observe(PostObserver::class);
        Schema::defaultStringLength(191);
    }
}
