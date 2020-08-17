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
        	['name' => 'Lương Văn Tiến', 'email' => 'ht@gmail.com', 'password' => '$2y$10$3bvPx8.IwCwGK.HUl15eU.I1wy1LMAchXIn96RH68VzmMQ3CHxf7e', 'address' => '92 Quang Trung', 'role' => 'admin']
        ];
        User::Insert($data);
    }

}
