<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\Models\product;
use App\Models\comment;
use App\Models\follow;
use App\Models\category;
use App\Models\favorite;

class ProductsController extends Controller

{
     public function index(product $product, follow $follow)
     {
       $user = auth()->user();
       $follow_ids = $follow->followingIds($user->id);
        // followed_idだけを抜き出す
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $timelines = $product->getTimelines($user->id, $following_ids);

        return view('products.index', [
        'user'      => $user,
        'timelines' => $timelines
         ]);
     }

      public function allProducts()
      {
         $products = product::sortable()->paginate(16);

         // $all_products = product::latest()->paginate(10);
         return view('products.all', [
         'products'  => $products
          ]);
      }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        return view('products.create',[
          'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, product $product)
    {
        $user = auth()->user();
        $data = $request->all();
        $validator = Validator::make($data,[
          'title' => ['required', 'string'],
          'author' => ['required', 'string'],
          'category' => ['required', 'integer'],
          'recommend' => ['required', 'string'],
          'text' => ['required', 'string'],
          'product_image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $validator->validate();
        $product->productStore($user->id, $data);

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product, comment $comment)
    {
      $user = auth()->user();
      $product = $product->getProduct($product->id);
      $comment = $comment->getComments($product->id);

      return view('products.show', [
        'user'     => $user,
        'product' => $product,
        'comment' => $comment
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $user = auth()->user();
        $products = $product->getEditProduct($user->id, $product->id);

        if(!isset($products)){
          return redirect('products');
        }

        return view('products.edit',[
          'user' => $user,
          'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
      $user = auth()->user();
      $data = $request->all();
      $validator = Validator::make($data,[
        'text' => ['required', 'string']
      ]);

      $validator->validate();
      $product->productUpdate($product->id, $data);

      return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $user = auth()->user();
        $product->productDestroy($user->id, $product->id);
        return back();
    }

}
