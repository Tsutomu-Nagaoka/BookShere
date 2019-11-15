<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorite;
use App\Models\product;
use App\Models\User;

class FavoritesController extends Controller
{

    public function index(favorite $favorite)
    {
        $user = auth()->user();
        $favorite_ids = $favorite->favoriteIds($user->id);
        // $favorites = $favorite->getFavorites($product->id, $favorite_ids);
        return view('favorites.index', [
        'favorites' => $favorite_ids
         ]);

    }


    public function create()
    {
        //
    }


    public function store(Request $request, favorite $favorite)
    {
        $user = auth()->user();
        $product_id = $request->product_id;
        $is_favorite = $favorite->isFavorite($user->id, $product_id);

        if(!$is_favorite){
          $favorite->storeFavorite($user->id, $product_id);
          return back();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(favorite $favorite){
       $user_id = $favorite->user_id;
       $product_id = $favorite->product_id;
       $favorite_id = $favorite->id;
       $is_favorite = $favorite->isFavorite($user_id, $product_id);

       if($is_favorite){
         $favorite->destroyFavorite($favorite_id);
         return back();
       }
       return back();
     }
}
