<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User\User;
use App\Http\Models\User\RolesPermission;

class Authenticate {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        //针对admin路由进行过滤
        //排除403和404页面
        if ($request->path() != 'admin/403' && $request->path() != 'admin/404') {
            //使用了记住我的功能
            //未登录的用户跳转到登录页面，登录了的用户验证是否具有权限
            if (Auth::check() || Auth::viaRemember()) {
                if (User::find(Auth::user()->id)->roles['rid'] == '3') {
                    //echo '验证通过';
                } elseif (User::find(Auth::user()->id)->roles['rid'] == '1') {
                    if (stristr($as_name, 'admin') != '0') {
                        return redirect()->to('admin/403');
                    }
                } else {
                    //根据数据库权限验证
                    $rid = User::find(Auth::user()->id)->roles['rid'];
                    $result = RolesPermission::check($rid);
                    if (!$result) {
                        return redirect()->to('admin/403');
                    }
                }
            } else {
                if ($request->path() == 'admin/login') {//$_SERVER['REQUEST_URI']
                    //如果是登录页面，则停留此页面
                } else {
                    return redirect()->to('admin/login');
                }
            }
        }

        /**
         * 不存在的router路径，直接跳转到404页面
         * 例如：dev.example.com/abcd这个路径本身就不存在
         */
//        //return Response::view('404', array(), 404);
//        if (substr($request->path(), 0, 5) == 'admin') {
//            return redirect()->to('admin/404');
//        }
//        return redirect()->to('404');

        return $next($request);
    }

}
