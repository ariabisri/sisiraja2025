<?php


use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FeatureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MapController;


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [UserController::class, 'index'])->name('home')->middleware('auth');
Route::post('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

// user management
Route::prefix('user')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

});

// article Management
Route::resource('artikels', ArtikelController::class);
Route::get('artikels/{id}', [ArtikelController::class, 'show'])->name('artikels.show');

// Gallery Management

Route::resource('galeris', GalleryController::class);
// Route untuk menampilkan halaman edit
Route::get('/galeris/{id}/edit', [GalleryController::class, 'edit'])->name('edit');
// Route untuk menangani pembaruan data
Route::put('/galeris/{id}/update', [GalleryController::class, 'update'])->name('update');
//route kembali dari halaman update
//  Route::get('/', [GalleryController::class, 'index'])->name('home');

Route::get('/cobaview', function () {
    return view ('layout.app');
});


//map
// Route::prefix('map')->group(function () {
//     Route::get('/', [MapController::class, 'index'])->name('map.index');
//     Route::get('/edit/{id}', [MapController::class, 'edit'])->name('map.edit');
//     Route::get('/update/{id}', [MapController::class, 'update'])->name('map.update');
// });
Route::resource('map', MapController::class);
Route::get('/map/data/json', [MapController::class, 'getData'])->name('layer.json');
// Route::prefix('layer')->group(function () {
//     Route::get('/', [LayerController::class, 'index'])->name('layer.index');
//     Route::get('/create', [LayerController::class, 'create'])->name('layer.create');
//     Route::get('/store', [LayerController::class, 'store'])->name('layer.store');
//     Route::get('/edit/{id}', [LayerController::class, 'edit'])->name('layer.edit');
//     Route::get('/update/{id}', [LayerController::class, 'update'])->name('layer.update');
// });
// layer
Route::resource('layer', LayerController::class);
Route::get('/layer/data/json', [LayerController::class, 'getData'])->name('layer.json');
// feature
Route::resource('feature', FeatureController::class);
Route::get('/layers/features', [FeatureController::class, 'getFeaturesByLayer'])->name('features.byLayer');
Route::get('/layers/{id}/features/show', [FeatureController::class, 'showFeaturesByLayer'])->name('showfeatures.byLayer');