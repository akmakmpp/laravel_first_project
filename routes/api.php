<?php

use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\AdViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChennelsController;
use App\Http\Controllers\HightLightController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LiveController;
use App\Models\Advertising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//User
Route::post('news', [NewsController::class,'index']);
Route::post('ads/slideshow', [AdvertisingController::class,'index']);
Route::post('ads/popup', [AdvertisingController::class, 'show']);
Route::post('live', [LiveController::class, 'index']);
Route::post('live/detail', [LiveController::class, 'show']);
Route::post('relive', [HightLightController::class, 'index']);
Route::post('relive/detail', [HightLightController::class, 'show']);
Route::post('chennels', [ChennelsController::class,'index']);
Route::post('adview',[AdViewController::class,'index']);

Route::get('v2/news', [NewsController::class,'index']);
Route::get('v2/ads/slideshow', [AdvertisingController::class,'index']);
Route::get('v2/ads/popup', [AdvertisingController::class, 'show']);
Route::get('v2/live', [LiveController::class, 'index']);
Route::get('v2/live/detail/{id}', [LiveController::class, 'show']);
Route::get('v2/relive', [HightLightController::class, 'index']);
Route::get('v2/relive/detail/{id}', [HightLightController::class, 'show']);
Route::get('v2/chennels', [ChennelsController::class,'index']);
Route::get('v2/adview',[AdViewController::class,'index']);

//todo Admin
Route::post('login',[AuthController::class,'login']);
Route::group(['middleware'=> 'auth:sanctum'],function(){
//todoNews
Route::post('admin/news',[NewsController::class,'store']);
Route::post('admin/news/update',[NewsController::class,'update']);
Route::post('admin/news/delete',[NewsController::class,'destroy']);
//todo Ad
Route::post('admin/ad',[AdvertisingController::class,'store']);
Route::post('admin/ad/update',[AdvertisingController::class,'update']);
Route::post('admin/ad/delete',[AdvertisingController::class,'destroy']);
//todo Adview
Route::post('admin/adview/create',[AdViewController::class,'store']);
Route::post('admin/adview/update',[AdViewController::class,'update']);
Route::post('admin/adview/delete',[AdViewController::class,'destroy']);
//todo chennels
Route::post('admin/chennels',[ChennelsController::class,'store']);
Route::post('admin/chennels/update',[ChennelsController::class,'update']);
Route::post('admin/chennels/delete',[ChennelsController::class,'destroy']);

//todo live
Route::post('admin/live',[LiveController::class,'store']);
Route::post('admin/live/link',[LiveController::class,'add']);
Route::post('admin/live/update',[LiveController::class,'update']);
Route::post('admin/live/link/update',[LiveController::class,'linkupdate']);
Route::post('admin/live/delete',[LiveController::class,'destroy']);
Route::post('admin/live/detail/delete',[LiveController::class,'linkdestroy']);

Route::post('admin/hightlight',[HightLightController::class,'store']);
Route::post('admin/hightlight/link',[HightLightController::class,'add']);

Route::post('admin/hightlight/update',[HightLightController::class,'update']);
Route::post('admin/hightlight/link/update',[HightLightController::class,'linkupdate']);

Route::post('admin/hightlight/delete',[HightLightController::class,'destroy']);
Route::post('admin/hightlight/detail/delete',[HightLightController::class,'Hightdestroy']);
});

