<?php

use App\Http\Controllers\Admin\AdminJobPostingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Role;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Foundation\Application;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

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
->name('job_application.')
->group(function () {
    Route::name('show')->get('/job_posting/{job_posting}/show', [JobApplicationController::class, 'show']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin Page
    Route::prefix('admin')
    ->middleware(['admin'])
    ->name('admin.')
    ->group(function () {

        // Admin Dashboard
        Route::name('dashboard')->get('dashboard', [AdminController::class, 'index']);

        // routes for Roles and Permissions
        Route::prefix('role_permission')
        ->name('role_permission.')
        ->group(function () {
            Route::name('index')->get('/', [RolePermissionController::class, 'index']);
            Route::resource('role', RoleController::class);
            Route::resource('permission', PermissionController::class);
        });

        // Routes for Recruiment Page
        Route::prefix('recruitment')
        ->name('recruitment.')
        ->group(function () {
            Route::resource('job_posting', AdminJobPostingController::class);
        });
    });
});

require __DIR__.'/auth.php';
