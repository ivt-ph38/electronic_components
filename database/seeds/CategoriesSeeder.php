<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['id' => 1, 'name' => 'Arduino', 'slug' => 'arduino', 'parent_id'=> 0],
        	['id' => 2, 'name' => 'Arduino Shield', 'slug' => '2', 'parent_id'=> 1],
        	['id' => 3, 'name' => 'Board Arduino', 'slug' => '3', 'parent_id'=> 1],
        	['id' => 4, 'name' => 'Boaed Arduino wifi', 'slug' => '4', 'parent_id'=> 1],
        	['id' => 5, 'name' => 'Phụ kiện Arduino', 'slug' => '5', 'parent_id'=> 1],
        	['id' => 6, 'name' => 'Cảm biến', 'slug' => 'cam-bien', 'parent_id'=> 0],
        	['id' => 7, 'name' => 'Cảm biến âm thanh', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 8, 'name' => 'Cảm biến ánh sáng', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 9, 'name' => 'Cảm biến cân nặng', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 10, 'name' => 'Cảm biến độ đục của nước', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 11, 'name' => 'Cảm biến dò line', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 12, 'name' => 'Cảm biến áp suất', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 13, 'name' => 'Cảm biến lưu lượng', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 14, 'name' => 'Cảm biến màu sắc', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 15, 'name' => 'Cảm biến nồng độ cồn', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 16, 'name' => 'Cảm biến khoảng cách vật cản', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 17, 'name' => 'Cảm biến siêu âm', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 18, 'name' => 'Cảm biến vật cản hồng ngoại', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 19, 'name' => 'Cảm biến vật cản ra đa', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 20, 'name' => 'Phụ kiện cảm biến khoảng cách', 'slug' => 'cam-bien-am-thanh', 'parent_id'=> 6],
        	['id' => 21, 'name' => 'Đèn LED, Điều khiển LED', 'slug' => 'LED', 'parent_id'=> 0],
        	['id' => 22, 'name' => 'Đèn báo', 'slug' => 'den-bao', 'parent_id'=> 21],
        	['id' => 23, 'name' => 'Đèn báo có còi', 'slug' => 'den-bao', 'parent_id'=> 21],
        	['id' => 24, 'name' => 'Đèn led dây', 'slug' => 'den-bao', 'parent_id'=> 21],
        	['id' => 25, 'name' => 'LED RGB', 'slug' => 'den-bao', 'parent_id'=> 21],
        	['id' => 26, 'name' => 'LED Siêu sáng', 'slug' => 'den-bao', 'parent_id'=> 21],
        	['id' => 27, 'name' => 'Đèn báo', 'slug' => 'den-bao', 'parent_id'=> 22],
        	['id' => 28, 'name' => 'Đèn báo AC', 'slug' => 'den-bao', 'parent_id'=> 22],
        	['id' => 29, 'name' => 'Đèn báo DC', 'slug' => 'den-bao', 'parent_id'=> 22],
        	['id' => 30, 'name' => 'Phụ kiện, dụng cụ', 'slug' => 'den-bao', 'parent_id'=> 0],
        ];
        Category::insert($data);
    }
}
