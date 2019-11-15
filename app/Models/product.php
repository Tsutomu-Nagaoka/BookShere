<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Collection;
use Kyslik\ColumnSortable\Sortable;





class product extends Model
{

    use SoftDeletes;
    use Sortable;

    protected $table = 'product';
    public $sortable = ['recommend', 'updated_at'];



    public function getUserTimeLine(Int $user_id)
    {
      return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(16);
    }

    public function getProductCount(Int $user_id)
    {
      return $this->where('user_id', $user_id)->count();
    }

    public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function favorites()
   {
       return $this->hasMany(favorite::class);
   }

   public function comment()
   {
       return $this->hasMany(comment::class);
   }

   public function category()
   {
       return $this->belongsTo(category::class);
   }

   // タイムライン
   public function getTimeLines(Int $user_id, Array $follow_ids)
   {
     //自分とフォローしているユーザーIDを結合
     $follow_ids[] = $user_id;
     return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(10);
   }

   // 本の詳細画面
   public function getProduct(Int $product_id)
   {
     return $this->with('user')->where('id', $product_id)->first();
   }

   // 本の保存機能
   public function productStore(Int $user_id, Array $data)
   {
     $file_name = $data['product_image']->store('public/product_image/');

     $this->user_id = $user_id;
     $this->title = $data['title'];
     $this->author = $data['author'];
     $this->category_id = $data['category'];
     $this->recommend = $data['recommend'];
     $this->text = $data['text'];
     $this->product_image = basename($file_name);
     $this->save();

     return;
   }

   // 本の編集機能
   public function getEditProduct(Int $user_id, Int $product_id)
   {
     //$user_idと$product_idの値に一致する本の情報を取得する
     return $this->where('user_id', $user_id)->where('id',$product_id)->first();
   }

   public function productUpdate(Int $product_id, Array $data)
   {
     $this->id = $product_id;
     $this->text = $data['text'];
     $this->update();

     return;
   }

   public function productDestroy(Int $user_id, Int $product_id)
   {
     return $this->where('user_id', $user_id)->where('id', $product_id)->delete();
   }
}
