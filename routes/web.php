<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemilikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })
        // Route untuk CRUD Pemilik

        Route::apiResource('pemiliks', PemilikController::class);
        // Route untuk halaman impor

        Route::get('pemiliks/import', function () {
            return view('import');
        })->name('pemiliks.import');

        // Route untuk proses impor
        Route::post('pemiliks/import', [PemilikController::class, 'import']);


        //dashboard controller

        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/pemilik', [DashboardController::class, 'data_pemilik'])->name('dashboard.pemilik');
            Route::get('/pemilik/create', [DashboardController::class, 'data_pemilik_create'])->name('dashboard.pemilik.create');
            Route::post('/pemilik/store', [DashboardController::class, 'data_pemilik_store'])->name('dashboard.pemilik.store');
            Route::get('/pemilik/{id}', [DashboardController::class, 'data_pemilik_show'])->name('dashboard.pemilik.show');
            Route::post('/pemilik/{id}/update', [DashboardController::class, 'data_pemilik_update'])->name('dashboard.pemilik.update');
            Route::delete('/pemilik/{id}/destroy', [DashboardController::class, 'data_pemilik_destroy'])->name('dashboard.pemilik.destroy');


            Route::get('/akta', [DashboardController::class, 'data_akta'])->name('dashboard.akta');
            Route::get('/akta/{id}/create', [DashboardController::class, 'data_akta_create'])->name('dashboard.akta.create');
            Route::post('/akta/{id}/store', [DashboardController::class, 'data_akta_store'])->name('dashboard.akta.store');
            Route::get('/akta/{id}/{notaris}', [DashboardController::class, 'data_akta_show'])->name('dashboard.akta.show');
            Route::post('/akta/{id}/update/{notaris}', [DashboardController::class, 'data_akta_update'])->name('dashboard.akta.update');
            Route::delete('/akta/{id}/destroy/{notaris}', [DashboardController::class, 'data_akta_destroy'])->name('dashboard.akta.destroy');
            Route::get('/akta/export', [DashboardController::class, 'data_akta_export'])->name('dashboard.akta.export');

            Route::get('/import', [DashboardController::class, 'import_data'])->name('dashboard.import');
            Route::post('/import/store', [DashboardController::class, 'import_data_store'])->name('dashboard.import.store');

            Route::get('/users', [DashboardController::class, 'data_user'])->name('dashboard.users');
        });


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });



    require __DIR__.'/auth.php';
});
