<?php


 // Admin Page Routes

 use App\Http\Controllers\Admin\AdminJobPostingController;
 use App\Http\Controllers\AdminController;
 use App\Http\Controllers\PermissionController;
 use App\Http\Controllers\RoleController;
 use App\Http\Controllers\RolePermissionController;
 use Illuminate\Support\Facades\Route;

 Route::prefix('admin')
 ->middleware(['admin', 'auth'])
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

?>