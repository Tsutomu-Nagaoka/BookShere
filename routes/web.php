<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', 'productsController@allProducts')->name('allProducts');

Auth::routes();

Route::get('products/all', 'productsController@allProducts')->name('allProducts');




// ログイン状態
Route::group(['middleware' => 'auth'], function() {


    // ユーザ関連
    Route::resource('users', 'UsersController');
    Route::get('users/bookshelf/{user}', 'UsersController@bookshelf')->name('bookshelf');

    // フォロー・フォロー解除
    Route::post('/users/{user}/follow','UsersController@follow')->name('follow');
    Route::delete('/users/{user}/unfollow','UsersController@unfollow')->name('unfollow');

    // 本関連
    Route::resource('products', 'ProductsController');

    // コメント
    Route::resource('comments', 'CommentsController');

    // いいね機能
    Route::resource('favorites', 'FavoritesController');
    // Roure::get('/favorites/{user}', 'FavoritesController@allFavorites')
});
