<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\FavouriteController;


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
//     return view('index');
// })->name('index');
/*start MainController */
Route::get('/',[MainController::class,'index'])->name('index');
Route::get('/language/{locale}',[MainController::class,'language'])->name('language');
Route::get('/cat_product/{id}',[MainController::class,'catproduct'])->name('cat_product');
Route::post('/leave_comment',[MainController::class,'leavecomment'])->name('leave_comment');
Route::get('/review_like/{id}',[MainController::class,'reviewlike'])->name('review_like');
Route::get('/review_dislike/{id}',[MainController::class,'reviewdislike'])->name('review_dislike');
Route::get('/product_show/{id}',[MainController::class,'productshow'])->name('product_show');
/*end MainController */

/*start CartController */
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::get('/add_to_cart/{id}',[CartController::class,'addtocart'])->name('add_to_cart');
Route::get('/delete_from_cart/{id}',[CartController::class,'deletefromcart'])->name('delete_from_cart');
Route::get('/process_to_checkout',[CartController::class,'processtocheckout'])->name('process_to_checkout');
Route::get('/update_cart',[CartController::class,'updatecart'])->name('update_cart');
/*end CartController */

/*start FavouriteController */
Route::get('/add_to_favourite/{id}',[FavouriteController::class,'addtofavourite'])->name('add_to_favourite');
Route::get('/favouritelist',[FavouriteController::class,'favouritelist'])->name('favouritelist');
Route::get('/delete_from_favourite/{id}',[FavouriteController::class,'deletefromfavourite'])->name('delete_from_favourite');

/*end FavouriteController */

/******************start admin section*******************/
Route::group(['middleware' => 'admin','prefix'=>'/admin'], function () {

/*start admin navbar routing */
Route::get('/adminarea',[NavbarController::class,'adminarea'])->name('adminarea');
Route::get('/profile',[NavbarController::class,'profile'])->name('profile');
Route::post('/profilechange/{id}',[NavbarController::class,'profilechange'])->name('profilechange');
/*end navbar routing */

/*start brands */
Route::get('/get_brands',[BrandController::class,'get_brands'])->name('get_brands');
Route::get('/delete_brands/{id}',[BrandController::class,'delete_brands'])->name('delete_brands');
Route::get('/edit_brands/{id}',[BrandController::class,'edit_brands'])->name('edit_brands');
Route::get('/add_brands_page',[BrandController::class,'add_brands_page'])->name('add_brands_page');
Route::post('/add_brand',[BrandController::class,'add_brand'])->name('add_brand');
Route::post('/update_brand/{id}',[BrandController::class,'update_brand'])->name('update_brand');
/*end brands */

/*start categories */
Route::get('/get_categories',[CategoryController::class,'get_categories'])->name('get_categories');
Route::get('/delete_category/{id}',[CategoryController::class,'delete_category'])->name('delete_category');
Route::get('/edit_category/{id}',[CategoryController::class,'edit_category'])->name('edit_category');
Route::get('/add_category_page',[CategoryController::class,'add_category_page'])->name('add_category_page');
Route::post('/add_category',[CategoryController::class,'add_category'])->name('add_category');
Route::post('/update_category/{id}',[CategoryController::class,'update_category'])->name('update_category');
/*end categories */

/*start products */
Route::get('/get_products',[ProductController::class,'get_products'])->name('get_products');
Route::get('/delete_product/{id}',[ProductController::class,'delete_product'])->name('delete_product');
Route::get('/edit_product/{id}',[ProductController::class,'edit_product'])->name('edit_product');
Route::get('/add_product_page',[ProductController::class,'add_product_page'])->name('add_product_page');
Route::post('/add_product',[ProductController::class,'add_product'])->name('add_product');
Route::post('/update_product/{id}',[ProductController::class,'update_product'])->name('update_product');
/*end products */

/*start members */
Route::get('/get_members',[MemberController::class,'get_members'])->name('get_members');
Route::get('/delete_member/{id}',[MemberController::class,'delete_member'])->name('delete_member');
Route::get('/edit_member/{id}',[MemberController::class,'edit_member'])->name('edit_member');
Route::get('/add_member_page',[MemberController::class,'add_member_page'])->name('add_member_page');
Route::post('/add_member',[MemberController::class,'add_member'])->name('add_member');
Route::post('/update_member/{id}',[MemberController::class,'update_member'])->name('update_member');
/*end members */

/*stat review */
Route::get('/get_reviews',[ReviewController::class,'get_reviews'])->name('get_reviews');
/*end review */

});

/******************end admin section*******************/

Auth::routes();

Route::get('/home', [MainController::class, 'index'])->name('home');
Route::post('/search', [MainController::class, 'search'])->name('search');
Route::get('/search', [MainController::class, 'search'])->name('search');
Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
