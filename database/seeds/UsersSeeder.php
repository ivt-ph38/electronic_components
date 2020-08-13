<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['name' => 'Lương Văn Tiến', 'email' => 'ht@gmail.com', 'password' => '123456789', 'address' => '92 Quang Trung', 'role' => 'admin']
        ];
        User::Insert($data);
    }

}
