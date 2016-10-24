<?php

/*
 * 页面钩子
 * Hook_page
 */

namespace App\Http\Models\Hook;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Hook\Hook;
use App\Http\Models\Base;

class Hook_page extends Model {

    /**
     * hook_home_page_load
     */
    public static function home_page_load($data) {
        $hook = 'home_page_load';
        $module_list = Base::get_active_module();
        foreach ($module_list as $module) {
            if (Hook::module_invoke($module, $hook, $data)) {
                $data = Hook::module_invoke($module, $hook, $data);
            }
        }
        return $data;
    }

    /**
     * hook_content_top
     */
    public static function content_top($data = null) {
        $hook = 'page_content_top';
        $module_list = Base::get_active_module();
        foreach ($module_list as $module) {
            if (Hook::module_invoke($module, $hook, $data)) {
                $data = Hook::module_invoke($module, $hook, $data);
            }
        }
        return $data;
    }

    /**
     * hook_content_bottom
     */
    public static function content_bottom($data = null) {
        $hook = 'page_content_bottom';
        $module_list = Base::get_active_module();
        foreach ($module_list as $module) {
            if (Hook::module_invoke($module, $hook, $data)) {
                $data = Hook::module_invoke($module, $hook, $data);
            }
        }
        return $data;
    }

}
