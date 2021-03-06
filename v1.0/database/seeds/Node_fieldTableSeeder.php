<?php

/*
 * User表测试数据
 */
use Illuminate\Database\Seeder;
class NodefieldTableSeeder extends Seeder {

    public function run() {
        $data = array(
            array(
                'nid' => '1',
                'field_name' => 'body',
                'value' => '你好！欢迎使用Simpla！祝你愉快',
                'weight' => '0',
            ),
            array(
                'nid' => '1',
                'field_name' => 'category',
                'value' => '1',
                'weight' => '0',
            ),
        );
        foreach ($data as $item) {
            DB::table('node_field')->insert($item);
        }
    }

}
