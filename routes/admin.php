<?php

use App\Http\Controllers\Admin\AppoinmentCotroller;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\PatientController;
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
    Route::get('/dasboard', function () {
        return view('admin.dashboard.index');
    })->name('dasboard');
//---------------------------Admin Profile-----------------------


//--------------------------Doctor Module------------------------
Route::resource('doctor',DoctorController::class);

//--------------------------Appoinment Module------------------------
Route::resource('appoinment',AppoinmentCotroller::class);

//--------------------------Appoinment Module------------------------
Route::resource('patient',PatientController::class);

});

