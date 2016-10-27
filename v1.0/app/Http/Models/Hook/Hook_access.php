<?php

/*
 * 角色权限钩子
 * Hook_access
 */

namespace App\Http\Models\Hook;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Hook\Hook;
use App\Http\Models\Base;

class Hook_access extends Model {

    /**
     * hook_access
     */
    public static function access() {
        $hook = 'access';
        $module_list = Base::get_active_module();

        $access_routes = array();
        if (file_exists(dirname(dirname(__DIR__)) . '/access.php')) {
            $access_routes = require dirname(dirname(__DIR__)) . '/access.php';
        }
        foreach ($module_list as $module) {
            if (Hook::module_invoke($module, $hook)) {
                $module_route_access = Hook::module_invoke($module, $hook);
                $access_routes = array_merge_recursive($access_routes, $module_route_access);
            }
        }
        return $access_routes;
    }

}
