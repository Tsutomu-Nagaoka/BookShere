<?php

use Illuminate\Database\Seeder;
use App\Models\follow;


class followTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         for ($i = 2; $i <= 10; $i++) {
             follow::create([
                 'following_id' => $i,
                 'followed_id' => 1
             ]);
         }
     }
 }
