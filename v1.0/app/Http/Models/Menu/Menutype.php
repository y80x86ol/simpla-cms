<?php

/*
 * 用户角色表
 */
namespace App\Http\Models\Menu;
use Illuminate\Database\Eloquent\Model;
class Menutype extends Model {

    protected $table = 'menu_type';
    //fillable 属性指定哪些属性可以被集体赋值。这可以在类或接口层设置。
    //fillable 的反义词是 guarded，将做为一个黑名单而不是白名单：
    protected $fillable = array('title', 'description', 'machine_name');
    //注意在默认情况下您将需要在表中定义 updated_at 和 created_at 字段。
    //如果您不希望这些列被自动维护，在模型中设置 $timestamps 属性为 false。
    public $timestamps = false;

    public function menu() {
        return $this->hasMany('App\Http\Models\Menu\Menu', 'tid');
    }

}
