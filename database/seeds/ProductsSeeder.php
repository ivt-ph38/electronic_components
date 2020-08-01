<?php

use Illuminate\Database\Seeder;
use App\Product;

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

        	['name' => 'Máy hiện sóng PC Oscilloscope Hantek 6022BE', 'slug' => 'may-hien-song-pc-oscilloscope-hantek-6022be', 'description' => 'Nhà sản xuất: Hantek Electronic CO., Ltd', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/07/may-hien-song-pc-oscilloscope-hantek-6022be-hxce-0-600x600.jpg', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => '5', 'status' => 1, 'detail' => '23 chức năng đo, kiểm tra PASS/FALL; Dạng sóng trung bình, cường độ, nghịch đảo, cộng, trừ, nhân chia, biểu đồ X Y'],
        	
        	['name' => 'Mạch bật tắt máy bơm theo mực nước', 'slug' => 'mach-bat-tat-may-bom-theo-muc-nuoc', 'description' => 'Nhà sản xuất: Hantek Electronic CO., Ltd', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/07/may-hien-song-pc-oscilloscope-hantek-6022be-hxce-0-600x600.jpg', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => '5', 'status' => 1, 'detail' => '23 chức năng đo, kiểm tra PASS/FALL; Dạng sóng trung bình, cường độ, nghịch đảo, cộng, trừ, nhân chia, biểu đồ X Y'],
        	
        	['name' => 'Module Đo Điện AC Đa Năng Giao Tiếp UART PZEM004T', 'slug' => 'module-do-dien-ac-da-nang-giao-tiep-uart-pzem004t', 'description' => 'Nhà sản xuất: Hantek Electronic CO., Ltd', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/07/may-hien-song-pc-oscilloscope-hantek-6022be-hxce-0-600x600.jpg', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => '5', 'status' => 1, 'detail' => '23 chức năng đo, kiểm tra PASS/FALL; Dạng sóng trung bình, cường độ, nghịch đảo, cộng, trừ, nhân chia, biểu đồ X Y'],

        	['name' => 'Module Biến Trở Số X9C104', 'slug' => 'module-bien-tro-so-x9c104', 'description' => 'Nhà sản xuất: Hantek Electronic CO., Ltd', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/07/may-hien-song-pc-oscilloscope-hantek-6022be-hxce-0-600x600.jpg', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => '5', 'status' => 1, 'detail' => '23 chức năng đo, kiểm tra PASS/FALL; Dạng sóng trung bình, cường độ, nghịch đảo, cộng, trừ, nhân chia, biểu đồ X Y'],

        	['name' => 'Mạch led trái tim tự ráp', 'slug' => 'mach-led-trai-tim-tu-rap', 'description' => 'Nhà sản xuất: Hantek Electronic CO., Ltd', 'image' => 'https://nshopvn.com/wp-content/uploads/2020/07/may-hien-song-pc-oscilloscope-hantek-6022be-hxce-0-600x600.jpg', 'price' => '100000', 'discount' => '10', 'quantity' => '100', 'category_id' => '5', 'status' => 1, 'detail' => '23 chức năng đo, kiểm tra PASS/FALL; Dạng sóng trung bình, cường độ, nghịch đảo, cộng, trừ, nhân chia, biểu đồ X Y'],

        ];
        Product::insert($data);
    }
}
