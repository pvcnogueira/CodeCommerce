<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 16/01/2016
 * Time: 12:24
 */

use \Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();
        
        factory('CodeCommerce\Product', 15)->create();
    }
} 