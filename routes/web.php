<?php

use App\Http\Controllers\BookTicketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineFieldController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\SpecialzationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VodafoneController;
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
    // Route::resource('categories', CategoryController::class);
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
     //organize-filter
  Route::get('/organize-filter',[OrganizerController::class, 'filter'])->name('organize-filter');
 //events
 Route::resource('events', EventController::class);
 //event/active
 Route::post('/faq/active',[EventController::class, 'activefaq'])->name('faqActive');
 Route::post('/faq/deActive',[EventController::class, 'deActivefaq'])->name('faqdeActive');
 //eventAudiance
 Route::get('eventAudiance',[EventController::class, 'eventAudiance'])->name('eventAudiance');
 //addTopic'.$event_id
 Route::get('addTopic',[EventController::class, 'addTopic'])->name('addTopic');
 Route::get('editTopic',[EventController::class, 'editTopic'])->name('editTopic');
 //savingContent
 Route::post('savingContent',[EventController::class, 'savingContent'])->name('savingContent');
 Route::post('updateContent',[EventController::class, 'updateContent'])->name('updateContent');



 // Event Ticket
 Route::get('eventTicket',[EventController::class, 'eventTicket'])->name('eventTicket');
 Route::get('addTicket',[EventController::class, 'addTicket'])->name('addTicket');
 Route::get('editTicket',[EventController::class, 'editTicket'])->name('editTicket');
 Route::post('savingTicket',[EventController::class, 'savingTicket'])->name('savingTicket');
 Route::post('updateTicket',[EventController::class, 'updateTicket'])->name('updateTicket');
  Route::get('/selectOrganizerMail/fetch',[EventController::class, 'selectOrganizerMail'])->name('selectOrganizerMail.fetch');
//copouns
Route::get('addCopoun',[EventController::class, 'addCopoun'])->name('addCopoun');
Route::get('editCopoun',[EventController::class, 'editCopoun'])->name('editCopoun');
Route::post('savingCopoun',[EventController::class, 'savingCopoun'])->name('savingCopoun');
Route::post('updateCopoun',[EventController::class, 'updateCopoun'])->name('updateCopoun');

//Discount
Route::get('addDiscount',[EventController::class, 'addDiscount'])->name('addDiscount');
Route::get('editDiscount',[EventController::class, 'editDiscount'])->name('editDiscount');
Route::post('savingDiscount',[EventController::class, 'savingDiscount'])->name('savingDiscount');
Route::post('updateDiscount',[EventController::class, 'updateDiscount'])->name('updateDiscount');
///////////******************** */
  Route::get('/selectMedicineSpicial/fetch',[EventController::class, 'selectMedicineSpicial'])->name('selectMedicineSpicial.fetch');
  Route::get('/event-filter',[EventController::class, 'filter'])->name('event-filter');
  //doctors
  Route::resource('doctors', DoctorController::class);
  //activeDoctor
  Route::post('/activeDoctor',[DoctorController::class, 'activeDoctor'])->name('activeDoctor');
  //selectDoctorMail
  Route::get('/selectDoctorMail/fetch',[DoctorController::class, 'selectDoctorMail'])->name('selectDoctorMail.fetch');
  //user-filter
  Route::get('/user-filter',[DoctorController::class, 'filter'])->name('user-filter');
  // //how-register
//     Route::resource('/how-register', HowRegisterController::class);
// //faq
//     Route::resource('faq', FaqController::class);
 //organizers
 Route::resource('orders', OrderController::class);
 //organize-filter
Route::get('/order-filter',[OrderController::class, 'filter'])->name('order-filter');
Route::post('/activeOrder',[OrderController::class, 'activeOrder'])->name('activeOrder');

Route::resource('vodafone-cash', VodafoneController::class);

Route::get('/vodafone-cash-filter',[VodafoneController::class, 'filter'])->name('vodafone-cash-filter');
Route::post('/activeVoda',[VodafoneController::class, 'activeOrder'])->name('activeVoda');


Route::resource('booked-ticket', BookTicketController::class);

Route::get('/booked-ticket-filter',[BookTicketController::class, 'filter'])->name('booked-ticket-filter');
// Route::post('/activeVoda',[BookTicketController::class, 'activeOrder'])->name('activeVoda');

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:organizer'])->group(function () {

    Route::get('/organizer/home', [HomeController::class, 'organizerHome'])->name('organizer.home');

});
