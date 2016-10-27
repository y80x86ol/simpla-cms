<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
//配置默认使用以下标签
Blade::setRawTags('{{', '}}');

/**
 * 基础配置
 */
Route::pattern('id', '[0-9]+');
Route::pattern('nid', '[0-9]+');    //node内容ID
Route::pattern('tid', '[0-9]+');
Route::pattern('mid', '[0-9]+');    //menu菜单ID
Route::pattern('mtid', '[0-9]+');   //menu_type菜单类型ID
Route::pattern('cid', '[0-9]+');    //category分类ID
Route::pattern('ctid', '[0-9]+');   //category_type分类类型ID
Route::pattern('bid', '[0-9]+');    //block区块ID
Route::pattern('baid', '[0-9]+');   //block_area区块区域ID
/**
 * 权限设置
 */
//Route::when('user*', 'auth');


/* * ============================================================
 * 前台
  =============================================================== */
Route::group(['namespace' => 'Frontend'], function() {


    Route::get('/', 'SiteController@index');
//登录、注册、退出、找回密码
    Route::match(array('GET', 'POST'), '/login', array('as' => 'login', 'uses' => 'UserController@login'));
    Route::match(array('GET', 'POST'), '/logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
    Route::match(array('GET', 'POST'), '/register', array('as' => 'register', 'uses' => 'UserController@register'));
//Route::match(array('GET', 'POST'), '/forget', 'UserController@forget');
    Route::match(array('GET', 'POST'), '/password/remind', array('as' => 'password_remind', 'uses' => 'RemindersController@getRemind'));
    Route::post('/password/getremind', array('as' => 'password_getremind', 'uses' => 'RemindersController@postRemind'));
    Route::match(array('GET', 'POST'), '/password/reset/{token}', array('as' => 'password_reset', 'uses' => 'RemindersController@getReset'));
    Route::post('/password/getreset', array('as' => 'password_getreset', 'uses' => 'RemindersController@postReset'));
//403,404错误提示
    Route::get('/403', array('as' => '403', 'uses' => 'SiteController@message_403'));
    Route::get('/404', array('as' => '404', 'uses' => 'SiteController@message_404'));
//内容Node
    Route::get('/node/{nid}', array('as' => 'node', 'uses' => 'NodeController@index'));
//分类Category
    Route::get('/category/{cid}', array('as' => 'category', 'uses' => 'CategoryController@index'));
//用户User
    Route::get('/user/{cid}', array('as' => 'user', 'uses' => 'UserController@index'));
    Route::match(array('GET', 'POST'), '/user/{cid}/edit', array('as' => 'user_edit', 'uses' => 'UserController@edit'));
//搜索Search
    Route::match(array('GET', 'POST'), '/search', array('as' => 'search', 'uses' => 'SearchController@index'));

//数据库路由
//Route::match(array('GET', 'POST'), '/{?name}', 'SearchController@index');
});
/* * ===========================================================
 * 后台
  ============================================================== */

//Route::when('admin*', 'admin');
Route::group(['namespace' => 'Backend'], function() {

    //权限判断
    Route::match(array('GET', 'POST'), '/admin/login', array('as' => 'admin_login', 'uses' => 'AdminController@login'));
    //403,404错误提示
    Route::get('/admin/403', array('as' => 'admin_403', 'uses' => 'AdminController@message_403'));
    Route::get('/admin/404', array('as' => 'admin_404', 'uses' => 'AdminController@message_404'));


    //后台除登录以外的所有地址都需要权限才可以访问
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/admin', array('as' => 'admin', 'uses' => 'AdminController@index'));

//用户user
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/user', array('as' => 'admin_user', 'uses' => 'UserController@index'));
            Route::match(array('GET', 'POST'), '/admin/user/add', array('as' => 'admin_user_add', 'uses' => 'UserController@add'));
            Route::match(array('GET', 'POST'), '/admin/user/{id}/edit', array('as' => 'admin_user_edit', 'uses' => 'UserController@edit'));
            Route::post('/admin/user/{id}/delete', array('as' => 'admin_user_delete', 'uses' => 'UserController@delete'));
            Route::match(array('GET', 'POST'), '/admin/user/info', array('as' => 'admin_user_info', 'uses' => 'UserController@info'));
            Route::match(array('GET', 'POST'), '/admin/user/ip/lock', array('as' => 'admin_user_ip_lock', 'uses' => 'UserController@ip_lock'));
        });
//用户角色
        Route::group(array(), function() {
            Route::get('/admin/user/roles', array('as' => 'admin_user_roles', 'uses' => 'UserController@roles'));
            Route::match(array('GET', 'POST'), '/admin/user/roles/add', array('as' => 'admin_user_roles_add', 'uses' => 'UserController@roles_add'));
            Route::match(array('GET', 'POST'), '/admin/user/roles/{rid}/edit', array('as' => 'admin_user_roles_edit', 'uses' => 'UserController@roles_edit'));
            Route::get('/admin/user/roles/{rid}/delete', array('as' => 'admin_user_roles_delete', 'uses' => 'UserController@roles_delete'));
            Route::match(array('GET', 'POST'), '/admin/user/roles/{rid}/permission', array('as' => 'admin_user_roles_permission', 'uses' => 'UserController@roles_permission'));
        });

//菜单menu
        Route::group(array(), function() {
            Route::get('/admin/menu', array('as' => 'admin_menu', 'uses' => 'MenuController@index'));
            Route::match(array('GET', 'POST'), '/admin/menu/add/{mtid}', array('as' => 'admin_menu_add', 'uses' => 'MenuController@add'));
            Route::match(array('GET', 'POST'), '/admin/menu/{mtid}/edit/{mid}', array('as' => 'admin_menu_edit', 'uses' => 'MenuController@edit'));
            Route::match(array('GET', 'POST'), '/admin/menu/{mtid}/delete/{mid}', array('as' => 'admin_menu_delete', 'uses' => 'MenuController@delete'));
        });

//菜单类型menu_type
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/menu/type/add', array('as' => 'admin_menu_type_add', 'uses' => 'MenuController@add_type'));
            Route::get('/admin/menu/{mtid}/list', array('as' => 'admin_menu_type_list', 'uses' => 'MenuController@menu_list'));
            Route::match(array('GET', 'POST'), '/admin/menu/type/{mtid}/edit', array('as' => 'admin_menu_type_edit', 'uses' => 'MenuController@edit_type'));
            Route::match(array('GET', 'POST'), '/admin/menu/type/{mtid}/delete', array('as' => 'admin_menu_type_delete', 'uses' => 'MenuController@delete_type'));
            Route::post('/admin/menu/weight/{mtid}/edit/', array('as' => 'admin_menu_type_weight_edit', 'uses' => 'MenuController@edit_weight'));
        });

