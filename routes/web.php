<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Routes for Recruiment Page
Route::prefix('recruitment')
->name('recruitment.')
->group(function () {
    Route::resource('job_posting', JobPostingController::class)->only(['index', 'show']);
});

// Job Application
Route::prefix('job_application')
->middleware(['auth'])
->name('job_application.apply.')
->group(function () {
    Route::name('update_pds')->get('/job_posting/{job_posting}/apply/pds', [JobApplicationController::class, 'update_pds']);
    Route::name('create_attachments')->get('/job_posting/{job_posting}/apply/attachments', [JobApplicationController::class, 'create_attachments']);
    Route::name('review_application')->get('/job_posting/{job_posting}/apply/review_application', [JobApplicationController::class, 'review']);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});

require __DIR__.'/auth.php';
require __DIR__.'/pds.php';
require __DIR__.'/admin.php';
