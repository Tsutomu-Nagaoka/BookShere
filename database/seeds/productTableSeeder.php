<?php

use Illuminate\Database\Seeder;
use App\Models\product;


class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         for ($i = 1; $i <= 10; $i++) {
             product::create([
                 'title'       => 'タイトル' .$i,
                 'category_id' => 1,
                 'recommend' => $i,
                 'text' => $i,
                 'product_image'  => 'https://placehold.jp/50x50.png',
                 'user_id'    => $i,
                 'created_at' => now(),
                 'updated_at' => now()
             ]);
         }
     }
 }
