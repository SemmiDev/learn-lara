<?php

use App\Models\Task;
use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'home']);
Route::get('/tasks', [Controller::class, 'tasks_by_category']);
Route::get('/tasks/tags/{tag:name}', [Controller::class, 'tasks_by_tag']);
Route::get('/tasks/{task}', [Controller::class, 'task']);
Route::get('/search', [Controller::class, 'search_tasks']);

Route::get('/register', [Controller::class, 'register']);
Route::get('/login', [Controller::class, 'login']);

Route::post('/register', [Controller::class, 'store_register']);
Route::post('/login', [Controller::class, 'store_login']);
