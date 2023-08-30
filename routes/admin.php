<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Admin_panel_settingsController;
use App\Models\Admin_panel_setting;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\TreasuriesController;


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
define('PAGINATION_COUNT',1);
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function(){

    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

    Route::get('/adminpanelsetting/index',[Admin_panel_settingsController::class,'index'])->name('admin.adminPanelSetting.index');
    Route::get('/adminpanelsetting/edit',[Admin_panel_settingsController::class,'edit'])->name('admin.adminPanelSetting.edit');
    Route::post('/adminpanelsetting/update',[Admin_panel_settingsController::class,'update'])->name('admin.adminPanelSetting.update');
    /*start T*/ 
    Route::get('/treasuries/index',[TreasuriesController::class,'index'])->name('admin.treasuries.index');
    Route::get('/treasuries/create',[TreasuriesController::class,'create'])->name('admin.treasuries.create');
    Route::post('/treasuries/store',[TreasuriesController::class,'store'])->name('admin.treasuries.store');
    Route::post('/treasuries/ajax_search',[TreasuriesController::class,'ajax_search'])->name('admin.treasuries.ajax_search');
    /*end T*/ 

    });
    



Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function()
{
Route::get('login',[LoginController::class,'show_login_view'])->name('admin.showlogin');
Route::post('login',[LoginController::class,'login'])->name('admin.login');


});




