<?php

use Spatie\Permission\Models\Role;
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



Auth::routes();

Route::group(['middleware' =>['auth','role:super-admin|admin|officer']] , function(){
    
    Route::get('/dashboard', 'Dashboard\HomeController@index')->name('dashboard');
    Route::resource('/users', 'Dashboard\UserController');
    Route::resource('/cities', 'Dashboard\CityController');
    Route::resource('/tickets', 'Dashboard\TicketController');
    Route::resource('/orders', 'Dashboard\OrderController');
    Route::resource('/admins', 'Dashboard\AdminController');
    Route::resource('/clients', 'Dashboard\ClientController');
    Route::resource('/officers', 'Dashboard\OfficerController');
    Route::resource('/accounts', 'Dashboard\AcountController')->only(['index','update']);
    Route::resource('/companies', 'Dashboard\CompanyController');
    Route::resource('/super-admins', 'Dashboard\SuperAdminController');
    Route::get('notify','Dashboard\NotifyController@getnotify');
    Route::get('date-convert','Dashboard\NotifyController@date');
});

Route::get('roles', function(){
    // $role = Role::create(['name' => 'super-admin']);
    // $role = Role::create(['name' => 'office']);
    // $role = Role::create(['name' => 'admin']);
    // $role = Role::create(['name' => 'admin']);
    $role = Role::create(['name' => 'client']);

    // Auth::user()->assignRole('admin');
    // $user = App\User::find(5);
    // $user->assignRole('officer');
});

Route::get('/', function(){
    return redirect()->route('dashboard');
});

// Route::get('login','Auth\LoginController')

