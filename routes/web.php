<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryVisitorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\SiteVisitController;
use App\Http\Controllers\SiteVisitor;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamController;
use App\Models\CountryVisitor;
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
   
    Route::get('/editcountrydes/{id}',[CountryController::class,'editCountryDes'])->name('country.editdes');
    Route::post('/updatecountrydes/{id}',[CountryController::class,'updateCountryDes'])->name('country.updatedes');
    Route::get('/about/dashboard',[AboutController::class,'index'])->name('about.index');
    Route::post('about_add',[AboutController::class,'store'])->name('about.store');
    Route::get('about_view',[AboutController::class,'show'])->name('about.showpage');
    Route::get('aboutView_Page',[AboutController::class,'view_Page'])->name('about.view_Page');
    ////////////settings//////////////
    Route::get('settings',[SettingController::class,'index'])->name('setting.index');
    Route::post('settings_add',[SettingController::class,'store'])->name('setting.store');
    //////////////////team////////////////////////
    Route::get('team',[TeamController::class,'index'])->name('team.index');
    Route::post('team_add',[TeamController::class,'store'])->name('team.store');
    Route::get('team_view',[TeamController::class,'show'])->name('team.show');
    Route::get('team_datatable',[TeamController::class,'teamDatatable'])->name('team.datatable');

    Route::get('team_edit/{id}',[TeamController::class,'teamEdit'])->name('team.edit');
    Route::get('team_del/{id}',[TeamController::class,'teamDel'])->name('team.del');
    Route::post('update_team/{id}',[TeamController::class,'teamUpdate'])->name('team.update');
    ///////////contact////////////////
    Route::get('contact_datatable',[ContactController::class,'contactDatatable'])->name('contact.datatable');

    Route::get('contact_view',[ContactController::class,'show'])->name('contact.show');
    Route::get('contact_del/{id}',[ContactController::class,'ContactDel'])->name('contact.del');
    Route::get('contact_edit/{id}',[ContactController::class,'ContactEdit'])->name('contact.edit');
    Route::post('contact_update/{id}',[ContactController::class,'contactUpdate'])->name('contact.update');
    Route::post('contact_mail/{id}',[ContactController::class,'contactMail'])->name('contact.mail');
    ///////////////////////////dashboard /////////////////

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.view');
    /////////////site visitor///////////////
    Route::get('sitevisitor',[SiteVisitController::class,'show'])->name('site.visitor');
    Route::get('sitevisitor_show',[SiteVisitController::class,'siteDatatable'])->name('site.datatable');
    
    Route::get('sitevisitor_delete',[SiteVisitController::class,'siteVisitDel'])->name('site.delete');
    ////////////////////////////    country_visitor  /////////////////////////
    Route::get('countryvisitor',[CountryVisitorController::class,'index'])->name('country.visitor');
    Route::get('countryvisitor_show',[CountryVisitorController::class,'countryvisitorDatatable'])->name('country.visitordatatable');
    Route::get('countryvisitor_delete',[CountryVisitorController::class,'countryVisitDel'])->name('country_visitor.delete');


});
});

// Route::prefix('slider')->group(function () {
//     route::get('/form',[SliderController::class,'index']);
//     route::post('/store',[SliderController::class,'store']);

// });


////////////////////////////////////////// Site Route ///////////////////////

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('countryDetails/{id}',[HomeController::class,'countryDetails'])->name('country.detailsSite');
///////////////////////  destination   /////////////////////////

Route::get('destination',[HomeController::class,'destination'])->name('destination.index');
Route::get('about/mie',[HomeController::class,'about'])->name('about_site.index');
Route::get('contact/mie',[HomeController::class,'contact'])->name('contact_site.index');
Route::post('save//contact/mie',[HomeController::class,'contact_save'])->name('save_contact_site.index');


