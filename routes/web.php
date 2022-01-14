<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard',["tasks"=>Auth::user()->tasks]);
})->middleware(['auth'])->name('dashboard');

Route::post("/task",[TaskController::class,"create"])->middleware(['auth'])->name('user.task.add');
Route::get("/task/{id}",[TaskController::class,"editIndex"])->middleware(['auth'])->name('user.task.edit');
Route::delete("/task/{id}",[TaskController::class,"destroy"])->middleware(['auth'])->name('user.task.delete');;

Route::get("/tasks",[TaskController::class,"read"])->middleware(['auth']);

Route::put("/task/update",[TaskController::class,"update"])->middleware(['auth'])->name('user.task.update');

require __DIR__.'/auth.php';