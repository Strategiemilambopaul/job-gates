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

// Route::get('/', function () {
//     return view('index');
// });
Route::match(['get', 'post'],'/', [HomeController::class, 'index'])->name('home');
Route::get('/job-detail/{id?}', [HomeController::class, 'job_detail'])->name('job-detail');
Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/my-jobs', [HomeController::class, 'my_jobs'])->name('my-jobs');
    Route::get('/saved-jobs', [HomeController::class, 'saved_jobs'])->name('saved-jobs'); 
    Route::post('/setJob', [HomeController::class, 'setJob'])->name('set-job');
    Route::get('/job-applied', [HomeController::class, 'job_applied'])->name('job-applied'); 
    Route::get('/post-job/{id?}', [HomeController::class, 'post_job'])->name('post-job');  
    Route::post('/job-store', [HomeController::class, 'job_store'])->name('job-store');
    Route::post('/job-delete', [HomeController::class, 'job_delete'])->name('job-delete');
    Route::post('/job_saves-delete', [HomeController::class, 'job_saves_delete'])->name('job_saves-delete');
    Route::post('/job_applies-delete', [HomeController::class, 'job_applies_delete'])->name('job_applies-delete');
    Route::post('/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::get('/account', [HomeController::class, 'account'])->name('account');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['patch','post'],'/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
