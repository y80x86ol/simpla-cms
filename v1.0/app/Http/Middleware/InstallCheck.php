<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class InstallCheck {

    /**
     * 检查应用是否安装
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        //检查程序是否已经安装
        if (!strpos($request->url(), 'install')) {
            if (!file_exists('../app/lock.txt')) {
                return Redirect::to('/install/step1');
            }
        }

        return $next($request);
    }

}
