<?php

use Illuminate\Database\Seeder;
use App\Item as ItemEloquent;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemEloquent::create([
    		'name'=>'迷米手機'
    	]);
    	ItemEloquent::create([
    		'name'=>'臭迷米手機'
    	]);
    	ItemEloquent::create([
    		'name'=>'網路'
    	]);
    	ItemEloquent::create([
    		'name'=>'市內電話'
    	]);
    	ItemEloquent::create([
    		'name'=>'油錢'
    	]);
    	ItemEloquent::create([
    		'name'=>'電梯維護'
    	]);
    	ItemEloquent::create([
    		'name'=>'水費'
    	]);
    	ItemEloquent::create([
    		'name'=>'電費'
    	]);
    	ItemEloquent::create([
    		'name'=>'房屋稅'
    	]);
    	ItemEloquent::create([
    		'name'=>'民宿保險'
    	]);
    	ItemEloquent::create([
    		'name'=>'房屋保險'
    	]);
    	ItemEloquent::create([
    		'name'=>'車子牌照稅'
    	]);
    	ItemEloquent::create([
    		'name'=>'車子燃料稅'
    	]);
    	ItemEloquent::create([
    		'name'=>'車子保險'
    	]);
    	ItemEloquent::create([
    		'name'=>'迷米勞保'
    	]);
    	ItemEloquent::create([
    		'name'=>'迷米保險'
    	]);
    	ItemEloquent::create([
    		'name'=>'瓦斯'
    	]);
    }
}
