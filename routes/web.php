<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Models\Job;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
Route::get('/', function() {
    return view('main', [
        'jobs' => Job::paginate(10)
    ]);
})->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

Route::get('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');



