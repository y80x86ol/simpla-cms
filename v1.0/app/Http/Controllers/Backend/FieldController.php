<?php

/*
 * 字段管理
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BaseController;

class FieldController extends BaseController {

    /**
     * 字段类型列表
     */
    public function index() {
        echo '字段列表';
    }

}
