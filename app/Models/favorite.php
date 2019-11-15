<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $table = 'favorite';


    public $timestamps = false;

    public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function product()
  {
      return $this->belongsTo(product::class);
  }

    // いいねをしているかの判定
    public function isFavorite(Int $user_id, Int $product_id)
    {
      return (boolean) $this->where('user_id', $user_id)->where('product_id', $product_id)->first();

    }

    // いいねしているproductのIDを取得-いいね一覧画面
    public function favoriteIds(Int $user_id)
    {
      return $this->where('user_id', $user_id)->paginate(16);
    }


    public function storeFavorite(Int $user_id, Int $product_id)
    {
      $this->user_id = $user_id;
      $this->product_id = $product_id;
      $this->save();

      return;
    }

    public function destroyFavorite(Int $favorite_id)
    {
      return $this->where('id', $favorite_id)->delete();
    }
}
