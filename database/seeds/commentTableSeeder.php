<?php

use Illuminate\Database\Seeder;
use App\Models\comment;

class commentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         for ($i = 1; $i <= 10; $i++) {
             comment::create([
                 'user_id' => 1,
                 'product_id' => $i,
                 'text' => 'これはテストコメント' .$i,
                 'created_at' => now(),
                 'updated_at' => now()
             ]);
         }
     }
 }
