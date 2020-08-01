<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
   			['name' => 'Mạch karaoke PT2399 AD828', 'slug' => 'mach-karaoke-pt2399-ad828', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'mach-karaoke-pt2399-ad828', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'],
   			['name' => 'Mạch karaoke PT2399 AD88', 'slug' => 'mach-pt2399-ad828', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'mach-karaoke-pt2399-ad828', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'],
   			['name' => 'karaoke PT2399 AD828', 'slug' => 'mach-karaoke-pt2399', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'mach-karaoke-pt2399-ad828', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'],
   			['name' => 'Mạch karaoke AD828', 'slug' => 'mach-kake-pt2399-ad828', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'mach-karaoke-pt2399-ad828', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'],
   			['name' => 'Mạch karaoke AD828', 'slug' => 'mach-karae-pt2399-ad828', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'mach-karaoke-pt2399-ad828', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'], 

        ];
    	Product::Insert($data);
    }
}
