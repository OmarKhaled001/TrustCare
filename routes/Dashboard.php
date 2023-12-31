<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Livewire\SingleInvoices;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/Dashboard_Admin',[DashboardController::class, 'index']);    

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        require __DIR__.'/auth.php';
        
        Route::get('/dashboard/user', function () {return view('Dashboard.User.dashboard');})->middleware(['auth', 'verified'])->name('dashboard.user');
        
        #Auth Admin
        Route::get('/dashboard/admin', [DashboardController::class, 'index'])->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        Route::middleware(['auth:admin'])->group(function () {

            //Sections
            Route::resource('Sections', SectionController::class);
    
            //Doctor 
            Route::resource('Doctors', DoctorController::class);
            Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status'); 
    
            //Single Services 
            Route::resource('Service', SingleServiceController::class);

            //Group Services 
            Route::view('Add_GroupServices','livewire.GroupServices.include_create')->name('Add_GroupServices');

            //Insurance 
            Route::resource('Insurance', InsuranceController::class);

            //Ambulance
            Route::resource('Ambulance', AmbulanceController::class);

            //Patients
            Route::resource('Patients', PatientController::class);

            //Single Invoices
            Route::view('single_invoices','livewire.single_invoices.index')->name('single_invoices');
            Route::view('Print_single_invoices','livewire.single_invoices.print')->name('Print_single_invoices');


        });
    });
