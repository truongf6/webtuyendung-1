<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/showLogin', [AuthController::class, 'showLogin'])->name('showLogin');
Route::get('/showRegister', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register/job-seeker', [AuthController::class, 'registerJobSeeker'])->name('register.job_seeker');
Route::post('/register/company', [AuthController::class, 'registerCompany'])->name('register.company');
