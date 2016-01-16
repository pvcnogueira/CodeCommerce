<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 16/01/2016
 * Time: 12:24
 */

use \Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->truncate();
        
        factory('CodeCommerce\Category', 15)->create();
    }
} 