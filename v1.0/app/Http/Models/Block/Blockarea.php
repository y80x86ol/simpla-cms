<?php

/*
 * 区块区域表
 */

namespace App\Http\Models\Block;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Block\Blockarea;
use App\Http\Models\Theme\Theme;

class Blockarea extends Model {

    protected $table = 'block_area';
    //fillable 属性指定哪些属性可以被集体赋值。这可以在类或接口层设置。
    //fillable 的反义词是 guarded，将做为一个黑名单而不是白名单：
    protected $fillable = array('title', 'description', 'machine_name');
    //注意在默认情况下您将需要在表中定义 updated_at 和 created_at 字段。
    //如果您不希望这些列被自动维护，在模型中设置 $timestamps 属性为 false。
    public $timestamps = false;

    public function block() {
        return $this->hasMany('App\Http\Models\Block\Block', 'baid');
    }

    /**
     * 
     */
    public static function get($name) {
        $blocks = array();
        $area = Blockarea::where('machine_name', '=', $name)->firstOrFail();
        if (empty($area)) {
            return '不存在的区域!';
        }
        if ($area->block) {
            foreach ($area->block as $row) {
                //die();
                if (empty($row)) {
                    continue;
                }
                $blocks[] = $row;
            }
        }

        if (empty($blocks)) {
            return '';
        } else {
            return Theme::block($blocks, $name);
            //return View::make($file, array('blocks' => $blocks));
        }
    }

}
