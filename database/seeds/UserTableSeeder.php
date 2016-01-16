<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 16/01/2016
 * Time: 12:24
 */

use \Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create([
            'name' => 'Pedro Nogueira',
            'email' => 'pvcnogueira@outlook.com',
            'password' => Hash::make('123456')
        ]);

        factory('CodeCommerce\User', 10)->create();
    }
} 