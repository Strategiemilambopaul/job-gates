<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});
Route::get('/index', [HomeController::class, 'index'])->name('home');
Route::get('/job-applied', [HomeController::class, 'job_applied'])->name('job-applied');
Route::get('/job-detail', [HomeController::class, 'job_detail'])->name('job-detail');
Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');
Route::get('/my-jobs', [HomeController::class, 'my_jobs'])->name('my-jobs');
Route::get('/saved-jobs', [HomeController::class, 'saved_jobs'])->name('saved-jobs');  
Route::get('/post-job', [HomeController::class, 'post_job'])->name('post-job');  

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
