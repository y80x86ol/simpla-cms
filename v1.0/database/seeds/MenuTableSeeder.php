<?php

/*
 * User表测试数据
 */
use Illuminate\Database\Seeder;
class MenuTableSeeder extends Seeder {

    public function run() {
        $data = array(
            array(
                'id' => '1',
                'pid' => '0',
                'tid' => '1',
                'title' => '首页',
                'description' => '首页链接',
                'url' => '/',
                'weight' => '0',
            ),
            array(
                'id' => '2',
                'pid' => '0',
                'tid' => '1',
                'title' => '关于我',
                'description' => '关于我的描述',
                'url' => '/node/1',
                'weight' => '0',
            ),
        );
        foreach ($data as $item) {
            DB::table('users')->insert($item);
        }
    }

}
