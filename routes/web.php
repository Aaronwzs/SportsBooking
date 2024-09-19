<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\XmlController;

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

Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class,'index'])->middleware('auth')->name('home');

Route::get('post',[HomeController::class,'post'])->middleware(['auth','admin']);



Route::get('/fetch-xml', [XmlController::class, 'fetchXml']);


Route::get('/admin/reports', [XmlController::class, 'showReport'])->name('admin.reports');



// User Routes

Route::get('/booking', [HomeController::class, 'product'])->middleware('auth')->name('booking.product');
Route::get('/deals', [HomeController::class, 'promotion'])->middleware('auth')->name('deals.promotion');


// Admin Routes

Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/booking', [AdminController::class, 'booking'])->name('booking'); //this is for booking list
    Route::get('/bookings/xml', [BookingController::class, 'generateXML']);
    
});     

Route::post('/booking/approve/{id}', [BookingController::class, 'approve'])->name('approve.booking');
Route::post('/booking/reject/{id}', [BookingController::class, 'reject'])->name('reject.booking');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
