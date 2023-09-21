<?php


 // Admin Page Routes

use App\Http\Controllers\Admin\AdminDailyTimeRecordController;
use App\Http\Controllers\Admin\AdminJobApplicationController;
use App\Http\Controllers\Admin\AdminJobPostingController;
use App\Http\Controllers\Admin\AdminRewardAndRecognitionController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmployeeRewardController;
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

    //  Employee
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('employees/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::get('employees/{employee}/rewards/edit', [EmployeeController::class, 'editRewards'])->name('employees.rewards.edit');
    Route::get('employees/{employee}/rewards/add', [EmployeeController::class, 'addReward'])->name('employees.rewards.add');
    // Rewarding the employee
    Route::post('employees/{user}/rewards/store', [EmployeeRewardController::class, 'store'])->name('employees.rewards.store');
    Route::delete('employees/rewards/{reward}/destroy', [EmployeeRewardController::class, 'destroy'])->name('employees.rewards.destroy');


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

        //  viewing of job applications for vacancies
         Route::get('job_posting/{job_posting}/job_application', [AdminJobApplicationController::class, 'index'])->name('job_application.index');
         Route::get('job_posting/job_application/{job_application}', [AdminJobApplicationController::class, 'show'])->name('job_application.show');

    });
        
    // rewards and recognition
    Route::resource('rewards', AdminRewardAndRecognitionController::class);
    
    Route::get('daily_time_record', [AdminDailyTimeRecordController::class, 'index'])->name('daily_time_record.index');
 });

?>