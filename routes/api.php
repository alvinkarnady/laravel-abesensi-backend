<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\PermissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login
Route::post('/login', [AuthController::class, 'login']);
//logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//company
Route::get('/company', [CompanyController::class, 'show'])->middleware('auth:sanctum');

//checkin
Route::post('/checkin', [AttendanceController::class, 'checkin'])->middleware('auth:sanctum');

//checkout
Route::post('/checkout', [AttendanceController::class, 'checkout'])->middleware('auth:sanctum');

//ischekedin
Route::get('/is-checkin', [AttendanceController::class, 'isCheckedIn'])->middleware('auth:sanctum');

//profle update
Route::post('/update-profile', [AuthController::class, 'updateProfile'])->middleware('auth:sanctum');

//create permissions
Route::apiResource('/api-permissions', PermissionController::class)->middleware('auth:sanctum');

//notes
Route::apiResource('/api-notes', NoteController::class)->middleware('auth:sanctum');
