<?php

use Illuminate\Database\Seeder;
use App\Models\category;


class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
             $category = [
                 ['name' => '文学・評論','created_at' => now(),'updated_at' => now()],
                 ['name' => 'ノンフィクション','created_at' => now(),'updated_at' => now()],
                 ['name' => 'ビジネス・経済','created_at' => now(),'updated_at' => now()],
                 ['name' => '歴史・地理','created_at' => now(),'updated_at' => now()],
                 ['name' => '政治・社会','created_at' => now(),'updated_at' => now()],
                 ['name' => '芸能・エンタメ','created_at' => now(),'updated_at' => now()],
                 ['name' => 'アート・建築・デザイン','created_at' => now(),'updated_at' => now()],
                 ['name' => '人文・思想・宗教','created_at' => now(),'updated_at' => now()],
                 ['name' => '暮らし・健康・料理','created_at' => now(),'updated_at' => now()],
                 ['name' => 'サイエンス・テクノロジー','created_at' => now(),'updated_at' => now()],
                 ['name' => '趣味・実用','created_at' => now(),'updated_at' => now()],
                 ['name' => '教育・自己啓発','created_at' => now(),'updated_at' => now()],
                 ['name' => 'スポーツ・アウトドア','created_at' => now(),'updated_at' => now()],
                 ['name' => '辞典・年鑑','created_at' => now(),'updated_at' => now()],
                 ['name' => '音楽','created_at' => now(),'updated_at' => now()],
                 ['name' => '旅行・紀行','created_at' => now(),'updated_at' => now()],
                 ['name' => '絵本・児童書','created_at' => now(),'updated_at' => now()],
                 ['name' => 'コミックス','created_at' => now(),'updated_at' => now()]
               ];
               DB::table('category')->insert($category);
     }
 }
