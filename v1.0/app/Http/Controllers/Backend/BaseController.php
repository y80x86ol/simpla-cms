<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Setting;
use Illuminate\Support\Facades\View;

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function __construct() {
        //主题
        $this->adminThem = Setting::find('admin_theme') ? Setting::find('admin_theme')->value : 'default';
        View::addNamespace('BackTheme', dirname(dirname(__DIR__)) . '/views/backend/' . $this->adminThem . '/');
        //后台静态文件地址
        defined("BACKEND_STATIC_PATH") or define("BACKEND_STATIC_PATH", '/views/backend/' . $this->adminThem . '/');
    }

}
