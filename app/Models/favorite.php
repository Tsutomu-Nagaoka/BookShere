<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $table = 'favorite';


    public $timestamps = false;

  //   public function user()
  //  {
  //      return $this->belongsTo(User::class);
  //  }
  //
  //  public function product()
  // {
  //     return $this->belongsTo(product::class);
  // }

    // いいねをしているかの判定
    public function isFavorite(Int $user_id, Int $product_id)
    {
      return (boolean) $this->where('user_id', $user_id)->where('product_id', $product_id)->first();

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

    // // いいねしているproductのIDを取得
    // public function favoriteIds(Int $product_id)
    // {
    //   return $this->where('user_id', $user_id)->get('product_id');
    // }
    //
    // // いいね一覧
    // public function getFavorites(Int $product_id, Array $favorite_ids)
    // {
    //   //自分といいねしているプロダクトIDを結合
    //   $favorite_ids[] = $product_id;
    //   return $this->whereIn('product_id', $favorite_ids)->orderBy('created_at', 'DESC')->paginate(10);
    // }
}
