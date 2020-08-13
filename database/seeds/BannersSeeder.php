<?php

use Illuminate\Database\Seeder;
use App\Banner;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
$data = [
        	['name' => 'Banner 1', 'link' => 'https://www.facebook.com/', 'path'=> '/images/banners/2d9a6146e828019141621b08473d7e45banner.png'],
        	['name' => 'Banner 2', 'link' => 'https://www.facebook.com/', 'path'=> '/images/banners/7f8d238f3d201156cebbf7e72d82f557tich-diem-hoan-tien-2020.jpg'],
        	['name' => 'Banner 3', 'link' => 'https://www.facebook.com/', 'path'=> '/images/banners/f37aa74c1cea44dbb56f59f9448d8357bao-hanh.jpg'],
        ];
        Banner::insert($data);
    }
}
