<?php

use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\BusinessPartnersController;
use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\CareersOfDepartmentContriller;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DirectEmployeeController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\GetCarrerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductDetailsController;
use App\Http\Controllers\Api\ProvinceContriller;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SettingsBusinessPartnerController;
use Illuminate\Support\Facades\Route;

Route::get('/settings', SettingController::class);
Route::post('/contactus', ContactController::class);
Route::get('/allCareers', CareerController::class);
Route::get('/getCareerDetails/{career_id}', GetCarrerController::class);
Route::get('/careersOfDepartment/{dep_id}', CareersOfDepartmentContriller::class);
Route::post('/employee', EmployeeController::class);
Route::post('/directEmployee', DirectEmployeeController::class);
Route::post('/businessPartners', BusinessPartnersController::class);
Route::get('/provinces', ProvinceContriller::class);
Route::get('/settings_business_partner', SettingsBusinessPartnerController::class);

Route::get('/features', FeatureController::class);
Route::get('/services', ServiceController::class);
Route::get('/businesses', BusinessController::class);
Route::get('/departments', DepartmentController::class);
Route::get('/products', ProductController::class);
Route::get('/product/details/{business_id}', ProductDetailsController::class);
