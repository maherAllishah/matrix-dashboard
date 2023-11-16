<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\businessPartnersRequests;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DirectEmployeeController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProvincesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SettingsOfBusinessPartnersController;
use App\Http\Controllers\Admin\TagController;



Route::group(['prefix' => 'dashboard/admin/', 'as' => 'admin.', 'middleware' => (['auth'])], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('home');
    Route::resource('admins', AdminController::class);
    Route::resource('departments', DepartmentController::class)->middleware('permission:hr permission|control admins');
    Route::resource('careers', CareerController::class)->middleware('permission:hr permission|manager permission|control admins');
    Route::resource('direct_employee', DirectEmployeeController::class)->middleware('permission:list direct employee|delete direct employee|control admins');
    Route::get('career/application/{dep_id}/{career_id}', [CareerController::class, 'showApplication'])->name('showApplication');
    Route::get('career/application/employee/{dep_id}/{career_id}/{employee_id}', [CareerController::class, 'showApplicationDetails'])->name('showApplicationDetails');
    Route::put('career/application/evaluate/application_in/{dep_id}/{career_id}/{employee}', [CareerController::class, 'updateApp'])->name('updateApp');

    //business_partners
    Route::resource('provinces', ProvincesController::class);
    Route::middleware('permission:control business partner|control admins')->group(function () {
        Route::resource('business_partners_settings', SettingsOfBusinessPartnersController::class);
        Route::get('business_partners_list', [businessPartnersRequests::class, 'list'])->name('business_partners_list.list');
        Route::get('business_partners_requests', [businessPartnersRequests::class, 'index'])->name('business_requests.index');
        Route::get('business_partners_requests/filter', [businessPartnersRequests::class, 'filter'])->name('business_requests.filter');
        Route::delete('business_partners_requests/{id}', [businessPartnersRequests::class, 'destroy'])->name('business_requests.delete');
        Route::patch('business_partners_requests/accept/{id}', [businessPartnersRequests::class, 'accept'])->name('business_requests.accept');
        Route::patch('business_partners_requests/reject/{id}', [businessPartnersRequests::class, 'reject'])->name('business_requests.reject');
        Route::patch('business_partners_requests/approved/{id}', [businessPartnersRequests::class, 'approved'])->name('business_requests.approved');
        Route::patch('business_partners_requests/former/{id}', [businessPartnersRequests::class, 'former'])->name('business_requests.former');
    });
    Route::post('approve/{employee}', [CareerController::class, 'approve'])->middleware('permission:control admins|send email|control admins')->name('approve');
    Route::resource('contacts', ContactController::class)->middleware('permission:list contacts|control admins');
    Route::resource('roles', RoleController::class)->middleware('permission:control admins|control roles');
    Route::resource('tags', TagController::class)->middleware('permission:control admins|hr permission');
    // new one
    Route::middleware('permission:control settings|control admins')->group(function () {
        Route::resource('settings', SettingController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('features', FeatureController::class);
        Route::resource('products', ProductController::class);
        Route::resource('businesses', BusinessController::class);
    });


});
