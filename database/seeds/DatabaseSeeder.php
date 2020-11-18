<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // composition  :   chất liệu
        // style        :   phong cách
        // Properties   :   thuộc tính
        // color        :   màu
        // size         :   kích cỡ
        // category     :   danh mục đồ nam/ nữ/ túi/ ...
        // $this->call(UserSeeder::class);
        $this->call(admin_seed::class);
    }
}
