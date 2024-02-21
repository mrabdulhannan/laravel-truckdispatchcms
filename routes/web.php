<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/definecategories', [App\Http\Controllers\CategoriesController::class, 'create'])->name('definecategories');

Route::post('/storecategories', [App\Http\Controllers\CategoriesController::class, 'store'])->name('storecategories');

Route::get('/mycategories', [App\Http\Controllers\HomeController::class, 'mycategories'])->name('mycategories');

Route::get('/newassesment', [App\Http\Controllers\HomeController::class, 'newassesment'])->name('newassesment');

Route::get('/previewpage', [App\Http\Controllers\CategoriesController::class, 'showData'])->name('previewpage');

Route::get('/updatepassword', [App\Http\Controllers\HomeController::class, 'updatepassword'])->name('updatepassword');


Route::get('log-in', function () {
    return view('auth/login');
})->name('log-in');

Route::get('signup', function () {
    return view('auth/register');
})->name('signup');

Route::get('forgetpassword', function () {
    return view('auth/forgetpassword');
})->name('forgetpassword');


Route::post('/updatepassword', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('updatepassword');

Route::delete('/deleteCategory/{id}', [App\Http\Controllers\CategoriesController::class, 'deleteCategory'])->name('deleteCategory');

Route::put('/updateCategory/{id}', [App\Http\Controllers\CategoriesController::class, 'updateCategory'])->name('updateCategory');
Route::post('/editCategory/{id}', [App\Http\Controllers\CategoriesController::class, 'editCategory'])->name('editCategory');

// Topics Relevent Routes
Route::get('/definetopic', [App\Http\Controllers\TopicsController::class, 'create'])->name('definetopic');
Route::post('/storetopic', [App\Http\Controllers\TopicsController::class, 'store'])->name('storetopic');
Route::patch('/updatetopic/{topicId}', [App\Http\Controllers\TopicsController::class, 'updatetopic'])->name('updatetopic');
Route::patch('/updatetopic/{topicId}', [App\Http\Controllers\TopicsController::class, 'updatetopicpost'])->name('updatetopicpost');
Route::post('/edittopic/{id}', [App\Http\Controllers\TopicsController::class, 'edittopic'])->name('edittopic.post');
Route::get('/edittopic/{id}', [App\Http\Controllers\TopicsController::class, 'edittopic'])->name('edittopic.get');
Route::get('/alltopics', [App\Http\Controllers\TopicsController::class, 'showalltopics'])->name('alltopics');
Route::delete('/deletetopic/{id}', [App\Http\Controllers\TopicsController::class, 'deletetopic'])->name('deletetopic');

Route::group(['middleware' => 'admin'], function () {
    // Admin routes
});

Route::group(['middleware' => 'sales'], function () {
    // Sales routes
});

Route::group(['middleware' => 'dispatch'], function () {
    // Dispatch routes
});

Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
})->name('admin/dashboard');

Route::get('sales/dashboard', function () {
    return view('sales/dashboard');
})->name('sales/dashboard');

Route::get('dispatch/dashboard', function () {
    return view('dispatch/dashboard');
})->name('dispatch/dashboard');

// Route::get('sales/createcarrier', function () {
//     return view('sales/createcarrier');
// })->name('sales/createcarrier');

//Sales Routes
Route::get('/createcarrier', [App\Http\Controllers\SalesController::class, 'create'])->name('createcarrier');
Route::post('/storecarrier', [App\Http\Controllers\SalesController::class, 'store'])->name('storecarrier');
Route::get('/showcarrier', [App\Http\Controllers\SalesController::class, 'showcarrier'])->name('showcarrier');
// Route::post('/editcarrier/{id}', [App\Http\Controllers\SalesController::class, 'editcarrier'])->name('editcarrier');
Route::get('/editcarrier/{id}', [App\Http\Controllers\SalesController::class, 'editcarrier'])->name('editcarrier');
Route::put('/updateCarrier/{id}', [App\Http\Controllers\SalesController::class, 'updateCarrier'])->name('updateCarrier');
Route::delete('/deleteCarrier/{id}', [App\Http\Controllers\SalesController::class, 'deleteCarrier'])->name('deleteCarrier');
Route::get('/filter-carrier-history',[App\Http\Controllers\SalesController::class, 'FilterCarrierHistory'])->name('filter-carrier-history');


//Time Tracker
Route::get('/timetracker', [App\Http\Controllers\TimeTrackerController::class, 'timetracker'])->name('timetracker');
Route::get('/showhistory', [App\Http\Controllers\TimeTrackerController::class, 'showhistory'])->name('showhistory');
Route::post('/savetimetracking', [App\Http\Controllers\TimeTrackerController::class, 'SaveTimesTracking'])->name('savetimetracking');
Route::get('/filter-time-history',[App\Http\Controllers\TimeTrackerController::class, 'FilterTimeHistory'])->name('filter-time-history');


//Sales related Routes
Route::get('/createdailyupdate', [App\Http\Controllers\SalesController::class, 'createdailyupdate'])->name('createdailyupdate');
Route::post('/salesdailyupdate', [App\Http\Controllers\SalesController::class, 'salesdailyupdate'])->name('salesdailyupdate');


//Admin Related Routes
Route::get('/showallusertimehistory', [App\Http\Controllers\AdminController::class, 'showallusertimehistory'])->name('showallusertimehistory');
Route::get('/filter-all-user-time-history',[App\Http\Controllers\AdminController::class, 'TimeHistoryForAllUsers'])->name('filter-all-user-time-history');
Route::get('/updatesforallsales', [App\Http\Controllers\AdminController::class, 'UpdateHistoryForAllSalesUsers'])->name('updatesforallsales');
Route::get('/filterupdateforallsales',[App\Http\Controllers\AdminController::class, 'FilterUpdateHistoryForSalesUsers'])->name('filterupdateforallsales');
Route::get('/showcarrieradmin', [App\Http\Controllers\AdminController::class, 'showcarrieradmin'])->name('showcarrieradmin');
Route::put('/updateCarrierAssignedUser/{id}', [App\Http\Controllers\AdminController::class, 'updateCarrierAssignedUser'])->name('updateCarrierAssignedUser');
Route::get('/filter-carrier-history-admin',[App\Http\Controllers\AdminController::class, 'FilterCarrierHistoryAdmin'])->name('filter-carrier-history-admin');

//Dispatch Related Routes
Route::get('/createload', [App\Http\Controllers\DispatchController::class, 'createload'])->name('createload');
Route::post('/storeload', [App\Http\Controllers\DispatchController::class, 'store'])->name('storeload');
Route::get('/showload', [App\Http\Controllers\DispatchController::class, 'showload'])->name('showload');
Route::get('/editload/{id}', [App\Http\Controllers\DispatchController::class, 'editload'])->name('editload');
Route::delete('/deleteload/{id}', [App\Http\Controllers\DispatchController::class, 'deleteload'])->name('deleteload');