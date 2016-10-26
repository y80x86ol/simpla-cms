<?php

/*
 * 用户角色表测试数据
 */
use Illuminate\Database\Seeder;
class RolesTableSeeder extends Seeder {

    public function run() {
        //DB::table('users')->delete();
        $data = array(
            array(
                'uid' => '2',
                'rid' => '2',
            ),
            array(
                'uid' => '3',
                'rid' => '2',
            ),
            array(
                'uid' => '4',
                'rid' => '2',
            )
        );
        foreach ($data as $item) {
            DB::table('roles')->insert($item);
        }
    }

}