//分类category
        Route::group(array(), function() {
            Route::get('/admin/category', array('as' => 'admin_category', 'uses' => 'CategoryController@index'));
            Route::match(array('GET', 'POST'), '/admin/category/add/{ctid}', array('as' => 'admin_category_add', 'uses' => 'CategoryController@add'));
            Route::match(array('GET', 'POST'), '/admin/category/{ctid}/edit/{cid}', array('as' => 'admin_category_edit', 'uses' => 'CategoryController@edit'));
            Route::match(array('GET', 'POST'), '/admin/category/{ctid}/delete/{cid}', array('as' => 'admin_category_delete', 'uses' => 'CategoryController@delete'));
        });

//分类类型category_type
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/category/type/add', array('as' => 'admin_category_type_add', 'uses' => 'CategoryController@add_type'));
            Route::get('/admin/category/{ctid}/list', array('as' => 'admin_category_type_list', 'uses' => 'CategoryController@category_list'));
            Route::match(array('GET', 'POST'), '/admin/category/type/{ctid}/edit', array('as' => 'admin_category_type_edit', 'uses' => 'CategoryController@edit_type'));
            Route::match(array('GET', 'POST'), '/admin/category/type/{ctid}/delete', array('as' => 'admin_category_type_delete', 'uses' => 'CategoryController@delete_type'));
            Route::post('/admin/category/weight/{ctid}/edit/', array('as' => 'admin_category_type_weight_edit', 'uses' => 'CategoryController@edit_weight'));
        });

