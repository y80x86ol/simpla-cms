<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class RouteServiceProvider extends ServiceProvider {

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router) {
        parent::boot($router);

        //检查程序是否已经安装
        if (!strpos(Request::url(), 'install')) {
            if (!file_exists(dirname(dirname(__FILE__)) . '/app/lock.txt')) {
                //Redirect::to('/install/step1');
                header('Location:/install/step1');
                exit;
            }
        }
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router) {
        $this->mapWebRoutes($router);
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router) {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
                ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

}
