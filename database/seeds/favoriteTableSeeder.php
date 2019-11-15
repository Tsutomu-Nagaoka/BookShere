<?php

use Illuminate\Database\Seeder;
use App\Models\favorite;


class favoriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         for ($i = 2; $i <= 10; $i++) {
             favorite::create([
                 'user_id' => 1,
                 'product_id' => $i
             ]);
         }
     }
 }
