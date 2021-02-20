<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterHealthOfficer;
use App\Http\Controllers\DonorFundsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HierarchicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MoneyDistributionController;
use App\Http\Controllers\WellWishers;
use App\Http\Controllers\TotalAmountController;
use App\Htpp\Controllers\Treasury;
use App\Http\Controllers\notificationsController;
use App\Http\Controllers\DonorListController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\WaitingController;
use App\Http\Controllers\OfficerListController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PercentageChange;


use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//mycontrolllers
Route::get("/registerofficer", [RegisterHealthOfficer::class, 'index'])->name("registerofficer");
Route::post("/registerofficer", [RegisterHealthOfficer::class, 'store']);
Route::get('/officerlist',[OfficerListController::class , "index"])->name("officerlist");

//finds routes and controllers
Route::get("/donations", [DonorFundsController::class, 'index'])->name("donations");
Route::post("/donations", [DonorFundsController::class, 'store']);
Route::get('/donorlist',[DonorListController::class , 'index'])->name('donorlist');
//treasury
Route::get('/treasury',[TotalAmountController::class , 'index'] )->name('treasury');
//

Route::get('/donation', [DonationController::class , "index"])->name("donation");
Route::post('/donation',[DonationController::class, 'store']);
//hierachical
Route::get('/hierarchical',[HierarchicalController::class, "index"])->name("hierarchical");

//percentage change in graphs
Route::get("/change", [PercentageChange::class, 'index'])->name("change");
Route::post("/change", [PercentageChange::class, 'store']);

//patients controller
Route::get('/patienlist', [PatientController::class, 'index'])->name('patientlist');

//money distribution
Route::get('/money/{month?}/{money?}', [MoneyDistributionController::class, "index"])->name("money");
Route::post('/money', [MoneyDistributionController::class, "store"]);

//wellwishers graphs
Route::get('/wellwishers', [WellWishers::class , 'index'])->name('wellwishers');
Route::post('/wellwishers', [WellWishers::class , 'store']);
//notifications



//promotions well list
Route::get("/promotions", [PromotionsController::class , "index"])->name("promotions");

//waitinglist
Route::get("waitinglist", [WaitingController::class, "index"])->name("waitinglist");

//hospitals
Route::get("/hospitals", [HospitalController::class , "index"])->name("hospitals");