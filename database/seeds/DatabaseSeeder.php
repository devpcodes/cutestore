<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call(UserTableSeeder::class);
        App\Product::truncate();
        factory(App\Product::class,200)->create();
        App\Advertising::truncate();
        factory(App\Advertising::class,1)->create();
        Model::reguard();
    }
}
