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
   			['name' => 'Sản phẩm 001', 'slug' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '20000', 'discount' => null, 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'],
   			['name' => ' Sản phẩm 002 Mạch karaoke PT2399 AD88', 'slug' => 'mach-pt2399-ad828', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '10000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'],
   			['name' => 'Sản phẩm 003', 'slug' => 'mach-karaoke-pt2399', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '30000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'],
   			['name' => 'Sản phẩm 004', 'slug' => 'mach-kake-pt2399-ad828', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '50000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'],
   			['name' => 'Sản phẩm 005', 'slug' => 'mach-karae-pt2399-ad828', 'description' => 'Chip: PT2399 + AD828 | Điện áp làm việc: 6 ~ 15VAC / 7 ~ 24VDC', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '40000', 'discount' => '10', 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'Mạch karaoke PT2399 AD828 sử dụng chip PT2399 chuyên dụng cho mạch karaoke, chip hoạt động với hiệu suất ổn định, khuếch đại micro sử dụng chip AD828. Nguồn cung cấp linh hoạt, có thể sử dụng nguồn DC hoặc AC.'], 
        ['name' => 'Sản phẩm 006', 'slug' => 'sl', 'description' => 'Chip', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '58000', 'discount' => null, 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'detail'],
        ['name' => 'Sản phẩm 007', 'slug' => 'sl', 'description' => 'Chip', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '59000', 'discount' => null, 'quantity' => '100', 'category_id' => 7, 'status' => 1, 'detail' => 'detail'],
          ['name' => 'Sản phẩm 008', 'slug' => 'sl', 'description' => 'Chip', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '98000', 'discount' => null, 'quantity' => '100', 'category_id' => 2, 'status' => 1, 'detail' => 'detail'],
        ['name' => 'Sản phẩm 009', 'slug' => 'sl', 'description' => 'Chip', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '58000', 'discount' => null, 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'detail'],
        ['name' => 'Sản phẩm 010', 'slug' => 'sl', 'description' => 'Chip', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/06/mach-karaoke-pt2399-ad828-nxog-0-600x600.jpg', 'price' => '58000', 'discount' => null, 'quantity' => '100', 'category_id' => 5, 'status' => 1, 'detail' => 'detail'],
        ];
    	Product::Insert($data);
    }
}
