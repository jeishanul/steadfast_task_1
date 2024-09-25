<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FormFieldController;
use App\Http\Controllers\Admin\FormTemplateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\SubmittedFormController;
use Illuminate\Support\Facades\Route;

// Routes for Guest
Route::middleware(['guest'])->group(function () {
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
Route::middleware(['auth'])->group(function () {
    // Routes for Admin
    Route::middleware(['admin'])->prefix('admin')->group(function () {
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
            Route::get('{category}/form-templates', 'index')->name('admin.form.template.create');
            Route::post('/{categoryId}/form-templates', 'store')->name('form_templates.store');
            Route::get('/form-templates/{id}/edit', 'edit')->name('form_templates.edit');
            Route::put('/form-templates/{id}', 'update')->name('form_templates.update');
            Route::delete('/form-templates/{id}', 'destroy')->name('form_templates.destroy');
        });
        // Form Field Routes (Admin)
        Route::controller(FormFieldController::class)->group(function () {
            Route::get('/form-templates/{formTemplateId}/fields/create',  'create')->name('form_fields.create');
            Route::post('/form-templates/{formTemplateId}/fields', 'store')->name('form_fields.store');
            Route::get('/fields/{id}/edit', 'edit')->name('form_fields.edit');
            Route::put('/fields/{id}', 'update')->name('form_fields.update');
            Route::delete('/fields/{id}', 'destroy')->name('form_fields.destroy');
        });
    });
    // Routes for User
    Route::prefix('user')->group(function () {
        // Routes for User Logout
        Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
        // Submitted Form Routes (Users)
        Route::controller(SubmittedFormController::class)->group(function () {
            Route::get('submitted-forms',  'index')->name('user.submitted.forms.index');

            Route::get('/form-templates/{formTemplateId}/form', 'showForm')->name('form_submissions.show');
            Route::post('/form-templates/{formTemplateId}/form',  'storeSubmission')->name('form_submissions.store');
            Route::get('/form-submissions/{id}',  'showSubmission')->name('form_submissions.show_submission');
        });
    });
});
