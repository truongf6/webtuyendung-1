<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\AdminJobCategoryController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/showLogin', [AuthController::class, 'showLogin'])->name('showLogin');
Route::get('/showRegister', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/jobDetail/{slug}', [JobController::class, 'jobDetail'])->name('jobDetail');
Route::get('/jobList', [JobController::class, 'jobList'])->name('jobList');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/postContact', [PageController::class, 'postContact'])->name('postContact');

Route::group(['middleware' => 'auth'], function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        // ADMIN
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminHomeController::class, 'index'])->name('homeAdmin');

            // Quản lý USERS 
            Route::resource('users', AdminUserController::class);
            Route::get('/adminUser', [AdminUserController::class, 'adminUser'])->name('adminUser');
            Route::get('/companyUser', [AdminUserController::class, 'companyUser'])->name('companyUser');
            Route::get('/employeeUser', [AdminUserController::class, 'employeeUser'])->name('employeeUser');

            // Quản lý Job_Category
            Route::resource('job_categories', AdminJobCategoryController::class);
            Route::resource('jobs', AdminJobController::class);

            // Quản lý phản hồi
            Route::resource('feedbacks', AdminFeedbackController::class);

        });
    });

    // COMPANY
    Route::middleware(['auth', 'company'])->group(function () {
        Route::get('/postJobPage', [CompanyController::class, 'postJobPage'])->name('postJobPage');
        Route::post('/postJob', [CompanyController::class, 'postJob'])->name('postJob');

        Route::get('/viewJobPage', [CompanyController::class, 'viewJobPage'])->name('viewJobPage');
        Route::get('/viewJobPageEdit/{slug}', [CompanyController::class, 'viewJobPageEdit'])->name('viewJobPageEdit');
        Route::post('/PostJobPageEdit/{slug}', [CompanyController::class, 'PostJobPageEdit'])->name('PostJobPageEdit');
    });

    // EMPLOYEE
    Route::middleware(['auth', 'employee'])->group(function () {
        Route::post('/applyJob/{slug}', [JobController::class, 'applyJob'])->name('applyJob');
        Route::get('/CvApplied', [JobController::class, 'CvApplied'])->name('CvApplied');
        Route::post('/favourite', [FavouriteController::class, 'store'])->name('favourite.store')->middleware('auth');
        Route::get('/JobSaved', [FavouriteController::class, 'JobSaved'])->name('JobSaved');

    });
});