<?php

use App\Http\Controllers\Admin\AppoinmentCotroller;
use App\Http\Controllers\Admin\DashboarController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\AppoinmentConfirm;
use Illuminate\Support\Facades\Route;


// ------------------------------Admin ForgetPassword--------------------------
Route::get('foregt-password', function () {
    return view('admin.dashboard.password.reset');
})->name('foregt_password');




//-------------------------------Admin Login---------------------------------
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [loginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [loginController::class, 'login']);
    Route::post('logout', [loginController::class, 'logout'])->name('logout');
});

//---------------------------Admin Dashboard--------------------------
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [DashboarController::class, 'department'])->name('dashboard');



    //--------------------------------------Admin Profile Module---------------------------
    Route::get('/profile', [DashboarController::class, 'profileview'])->name('profile_view');
    Route::post('/profile-update', [DashboarController::class, 'profileupdate'])->name('profile_update');

//--------------------------Doctor Module------------------------
Route::resource('doctor',DoctorController::class);

//--------------------------Appoinment Module------------------------
Route::resource('appoinment',AppoinmentCotroller::class);

//--------------------------Patint Module------------------------
Route::resource('patient',PatientController::class);


//--------------------------Patint Module------------------------
Route::resource('department',DepartmentController::class);





});

