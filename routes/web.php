<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineFieldController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\SpecialzationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
//     ],
//     function () { //...

// Route::get('/', [IndexController::class,'index']);
// Route::post('/contact-message', [IndexController::class,'sendMessage']);

// Route::get('/faq', [IndexController::class,'faq']);
// Route::get('/success', [IndexController::class,'success'])->name('success');
// Route::get('/user-login', [UsersController::class,'login'])->name('user-login');
// Route::post('/save-user', [UsersController::class,'saveLogin'])->name('save-user');
// Route::get('/success-register', [UsersController::class,'successregister'])->name('success-register');
// Route::get('/success-login', [UsersController::class,'successlogin'])->name('success-login');
// Route::get('/success-profile', [UsersController::class,'successprofile'])->name('success-profile');
// Route::get('/user-register', [UsersController::class,'register']);
// Route::post('/captcha-validation', [UsersController::class, 'capthcaFormValidate']);
// Route::get('/reload-captcha', [UsersController::class, 'reloadCaptcha']);
// Route::get('/user-profile/{id}', [UsersController::class,'profile'])->name('user-profile');
// Route::post('/update-profile', [UsersController::class, 'updateProfile']);

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/user-logout', [UsersController::class, 'logout'])->name('user-logout');
});

//});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['middleware' => ['auth', 'user-access:admin'], 'prefix' => 'dashboard'], function () {
    //Route::middleware(['auth', 'user-access:admin'])->group(function () {

//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('client', ClientController::class);

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
       //medicine-fields
    Route::resource('medicine-fields', MedicineFieldController::class);
       //categories
    Route::resource('categories', CategoryController::class);
      //specializations
    Route::resource('specializations', SpecialzationController::class);
      //countries
      Route::resource('countries', CountryController::class);
      //tags
      Route::resource('tags', TagController::class);
        //cities
    Route::resource('cities', CityController::class);
     //organizers
    Route::resource('organizers', OrganizerController::class);
 //events
 Route::resource('events', EventController::class);
  //doctors
  Route::resource('doctors', DoctorController::class);
// //how-register
//     Route::resource('/how-register', HowRegisterController::class);
// //faq
//     Route::resource('faq', FaqController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:organizer'])->group(function () {

    Route::get('/organizer/home', [HomeController::class, 'organizerHome'])->name('organizer.home');

});