//内容Node
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/node', array('as' => 'admin_node', 'uses' => 'NodeController@index'));
            Route::get('/admin/node/list', array('as' => 'admin_node_list', 'uses' => 'NodeController@list'));
            Route::match(array('GET', 'POST'), '/admin/node/add', array('as' => 'admin_node_add', 'uses' => 'NodeController@type_list'));
            Route::match(array('GET', 'POST'), '/admin/node/add/{type}', array('as' => 'admin_node_add_type', 'uses' => 'NodeController@add'));
            Route::match(array('GET', 'POST'), '/admin/node/{nid}/edit', array('as' => 'admin_node_edit', 'uses' => 'NodeController@edit'));
            Route::get('/admin/node/{nid}/delete', array('as' => 'admin_node_delete', 'uses' => 'NodeController@delete'));
        });

//内容类型node_type
        Route::group(array(), function() {
            Route::get('/admin/node/type', array('as' => 'admin_node_type', 'uses' => 'NodeTypeController@index'));
            Route::match(array('GET', 'POST'), '/admin/node/type/add', array('as' => 'admin_node_type_add', 'uses' => 'NodeTypeController@add'));
            Route::match(array('GET', 'POST'), '/admin/node/type/{type}/edit', array('as' => 'admin_node_type_edit', 'uses' => 'NodeTypeController@edit'));
            Route::match(array('GET', 'POST'), '/admin/node/type/{type}/field', array('as' => 'admin_node_type_field', 'uses' => 'NodeTypeController@fields'));
            Route::match(array('GET', 'POST'), '/admin/node/type/{type}/field/add', array('as' => 'admin_node_type_field_add', 'uses' => 'NodeTypeController@field_add'));
            Route::get('/admin/node/type/{type}/field/edit', array('as' => 'admin_node_type_field_edit', 'uses' => 'NodeTypeController@edit_weight'));
            Route::match(array('GET', 'POST'), '/admin/node/type/{type}/field/{field_name}/edit', array('as' => 'admin_node_type_field_edit', 'uses' => 'NodeTypeController@field_edit'));
            Route::match(array('GET', 'POST'), '/admin/node/type/{type}/field/{field_name}/config', array('as' => 'admin_node_type_field_config', 'uses' => 'NodeTypeController@field_config'));
            Route::post('/admin/node/type/field/delete', array('as' => 'admin_node_type_field_delete', 'uses' => 'NodeTypeController@field_delete'));
            Route::match(array('GET', 'POST'), '/admin/node/type/{type}/display', array('as' => 'admin_node_type_display', 'uses' => 'NodeTypeController@display'));
            Route::match(array('GET', 'POST'), '/admin/node/type/{type}/delete', array('as' => 'admin_node_type_delete', 'uses' => 'NodeTypeController@delete'));
        });

//字段Field

        /**
         * 
         * 区块管理
         * --------------------------------------------------------------------------
         */
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/block', array('as' => 'admin_block', 'uses' => 'BlockController@index'));
            Route::match(array('GET', 'POST'), '/admin/block/add', array('as' => 'admin_block_add', 'uses' => 'BlockController@add'));
            Route::match(array('GET', 'POST'), '/admin/block/{bid}/edit', array('as' => 'admin_block_edit', 'uses' => 'BlockController@edit'));
            Route::match(array('GET', 'POST'), '/admin/block/{bid}/delete', array('as' => 'admin_block_delete', 'uses' => 'BlockController@delete'));
            Route::get('/admin/block/refresh', array('as' => 'admin_block_refresh', 'uses' => 'BlockController@refresh'));
        });
