<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(BlogsSeeder::class);
        $this->call(ConfigurationsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BannersSeeder::class);
        $this->call(PostsSeeder::class);
    }
}
