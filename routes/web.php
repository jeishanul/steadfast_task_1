<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FormFieldController;
use App\Http\Controllers\Admin\FormTemplateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\SubmittedFormController;
use Illuminate\Support\Facades\Route;

// Routes for Guest
Route::middleware(['redirect:guest'])->group(function () {
    // Routes for Login
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginRequest')->name('login.request');
    });
    // Routes for Register
    Route::controller(RegisterController::class)->group(function () {
        Route::get('register/{role}', 'register')->name('register');
        Route::post('register', 'registerRequest')->name('register.request');
    });
});

// Routes for Authenticated
Route::middleware(['auth'])->group(function () {
    // Routes for Admin
    Route::middleware(['redirect:admin'])->prefix('admin')->group(function () {
        // Routes for Admin Logout
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
        // Category Routes (Admin)
        Route::controller(CategoryController::class)->group(function () {
            Route::get('categories', 'index')->name('admin.category.index');
            Route::get('category/create', 'create')->name('admin.category.create');
            Route::post('category/store', 'store')->name('admin.category.store');
            Route::get('category/edit/{category}', 'edit')->name('admin.category.edit');
            Route::put('category/update/{category}', 'update')->name('admin.category.update');
            Route::delete('category/delete/{category}', 'destroy')->name('admin.category.destroy');
        });
        // Form Template Routes (Admin)
        Route::controller(FormTemplateController::class)->group(function () {
            Route::get('{category}/form-templates', 'index')->name('admin.form.template.index');
            Route::get('{category}/form-template/create', 'create')->name('admin.form.template.create');
            Route::post('{category}/form-template/store', 'store')->name('admin.form.template.store');
            Route::get('form-template/{formTemplate}/edit', 'edit')->name('admin.form.template.edit');
            Route::put('form-template/{formTemplate}/update', 'update')->name('admin.form.template.update');
            Route::get('form-template/{formTemplate}/user-submitted', 'userSubmittedFormData')->name('admin.form.template.user_submitted.form.data');
            Route::delete('form-template/{formTemplate}/destroy', 'destroy')->name('admin.form.template.destroy');
        });
        // Form Field Routes (Admin)
        Route::controller(FormFieldController::class)->group(function () {
            Route::get('form-template/{formTemplate}/field/create',  'create')->name('admin.form.field.create');
            Route::post('form-template/{formTemplate}/field/store', 'store')->name('admin.form.field.store');
        });
    });
    // Routes for User
    Route::middleware('redirect:user')->group(function () {
        // Routes for User Logout
        Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
        // Submitted Form Routes (Users)
        Route::controller(SubmittedFormController::class)->group(function () {
            Route::get('/',  'index')->name('user.submitted.forms.index');
            Route::get('/form-template/{formTemplate}/form', 'showForm')->name('user.submitted.form.show');
            Route::post('/form-templates/{formTemplate}/form/submission',  'storeSubmission')->name('user.form.data.store');
        });
    });
});
