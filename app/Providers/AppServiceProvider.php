<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
        Validator::extend(
                'recaptcha', 'App\\Validators\\ReCaptcha@validate'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(
                'App\Prowork\Blog\Interfaces\BlogPostInterface', 'App\Prowork\Blog\Repositories\BlogPostRepository'
        );
        $this->app->bind(
                'App\Prowork\Blog\Interfaces\BlogCategoriaInterface', 'App\Prowork\Blog\Repositories\BlogCategoriaRepository'
        );
        $this->app->bind(
                'App\Prowork\Und\Interfaces\UndPostInterface', 'App\Prowork\Und\Repositories\UndPostRepository'
        );
        $this->app->bind(
                'App\Prowork\Und\Interfaces\UndCategoriaInterface', 'App\Prowork\Und\Repositories\UndCategoriaRepository'
        );
        $this->app->bind(
                'App\Prowork\GaleriaImagem\Interfaces\GiGaleriaInterface', 'App\Prowork\GaleriaImagem\Repositories\GiGaleriaRepository'
        );
        $this->app->bind(
                'App\Prowork\GaleriaImagem\Interfaces\GiImagemInterface', 'App\Prowork\GaleriaImagem\Repositories\GiImagemRepository'
        );
    }

}
