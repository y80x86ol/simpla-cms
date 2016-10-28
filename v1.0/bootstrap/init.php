<?php

/*
 * 程序初始定义
 */

//版本信息
defined("APP_VERSION") or define("APP_VERSION", "1.0");

defined("APP_NAME") or define("APP_NAME", "Simpla");

//基础路径
defined("BASE_PATH") or define("BASE_PATH", dirname(dirname(__FILE__)) . '/');

//app路径
defined("APP_PATH") or define("APP_PATH", BASE_PATH . '/app/');

//public路径
defined("PUBLIC_PATH") or define("PUBLIC_PATH", BASE_PATH . 'public/');

//模块路径
defined("MODULES_PATH") or define("MODULES_PATH", APP_PATH . 'app/Modules/');

//主题路径
defined("THEMES_PATH") or define("THEMES_PATH", APP_PATH . 'app/Themes/');

//模块静态文件地址
defined("MODULES_STATIC_PATH") or define("MODULES_STATIC_PATH", PUBLIC_PATH . 'modules/');
//主题静态文件地址
defined("THTEMES_STATIC_PATH") or define("THTEMES_STATIC_PATH", PUBLIC_PATH . 'themes/');
//文件上传地址
defined("UPLOAD_STATIC_PATH") or define("UPLOAD_STATIC_PATH", PUBLIC_PATH . 'upload/');
//后台静态文件地址
defined("BACKEND_STATIC_PATH") or define("BACKEND_STATIC_PATH", PUBLIC_PATH . 'views/backend/');
//后台安装文件地址
defined("INSTALL_STATIC_PATH") or define("INSTALL_STATIC_PATH", PUBLIC_PATH . 'views/install/');

//初始时间定义
defined("NOW_TIME") or define('NOW_TIME', time());
defined("NOW_FORMAT_TIME") or define('NOW_FORMAT_TIME', date('Y-m-d H:i:d', time()));
