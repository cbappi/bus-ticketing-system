<?php


use App\Models\SeatAllocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeatAllocationController;
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
// routes/web.php



//Route::get('/', [TestController::class,'test']);
//Route::resource('trips', TripController::class);
//Route::resource('allocation', SeatAllocationController::class);

//Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/book-ticket/{trip}', [HomeController::class, 'bookTicket'])->name('bookTicket');


//Make Sell

Route::get('/students', [StudentController::class, 'index']);
Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/comments', [CommentController::class, 'index']);
Route::get('/subjects', [SubjectController::class, 'index']);



//Route::get('/trip', [TripController::class, 'index'])->name('trip.index');

Route::get('/', [TripController::class, 'index'])->name('trip.index');
Route::get('/trip/create', [TripController::class, 'create'])->name('trip.create');
Route::post('/trip/store', [TripController::class, 'store'])->name('trip.store');
Route::get('/trip/edit/{id}', [TripController::class, 'edit'])->name('trip.edit');
Route::put('/trip/update/{id}', [TripController::class, 'update'])->name('trip.update');
Route::get('/trip/destroy/{id}', [TripController::class, 'destroy'])->name('trip.destroy');
Route::get('/trip/tripdetails', [TripController::class, 'tripdetails'])->name('trip.tripdetails');
Route::post('/trip/search', [TripController::class, 'search'])->name('trip.search');
Route::resource('seat-allocations', SeatAllocationController::class);
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


