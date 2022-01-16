<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\PenjadwalanControler;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function (){
//     $role = Role::find(2);
//     $role->givePermissionTo('edituser');
// });

Route::get('/', [BarangController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['role:superadmin']], function() {
        Route::resource('users', UserController::class);
    });
    Route::resource('penjadwalan', PenjadwalanControler::class);
    Route::resource('barang', BarangController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('supplier', SupplierController::class);
    Route::get('province/list',[ProvinceController::class, 'list'])->name('province.get');
    Route::get('city/list',[CityController::class, 'list'])->name('city.get');
    Route::get('subdistrict/list',[SubdistrictController::class, 'list'])->name('subdistrict.get');
    Route::get('order/ongkir',[OrderC::class, 'ongkir'])->name('ongkir.get');
    Route::post('city/get_list', [CityController::class, 'get_list'])->name('city.get_list');
});