//区块区域
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/block/area/add', array('as' => 'admin_block_area_add', 'uses' => 'BlockController@area_add'));
            Route::match(array('GET', 'POST'), '/admin/block/area/{baid}/edit', array('as' => 'admin_block_area_edit', 'uses' => 'BlockController@area_edit'));
            Route::match(array('GET', 'POST'), '/admin/block/area/{baid}/delete', array('as' => 'admin_block_area_delete', 'uses' => 'BlockController@area_delete'));
        });

        /**
         * 
         * 设置setting
         * -----------------------------------------------------------------------------
         */
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/setting', array('as' => 'admin_setting', 'uses' => 'SettingController@index'));
            Route::match(array('GET', 'POST'), '/admin/setting/add', array('as' => 'admin_setting_add', 'uses' => 'SettingController@add'));
            /**
             * 主题管理
             * {name?} 可选参数，当存在该值的时候，为设置新的默认主题
             */
            Route::match(array('GET', 'POST'), '/admin/setting/theme/{name?}', array('as' => 'admin_setting_theme', 'uses' => 'SettingController@theme'));
            /**
             * 模块管理
             * {name?} 可选参数，当存在该值的时候，为进行模块配置
             * {type?} 可选参数，该值与name同时存在，true或false
             */
            Route::match(array('GET', 'POST'), '/admin/setting/module/{name?}/{type?}', array('as' => 'admin_setting_module', 'uses' => 'SettingController@module'));
            Route::post('/admin/setting/module/refresh', array('as' => 'admin_setting_module_refresh_all', 'uses' => 'SettingController@module_refresh_all'));
            /**
             * 缓存管理
             */
            Route::match(array('GET', 'POST'), '/admin/setting/cache', array('as' => 'admin_setting_cache', 'uses' => 'SettingController@cache'));
            Route::get('/admin/setting/cache/clear', array('as' => 'admin_setting_cache_clear', 'uses' => 'SettingController@cache_clear'));
            /**
             * SEO管理
             */
            Route::match(array('GET', 'POST'), '/admin/setting/seo', array('as' => 'admin_setting_seo', 'uses' => 'SettingController@seo'));
            /**
             * 评论管理
             */
            Route::match(array('GET', 'POST'), '/admin/setting/comment', array('as' => 'admin_setting_comment', 'uses' => 'CommentController@index'));
            Route::match(array('GET', 'POST'), '/admin/setting/comment/{name}', array('as' => 'admin_setting_comment_name', 'uses' => 'CommentController@edit'));
            /**
             * 邮件管理
             */
            Route::match(array('GET', 'POST'), '/admin/setting/email', array('as' => 'admin_setting_email', 'uses' => 'SettingController@email'));
            Route::match(array('GET', 'POST'), '/admin/setting/email/send_test', array('as' => 'admin_setting_email_send_test', 'uses' => 'SettingController@email_send_test'));
            /**
             * 站点离线管理
             */
            Route::get('/admin/setting/maintenance/{name}', array('as' => 'admin_setting_maintenance', 'uses' => 'SettingController@maintenance'));
        });

        /**
         * 
         * 友情链接
         * --------------------------------------------------------------------------
         */
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/link', array('as' => 'admin_link', 'uses' => 'LinkController@index'));
            Route::match(array('GET', 'POST'), '/admin/link/add', array('as' => 'admin_link_add', 'uses' => 'LinkController@add'));
            Route::match(array('GET', 'POST'), '/admin/link/{lid}/edit', array('as' => 'admin_link_edit', 'uses' => 'LinkController@edit'));
            Route::match(array('GET', 'POST'), '/admin/link/{lid}/delete', array('as' => 'admin_link_delete', 'uses' => 'LinkController@delete'));
        });


        /**
         * 
         * 报告
         * --------------------------------------------------------------------------
         */
        Route::group(array(), function() {
            Route::match(array('GET', 'POST'), '/admin/report', array('as' => 'admin_report', 'uses' => 'ReportController@index'));
            //注册用户报告
            Route ::match(array('GET', 'POST'), '/admin/report/register-count', array('as' => 'admin_report_register_count', 'uses' => 'ReportController@register_count'));
            //内容发布报告
            Route::match(array('GET', 'POST'), '/admin/report/node-count', array('as' => 'admin_report_node_count', 'uses' => 'ReportController@node_count'));
            //用户操作日志
            Route::match(array('GET', 'POST'), '/admin/report/logs', array('as' => 'admin_report_logs', 'uses' => 'ReportController@logs'));
        });
    });
});


/* * ============================================================
 * 安装Install
  =============================================================== */
Route::group(['namespace' => 'Install'], function() {
    Route::get('/install/step1', array('as' => 'install_copyright', 'uses' => 'InstallController@index'));
    Route::get('/install/step2', array('as' => 'install_check', 'uses' => 'InstallController@check'));
    Route::match(array('GET', 'POST'), '/install/step3', array('as' => 'install_info', 'uses' => 'InstallController@info'));
    Route::match(array('GET', 'POST'), '/install/step4', array('as' => 'install_go', 'uses' => 'InstallController@success'));
});




Route::auth();

Route::get('/home', 'HomeController@index');
