<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\testAiController;
use App\Livewire\AdminCreateTripLive;
use App\Livewire\AddTripMember;
use App\Livewire\AdminRevenueadd;
use App\Livewire\Boatcomplet;
use App\Livewire\BoatDashbord;
use App\Livewire\Boatover;
use App\Livewire\Catchfish;
use App\Livewire\Expenses;
use App\Livewire\FishacountVerify;
use App\Livewire\Registerboat;
use App\Livewire\Revenue;
use App\Livewire\Tripsb;
use App\Livewire\Usermgt;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admindashbord;
use App\Livewire\Createnew;
use App\Livewire\Report;
use App\Livewire\Trip;
use App\Livewire\AdminBoats;
use App\Livewire\AdminCreateTrip;
use App\Livewire\Admindashexpenses;
use App\Livewire\Adminfishman;
use App\Livewire\BomsAiApplication;
use App\Livewire\BomsAiUi;
use App\Livewire\Fisherman;
use App\Livewire\Sidebar;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/nopermition', function () {
    echo "nopermition";
})->middleware(['auth', 'verified'])->name('nopermition');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/reg', function () {
    return view('dadmin.register');
});

Route::middleware(['auth','verified','Admin'])->group(function () {
    Route::get('/dashboard', function () {return view('dadmin.dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
    // Route::get('/dashboard', function () {return view('dadmin.dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
   Route::get('/admindashbord',Admindashbord::class)->name('admindashbord');
   Route::get('/createnew',Createnew::class)->name('createnew');
   Route::get('/report',Report::class)->name('report');
   Route::get('/trip',Trip::class)->name('trip');
   Route::get('/usermgt',Usermgt::class)->name('usermgt');
   Route::get('/boatadmin',AdminBoats::class)->name('boatadmin');
   Route::get('/adminexpenses',Admindashexpenses::class)->name('adminexpenses');
   Route::get('/adminfisherman',Adminfishman::class)->name('adminfisherman');
   Route::get('/admintrip',AdminCreateTrip::class)->name('admintrip');
   Route::get('/adminrev',AdminRevenueadd::class)->name('adminrev');
});

Route::get('/fisherman-salaries', \App\Livewire\AdminfishamPay::class)->middleware(['auth', 'verified']);

Route::middleware(['auth','verified','Boat'])->group(function () {
    // Route::get('/boatdashboard', function () {return view('dboat.dashboard');})->name('boatdashboard');
   Route::get('/tripsb',Tripsb::class)->name('tripsb');
   Route::get('/boatdashboard',Boatover::class)->name('boatdashboard');
   Route::get('/boatcomplet',Boatcomplet::class)->name('boatcomplet');
   Route::get('/expenses',Expenses::class)->name('expenses');
   Route::get('/revenue',Revenue::class)->name('revenue');
   Route::get('/catchdata',Catchfish::class)->name('catchdata');
   Route::get('/addcrew',AddTripMember::class)->name('addcrew');
   
   Route::get('/maiapplication',BomsAiApplication::class)->name('maiapplication');
   Route::get('/prediction',BomsAiUi::class)->name('prediction');

});
// Route::get('/tripsb',Tripsb::class)->name('tripsb');

Route::middleware(['auth','verified','Fisherman'])->group(function () {

    Route::get('/fishermandashboard', function () {return view('dfisherman.dashboard');})->name('fishermandashboard');
    Route::get('/acountVerify',FishacountVerify::class)->name('acountVerify');

    // Route::get('/fishermandashboard', Fisherman::class)->name('fishermandashboard');

});
// 0777678678

Route::get('/boat-dashboard', BoatDashbord::class)->name('boat.dashboard');
// Route::get('/trips/create', AdminCreateTripLive::class)->name('trips.create');

Route::get('/payments/{slipCode?}', \App\Livewire\FishermanPayment::class)
     ->name('fisherman-payment')
     ->middleware('auth');





// use App\Http\Controllers\PredictionController;

Route::post('/predictaa', [testAiController::class, 'predict']);





require __DIR__.'/auth.php';
