<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class comment extends Model
{


    protected $table = 'comment';
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getComments(Int $product_id)
    {
      return $this->with('user')->where('product_id', $product_id)->get();
    }

    public function commentStore(Int $user_id, Array $data)
    {
      $this->user_id = $user_id;
      $this->product_id = $data['product_id'];
      $this->text = $data['text'];
      $this->save();

      return;
    }
}
