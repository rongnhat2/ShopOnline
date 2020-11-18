<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class admin_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name'              => 'Super Admin',
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('12345678'),
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('user_class')->insert([
            'user_id'              => '1',
            'name'             => 'admin',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        DB::table('roles')->insert([
            'name'              => 'SuperAdmin',
            'display_name'      => 'Quản lí cao cấp',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_user')->insert([
            'user_id'           => '1',
            'role_id'           => '1',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        DB::table('permissions')->insert([
            'name'              => 'admin',
            'display_name'          => 'Là Admin',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'roles',
            'display_name'          => 'Quản Lí Chức Vụ',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'users',
            'display_name'          => 'Quản Lí Nhân Viên',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        for ($i=1; $i <= 3 ; $i++) { 
            DB::table('role_permission')->insert([
                'permission_id'     => $i,
                'role_id'           => '1',
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
        }

        // Danh mục 
        DB::table('categories')->insert([
            'name'              =>  "Áo",
            'slug'              =>  "ao",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('categories')->insert([
            'name'              =>  "Quần",
            'slug'              =>  "quan",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('categories')->insert([
            'name'              =>  "Túi",
            'slug'              =>  "tui",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('categories')->insert([
            'name'              =>  "Phụ kiện",
            'slug'              =>  "phu-kien",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        // Chất liệu
        DB::table('compositions')->insert([
            'name'              =>  "Vải",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('compositions')->insert([
            'name'              =>  "Da",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        // Phong cách
        DB::table('styles')->insert([
            'name'              =>  "Phong cách 1",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('styles')->insert([
            'name'              =>  "Phong cách 2",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        // Thuộc tính
        DB::table('properties')->insert([
            'name'              =>  "Thuộc tính 1",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('properties')->insert([
            'name'              =>  "Thuộc tính 2",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        // Màu
        DB::table('colors')->insert([
            'name'              =>  "Đen",
            'hex'               =>  "#000000",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('colors')->insert([
            'name'              =>  "Đỏ",
            'hex'               =>  "#ff0000",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        // Size
        DB::table('sizes')->insert([
            'name'              =>  "X",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('sizes')->insert([
            'name'              =>  "S",
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

    }
}
