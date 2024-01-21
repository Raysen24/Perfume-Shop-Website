<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginOrRegister'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class,'home'])->name('home');
// Route::post('update/{customerID}/{productID}', [HomeController::class, 'updateQty']);
Route::match(['get', 'post'],'update/{customerID}', [CartController::class, 'updateQty']);
// Route::any('update/{customerID}/{productID}', [HomeController::class, 'updateQty']);
// Route::put('home/{id}',[HomeController::class, 'qtyUpdate']);

Route::get('/productsview', [ProductController::class, 'productsview'])->name('productsview');
Route::get('/testproduct', [ProductController::class, 'testproduct'])->name('testproduct');
Route::get('/product/{id}/image', [ProductController::class, 'showImage'])->name('product.image');

Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');

Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');

Route::get('/productdetail/{id}', [ProductController::class,'productdetail']);
Route::get('/productdetailview', [ProductController::class, 'productdetailview'])->name('productdetailview');

Route::get('/quiz', [QuizController::class, 'quiz'])->name('quiz');
route::post('/add_quizresult', [QuizController::class,'addQuizResult'])->name('addQuizResult');

Route::post('/add-to-cart', [CartController::class, 'addToCart']);

Route::get('/checkout1', [ProductController::class, 'checkout1'])->name('checkout1');
Route::POST('/checkout2', [OrderController::class, 'checkout2'])->name('checkout2');
Route::POST('/checkout3', [OrderController::class, 'checkout3'])->name('checkout3');
Route::POST('/checkout4', [OrderController::class, 'checkout4'])->name('checkout4');
Route::get('/checkout5', [OrderController::class, 'checkout5'])->name('checkout5');

Route::get('/quizresult', [QuizController::class, 'quizresult'])->name('quizresult');

//ga dipake sebebrny cuma show aja
// Route::get('/go-back', [OrderController::class, 'goBackfrom2'])->name('goBackfrom2');
// Route::get('/go-back', [OrderController::class, 'goBackfrom3'])->name('goBackfrom3');
// Route::get('/go-back', [OrderController::class, 'goBackfrom4'])->name('goBackfrom4');

Route::get('/history', [OrderController::class, 'history'])->name('history');

