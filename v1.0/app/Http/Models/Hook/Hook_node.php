<?php

/*
 * 内容钩子
 * Hook_node
 */
namespace App\Http\Models\Hook;
use Illuminate\Database\Eloquent\Model;
class Hook_node extends Model {

    /**
     * hook_node_load
     */
    public static function node_load($node) {
        $hook = 'node_load';
        $module_list = Base::get_active_module();
        foreach ($module_list as $module) {
            if (Hook::module_invoke($module, $hook, $node)) {
                $node = Hook::module_invoke($module, $hook, $node);
            }
        }
        return $node;
    }

    /**
     * hook_node_page_load
     */
    public static function node_page_load($node) {
        $hook = 'node_page_load';
        $module_list = Base::get_active_module();
        foreach ($module_list as $module) {
            if (Hook::module_invoke($module, $hook, $node)) {
                $node = Hook::module_invoke($module, $hook, $node);
            }
        }
        return $node;
    }

}
