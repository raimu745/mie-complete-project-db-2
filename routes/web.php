<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

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


///////admin/////////////

Route::prefix('admin')->group(function () {
    route::get('/register',[AdminRegisterController::class,'register'])->name('register');
    route::get('/login',[AdminRegisterController::class,'login'])->name('login');
    route::post('/regstore',[AdminRegisterController::class,'regstore'])->name('re.store');
    Route::get('login/verify/{id}',[AdminRegisterController::class,'login_verify'])->name('login.verify');
    route::post('/loginstore',[AdminRegisterController::class,'loginstore'])->name('loginstore');
    Route::get('/forget',[AdminRegisterController::class,'forget'])->name('forget');
    Route::get('/forget/user/{id}',[AdminRegisterController::class,'forgetuser'])->name('forget.user');

    Route::post('/resetform/{id}',[AdminRegisterController::class,'resetform'])->name('resetform');

    Route::post('/forgetmail',[AdminRegisterController::class,'forgetmail'])->name('forgetmail');

    route::group(['middleware'=>'auth'],function(){

        route::get('/',[AdminController::class,'index'])->name('dashboard');
        route::get('/logout',[AdminRegisterController::class,'logoutUser'])->name('logout.user');
        route::get('/editpro',[AdminController::class,'editpro'])->name('editpro');
        Route::post('/update/profile',[AdminController::class,'updateprofile'])->name('update.profile');
        Route::post('/update/pass',[AdminController::class,'updatepass'])->name('update.pass');
        ///////////////slider//////////////
        Route::get('slider',[SliderController::class,'slider'])->name('slider.index');
        Route::post('/sliderstore',[SliderController::class,'sliderstore'])->name('slider.store');
        Route::get('/stable',[SliderController::class,'stable'])->name('slider.table');

        Route::get("sliderdestroy/{id}",[SliderController::class,'destroy'])->name('slider.destroy');
        Route::get('editsld/{id}',[SliderController::class,'editsld'])->name('edit.slider');
        Route::post('updateslider/{id}',[SliderController::class,'updateslider'])->name('slider.update');
        Route::get('/data-table',[SliderController::class,'datatable'])->name('slider.datatable');


        // ////////////////////////////////country////////////////
    Route::get('/country',[CountryController::class,'index'])->name('country.index');
    Route::post('/countrystore',[CountryController::class,'store'])->name('country.store');
    Route::get('/countryshow',[CountryController::class,'show'])->name('country.show');
    Route::get('/countryedit/{id}',[CountryController::class,'edit'])->name('country.edit');
    Route::post('/countryupdate/{id}',[CountryController::class,'update'])->name('country.update');
    Route::get('/countrydestroy/{id}',[CountryController::class,'destroy'])->name('country.destroy');
    ///////////////////////////country description //////////////////////
    Route::get('/countrydes',[CountryController::class,'desfront'])->name('country.des');
    Route::get('/countrydesview',[CountryController::class,'viewDesdescript'])->name('country.des.view');
    Route::get('/countryDesdescriptDel/{id}',[CountryController::class,'countryDesdescriptDel'])->name('country.DesdescriptDel');
     
    Route::get('/countryDesdescript',[CountryController::class,'countryDesdescript'])->name('country.datadescription');


    Route::post('/countrydes_add',[CountryController::class,'countrydesAdd'])->name('country.countrydes_add');
    Route::post('/countryeye',[CountryController::class,'countryeye'])->name('countryeye');
    Route::get('/countrysingledelete/{id}',[CountryController::class,'singleimg'])->name('single.img.del');
    Route::get('/datatablecountry',[CountryController::class,'Countrydatatable'])->name('country.datatable');

});
});

// Route::prefix('slider')->group(function () {
//     route::get('/form',[SliderController::class,'index']);
//     route::post('/store',[SliderController::class,'store']);

// });


