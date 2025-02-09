<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeContoller;

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    route::post('/add_booking/{id}',[HomeContoller::class,'add_booking']);
});

route::get('/home',[AdminController::class,'index'])->name('home');
route::get('/',[AdminController::class,'home']);
route::get('/create_kamar',[AdminController::class,'create_kamar']);
route::get('/data_kamar',[AdminController::class,'data_kamar']);
route::post('/tambah_kamar',[AdminController::class,'tambah_kamar']);
route::get('/kamar_update/{id}',[AdminController::class,'kamar_update']);
route::post('/edit_kamar/{id}',[AdminController::class,'edit_kamar']);
route::get('/kamar_delete/{id}',[AdminController::class,'kamar_delete']);
route::get('/room_detail/{id}',[HomeContoller::class,'room_detail']);

Route::get('/booking_kamar', [AdminController::class, 'showBookings']);
Route::get('/booking_update/{id}', [AdminController::class, 'updateBooking']);
Route::post('/update_booking/{id}', [AdminController::class, 'updateBookingStatus']);
Route::get('/booking_delete/{id}', [AdminController::class, 'deleteBooking']);
