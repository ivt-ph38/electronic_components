<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title' => 'Hướng dẫn mua hàng', 'description' => 'Hướng dẫn mua hàng', 'slug' => 'huong-dan-mua-hang', 'left' => 1, 'bottom' => 0, 'bottom1' => 1, 'content' => 'Khi đã tìm được sản phẩm mong muốn, quý khách vui lòng bấm vào hình hoặc tên sản phẩm để vào được trang thông tin chi tiết của sản phẩm, sau đó:'],
          	['title' => 'Kiểm tra đơn hàng', 'description' => 'Hướng dẫn mua hàng', 'slug' => 'kiem-tra-don-hang', 'left' => 1, 'bottom' => 1, 'bottom1' => 1, 'content' => 'Khi đã tìm được sản phẩm mong muốn, quý khách vui lòng bấm vào hình hoặc tên sản phẩm để vào được trang thông tin chi tiết của sản phẩm, sau đó:'],
        	['title' => 'Chính sách đổi trả sản phẩm mua tại Nshop', 'description' => 'Chính sách đổi trả sản phẩm mua tại Nshop', 'slug' => 'huong-dan-doi-tra', 'left' => 0, 'bottom' => 1, 'bottom1' => 1, 'content' => 'Khi đã tìm được sản phẩm mong muốn, quý khách vui lòng bấm vào hình hoặc tên sản phẩm để vào được trang thông tin chi tiết của sản phẩm, sau đó:']          	      	
        ];
        Post::insert($data);
    }
}
