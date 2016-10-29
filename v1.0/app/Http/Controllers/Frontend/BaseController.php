<?php

namespace App\Http\Controllers\Frontend;

//use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Menu\Menu;
use App\Http\Models\Setting;
use App\Http\Models\Theme\Template;
use App\Http\Models\Hook\Hook_page;
use App\Http\Models\User\User;

class BaseController extends Controller {

    public $theme_default;

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
        /**
         * 定义系统模板路径
         */
        View::addNamespace('System', VIEWS_PATH . '/system/');


        /**
         * 
         * 读取站点基础设置
         * -----------------------------------------------------------
         */
        //1、加载基础信息
        $this->siteName = Setting::find('site_name') ? Setting::find('site_name')->value : APP_NAME;
        $this->siteDescription = Setting::find('site_description');
        $this->siteUrl = 'http://' . (Setting::find('site_url')->value ? Setting::find('site_url')->value : Request::server('SERVER_NAME'));

        //2、加载默认主题
        $this->theme_default = Setting::find('theme_default')->value;

        //3、加载其他信息
        $this->siteLogo = THTEMES_STATIC_PATH . $this->theme_default . '/' . (Setting::find('site_logo') ? Setting::find('site_logo')->value : 'logo.png');

        $this->siteCopyright = Setting::find('site_copyright')->value;
        $this->siteTongji = Setting::find('site_tongji')->value;
        $this->user_is_allow_login = Setting::find('user_is_allow_login')->value;
        $this->user_is_allow_register = Setting::find('user_is_allow_register')->value;


        //站点基础信息
        View::share('siteName', $this->siteName);
        View::share('siteDescription', $this->siteDescription);
        View::share('siteUrl', $this->siteUrl);
        View::share('siteLogo', $this->siteLogo);
        View::share('copyright', $this->siteCopyright);
        View::share('tongji', $this->siteTongji);
        //是否允许注册登录
        View::share('is_allow_login', $this->user_is_allow_login);
        View::share('is_allow_register', $this->user_is_allow_register);
        //初始默认的标题、描述、关键字
        View::share('title', '');
        View::share('description', '');
        View::share('keywords', '');

        /**
         * 
         * 获取站点主题设置
         * ---------------------------------------------------------
         */
        //前端主题
        View::share('theme_default', $this->theme_default);
        View::addNamespace('Theme', THEMES_PATH . $this->theme_default . '/');
        //前端默认主题
        View::addNamespace('DefaultTheme', VIEWS_PATH . '/frontend/default/');

        //前端静态Public地址
        define('THEME_STATIC', THTEMES_STATIC_PATH . $this->theme_default);
        //后端主题
        $this->adminThem = Setting::find('admin_theme') ? Setting::find('admin_theme')->value : 'default';
        View::addNamespace('BackTheme', dirname(dirname(__DIR__)) . '/Views/backend/' . $this->adminThem . '/');


        /**
         * 
         * 获取主题设置
         * ---------------------------------------------------------
         */
        $theme_info = require_once(THEMES_PATH . $this->theme_default . '/info.php');
        if (!$theme_info) {
            exit('当前主题缺失info.php文件，请检查该主题是否为一个完整的主题！');
        }
        //获取主题的CSS
        $css = array();
        if (isset($theme_info['css'])) {
            foreach ($theme_info['css'] as $row) {
                $css[] = array('url' => $row, 'weight' => 0);
            }
        }
        View::share('css', $css);
        View::share('theme_css', Template::css($css));
        //获取主题的JS
        $js = array();
        if (isset($theme_info['js'])) {
            foreach ($theme_info['js'] as $row) {
                $js[] = array('url' => $row, 'weight' => 0);
            }
        }
        View::share('js', $js);
        View::share('theme_js', Template::js($js));
        //主题的变量
        if (isset($theme_info['setting'])) {
            foreach ($theme_info['setting'] as $key => $value) {
                View::share('theme_' . $key, $value);
            }
        }


        /**
         * 
         * 页面顶部和底部钩子
         * ---------------------------------------------------------
         */
        View::share('content_top', Hook_page::content_top());
        View::share('content_bottom', Hook_page::content_bottom());


        /**
         * 
         * 菜单导航
         * ------------------------------------------------------
         * return View::make('Foo::view.name');
         */
        $menu_top_list = Menu::get_all_menu_by_id(1);
        $menu_top_content = View::make("System::menu_top", array("menu_top" => $menu_top_list))->render();
        $menu_top = array('list' => $menu_top_list, 'content' => $menu_top_content);

        $menu_bottom_list = Menu::get_all_menu_by_id(2);
        $menu_bottom_content = View::make("System::menu_bottom", array("menu_bottom" => $menu_bottom_list))->render();
        $menu_bottom = array('list' => $menu_bottom_list, 'content' => $menu_bottom_content);

        View::share('menu_top', $menu_top);
        View::share('menu_bottom', $menu_bottom);


        /**
         * 
         * 用户详细信息
         * ------------------------------------------------------
         */
        list($users, $logged_in) = User::info();
//        $users = array();
//        $logged_in = array();
        View::share('users', $users); //用户信息
        View::share('logged_in', $logged_in); //是否登录
        $login_and_register = View::make("System::login_and_register", array('users' => $users))->render();
        View::share('login_and_register', $login_and_register);

        /**
         * 
         * 增加其他额外变量
         * ---------------------------------------------------------
         */
        $is_front = (Request::path() == '/') ? true : false;
        View::share('is_front', $is_front); //是否为首页

        $is_admin = $logged_in ? (($users->roles['rid'] == '3') ? true : false) : false;
        View::share('is_admin', $is_admin); //是否为管理员

        $base_path = Request::root();
        View::share('base_path', $base_path); //程序安装路径
    }

}
