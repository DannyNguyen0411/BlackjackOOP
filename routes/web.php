<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Open as Open;
use App\Http\Controllers\Admin as Admin;



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

//For adding permission for each role and only access able for the role
Route::group(['middleware' => ['role:teacher|admin|student']], function (){
    Route::get('admin/project/{project}/delete', [Admin\ProjectController::class, 'delete'])->name('projects.delete');
    Route::resource('admin/projects', Admin\ProjectController::class);

//    Admin Dashboard
    Route::get('/admin', function() {
        return view('layouts/layoutadmins');
    })->middleware(['auth', 'verified'])->name('admin');
});

//Documentation
Route::get('/document', function () {
    return view('welcome');
});

//StartPage
Route::get('/', [Open\ProjectController::class, 'index'])->name('open.projects.index');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('projects', [Open\ProjectController::class, 'index'])->name('open.projects.index');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
