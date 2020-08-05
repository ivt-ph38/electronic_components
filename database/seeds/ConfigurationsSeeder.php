<?php

use Illuminate\Database\Seeder;
use App\Configuration;

class ConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['name' => 'webname', 'display' => 'Tên Website', 'value'=>'TH|Shop'],
        	['name' => 'hotline', 'display' => 'Hotline', 'value' => '0123 456 789'],
        	['name' => 'email', 'display' => 'Email', 'value' => 'htshop@gmail.com'],
        	['name' => 'shipfee', 'display' => 'Giá ship', 'value' => '30000']
        ];
        Configuration::insert($data);
    }
}
