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
            'email'             => 'admin@tempus.com',
            'password'          => Hash::make('12345678'),
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
    }
}
